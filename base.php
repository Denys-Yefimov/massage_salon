<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= $title ?? "SPA Nirvana" ?></title>

  <!-- Подключаем общий CSS -->
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/main.css">

 <!-- Подключаем Google Fonts вместо тяжелых TTF -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <link rel="icon" href="pictures\logo.svg" type="image/svg+xml">

  <!-- Подключаем Font Awesome для иконок -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <?php include 'header.php'; ?>

  <main>
    <?= $content ?? "" ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
