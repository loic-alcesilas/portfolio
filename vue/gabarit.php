<!doctype html>
<html lang="fr">

<head>
  <link rel="shortcut icon" href="#">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $titre ?></title>
  <!-- Link To CSS -->
  <link rel="stylesheet" href="public/css/style.css">
  <!-- Box Icons -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <!-- tiny mce -->
  <script src="https://cdn.tiny.cloud/1/j7qj83cn44023cf2pic6ye20z1lfxozuoo80452dlkigamzo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea#tinymce',
      plugins: ['lists link image charmap anchor'],
      toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
    });
  </script>
</head>

<body>
   <!-- Scroll Top -->
   <a href="#top" class="scroll-top">
    <i class='bx bx-up-arrow-alt'></i>
  </a>
  <!-- Header -->
  <section  id="top">
  <header>
    <!-- Nav -->
    <div class="nav container">
      <!-- Logo -->
      <a href="index.php" class="logo">Loic</a>
      <!-- Navbar -->
      <ul class="navbar">
        <li><a href="index.php" class="nav-link">Accueil</a></li>
        <li> <a href="index.php?action=VueUtilisateur">Inscription/Connexion</a> </li>
      </ul>
      <!-- Menu Icon -->
      <div class="menu-icon">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </div>
  </header>
  </section>
  <?= $contenu  ?>
  <!-- Élément spécifique -->
  <!-- Email Js Link -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
  </script>
  <script type="text/javascript">
    (function() {
      emailjs.init("mDhaxqqU7IJs7LbL1");
    })();
  </script>
  <!-- Sweet Alert Js Link -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Js Link -->
  <script src="public/js/main.js"></script>
</body>

</html>