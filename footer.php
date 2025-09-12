<?php
$address = $settings['address'] ?? 'Slowacka 10a/10, Zielona Góra';
$maps_url = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($address);
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link href="/massage_salon/css/main.css" rel="stylesheet">
</head>


<footer>
  <div class="footer-container">
    <div class="footer-top">
      <div class="footer-contact">
        <p>
          <i class="fas fa-map-marker-alt"></i> <a href="<?php echo $maps_url; ?>" target="_blank"><?php echo htmlspecialchars($address); ?></a> |
          <i class="fas fa-phone"></i> <?php echo htmlspecialchars($phone ?? ''); ?> |
          <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($settings['email'] ?? ''); ?>
        </p>
      </div>
      <div class="footer-politics">
        <p>© 2025 Salon masažu & SPA Nirvana. All rights reserved.
            <a href="policy.php">Privacy Policy</a>  | 
            <a href="terms_service.php">Terms of Service</a>
        </p>
      </div>
    </div>

    <div class="footer-social">
      <button class="social-btn fb"><i class="fab fa-facebook-f"></i></button>
      <button class="social-btn ig"><i class="fab fa-instagram"></i></button>
    </div>
  </div>
</footer>



