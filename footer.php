  <?php
  $address = $settings['address'] ?? 'Slowacka 10a/10, Zielona Góra';
  $maps_url = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($address);
  ?>

  <?php
  $email = $settings['email'] ?? 'nirvana.relaks.pl@gmail.com';
  $email_url = 'mailto:' . urlencode($email);
  ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link href="/massage_salon/css/footer.css" rel="stylesheet">
</head>

<footer>
<!-- Верхняя часть футера: контакты и соцсети -->
  <div class="footer-container">
      <div class="footer-contact">
          <p>
              <span><i class="fas fa-envelope"></i>  
                  <a href="<?php echo $email_url; ?>" target="_blank">
                      <?php echo htmlspecialchars($email); ?>
                  </a>
              </span>
              <span><i class="fas fa-phone"></i> 
                  <a href="tel:<?php echo htmlspecialchars($phone ?? ''); ?>">
                      <?php echo htmlspecialchars($phone ?? ''); ?>
                  </a>
              </span>
              <span><i class="fas fa-map-marker-alt"></i> 
                  <a href="<?php echo $maps_url; ?>" target="_blank">
                      <?php echo htmlspecialchars($address); ?>
                  </a>
              </span>
          </p>
      </div>

      <div class="footer-social">
          <button class="social-btn fb"><i class="fab fa-facebook-f"></i></button>
          <button class="social-btn ig"><i class="fab fa-instagram"></i></button>
      </div>
  </div>

  <!-- Нижняя часть футера: политика -->
  <div class="footer-politics">
      <p>
          © 2025 Salon masażu & SPA Nirvana. All rights reserved.
          <a href="policy.php">Privacy Policy</a> | 
          <a href="terms_service.php">Terms of Service</a>
      </p>
  </div>
</footer>




