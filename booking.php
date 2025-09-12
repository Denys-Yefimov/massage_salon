<?php
require 'db.php';

// массив с картинками, как у тебя в massage.php


$ser_id = $_GET['ser_id'] ?? null;

if (!$ser_id) {
    die("Массаж не найден");
}

$stmt = $pdo->prepare("
    SELECT s.ser_id, s.name, s.description, s.image_path, t.time, t.price
    FROM services s
    JOIN tp t ON s.ser_id = t.ser_id
    WHERE s.ser_id = :ser_id
");
$stmt->execute(['ser_id' => $ser_id]);
$massages = $stmt->fetchAll(PDO::FETCH_ASSOC);

$massage = [
    'name' => $massages[0]['name'],
    'description' => $massages[0]['description'],
    'image_path' => $massages[0]['image_path'] ?? 'pictures/massage.jpg',
    'times' => array_column($massages, 'time'),
    'prices' => array_column($massages, 'price'),
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($massage['name']) ?> – Бронирование</title>
    <link rel="stylesheet" href="css/booking.css">
</head>
<body>
<main class="booking-page">
    <div class="booking-container">
        <div class="booking-image">
            <img src="<?= htmlspecialchars($massage['image_path']) ?>" alt="<?= htmlspecialchars($massage['name']) ?>">
        </div>
        <div class="booking-info">
            <h1><?= htmlspecialchars($massage['name']) ?></h1>
            <p class="booking-description"><?= nl2br(htmlspecialchars($massage['description'])) ?></p>

            <form action="submit_booking.php" method="POST" class="booking-form">
                <input type="hidden" name="ser_id" value="<?= $ser_id ?>">

                <label for="time">Выберите время:</label>
                <select name="time" id="time" required>
                    <?php foreach ($massage['times'] as $i => $time): ?>
                        <option value="<?= $time ?>"><?= $time ?> минут – <?= $massage['prices'][$i] ?> zł</option>
                    <?php endforeach; ?>
                </select>

                <label for="name">Ваше имя:</label>
                <input type="text" name="name" id="name" required>

                <label for="phone">Телефон:</label>
                <input type="tel" name="phone" id="phone" required>

                <button type="submit" class="book-btn">Забронировать</button>
            </form>
        </div>
    </div>
</main>
</body>
</html>
