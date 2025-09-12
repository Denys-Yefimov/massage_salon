<?php
require_once 'config.php';

// Fetch settings (single row)
$stmt = $pdo->query("SELECT name, email, address, phone_id FROM settings LIMIT 1");
$settings = $stmt->fetch();

// Fetch phone details if phone_id is set
$phone = '';
if (!empty($settings['phone_id'])) {
    $stmt = $pdo->prepare("SELECT phone_index, phone_main FROM phone WHERE p_id = ?");
    $stmt->execute([$settings['phone_id']]);
    $phone_row = $stmt->fetch();
    if ($phone_row) {
        $phone = $phone_row['phone_index'] . ' ' . $phone_row['phone_main'];
    }
}

// === Контент страницы ===
ob_start();
include 'index.html';   // здесь твоя верстка
$content = ob_get_clean();

// === Заголовок страницы ===
$title = "SPA Nirvana";

// Подключаем базовый шаблон
include 'base.php';

