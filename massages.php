<?php
require_once 'config.php';

// --- Верхний блок: настройки и телефон ---
$stmt = $pdo->query("SELECT name, email, address, phone_id FROM settings LIMIT 1");
$settings = $stmt->fetch();

$phone = '';
if (!empty($settings['phone_id'])) {
    $stmt = $pdo->prepare("SELECT phone_index, phone_main FROM phone WHERE p_id = ?");
    $stmt->execute([$settings['phone_id']]);
    $phone_row = $stmt->fetch();
    if ($phone_row) {
        $phone = $phone_row['phone_index'] . ' ' . $phone_row['phone_main'];
    }
}

$current_page = basename($_SERVER['PHP_SELF']);
// --- Конец верхнего блока ---

// --- Блок с массажами ---
$stmt = $pdo->query("SELECT s.ser_id, s.name, s.description, s.image_path, t.time, t.price 
                     FROM services s 
                     JOIN tp t ON s.ser_id = t.ser_id");
$massages = $stmt->fetchAll(PDO::FETCH_ASSOC);

$groupedMassages = [];
foreach ($massages as $massage) {
    $groupedMassages[$massage['ser_id']]['name'] = $massage['name'];
    $groupedMassages[$massage['ser_id']]['description'] = $massage['description'];
    $groupedMassages[$massage['ser_id']]['image_path'] = !empty($massage['image_path']) ? $massage['image_path'] : 'pictures/massage.jpg';
    $groupedMassages[$massage['ser_id']]['times'][] = $massage['time'];
    $groupedMassages[$massage['ser_id']]['prices'][] = $massage['price'];
}

// Pass data to JavaScript
echo "<script>const descriptions = " . json_encode(array_column($groupedMassages, 'description')) . ";</script>";
echo "<script>const times = " . json_encode(array_map(fn($m) => $m['times'], $groupedMassages)) . ";</script>";
echo "<script>const prices = " . json_encode(array_map(fn($m) => $m['prices'], $groupedMassages)) . ";</script>";

// Include main content
ob_start();
include 'massages.html';   // здесь твоя верстка
$content = ob_get_clean();

// === Заголовок страницы ===
$title = "Our Services";

// Подключаем базовый шаблон
include 'base.php';

