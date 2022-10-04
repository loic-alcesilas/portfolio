<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$titre?></title>
    <!-- Link To CSS -->
    <link rel="stylesheet" href="public/css/style.css">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <!-- Header -->
    <header>
        <!-- Nav -->
        <div class="nav container">
            <!-- Logo -->
            <a href="#" class="logo">Loic</a>
            <!-- Navbar -->
            <ul class="navbar">
                <li><a href="#home" class="nav-link">Acceuil</a></li>
                <li><a href="#about" class="nav-link">A propos</a></li>
                <li><a href="#services" class="nav-link">Services</a></li>
                <li><a href="#portfolio" class="nav-link">Portfolio</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
            <!-- Menu Icon -->
            <div class="menu-icon">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </div>
    </header>
    <?=$contenu?>   <!-- Élément spécifique -->
    <!-- Footer -->
<section class="footer container" id="footer">
  <div class="social">
      <a href="mailto:loic.alcesilas@gmail.com"><i class='bx bx-envelope' ></i></a>
      <a href="#"><i class='bx bxl-twitter'></i></a>
      <a href="#"><i class='bx bxl-linkedin-square'></i></a>
      <a href="#"><i class="bx bxl-github"></i></a>
  </div>
  <p>© 2022 <strong>Alcesilas Loic - Dev WEBJ OpenClassrooms</strong></p>
</section>
<!-- Email Js Link -->
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>
<script type="text/javascript">
  (function(){
     emailjs.init("mDhaxqqU7IJs7LbL1");
  })();
</script>
<!-- Sweet Alert Js Link -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Js Link -->
  <script src="public/js/main.js"></script>
  <script src="public/js/contact.js"></script>
</body>
</html>