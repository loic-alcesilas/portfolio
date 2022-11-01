<?php session_start(); ?>
<!doctype html>
<html lang="fr">

<head>
<link rel="shortcut icon" href="#">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio - Loïc</title> <!-- Élément spécifique -->
  <!-- Link To CSS -->
  <link rel="stylesheet" href="public/css/style.css">
  <!-- Link Swiper CSS CDN-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
  <!-- Box Icons -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <!-- Scroll Top -->
  <a href="#home" class="scroll-top">
    <i class='bx bx-up-arrow-alt'></i>
  </a>
  <!-- Header -->
  <header>
    <!-- Nav -->
    <div class="nav container">
      <!-- Logo -->
      <a href="index.php" class="logo">Loic</a>
      <!-- Navbar -->
      <ul class="navbar">
        <li><a href="index.php" class="nav-link">Accueil</a></li>
        <li><a href="#about" class="nav-link">A propos</a></li>
        <li><a href="#portfolio" class="nav-link">Portfolio</a></li>
        <li><a href="#contact" class="nav-link">Contact</a></li>
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

  <!-- Home -->
  <section class="home container" id="home">
    <div class="home-content">
      <div class="home-img">
        <img src="" alt="">
      </div>
      <div class="home-text">
        <h3>Bonjour</h3>
        <h2><span class="color">Loïc</span></h2>
        <p>
          Je suis un jeune <span class="color">Développeur </span> étudiant qui aime créer des <span class="color">sites
            web</span>
          <br>Vous pouvez me suivre sur les réseaux en cliquant <span class="color">ci dessous</span>

        </p>
        <!-- Social -->
        <div class="social">
          <a href="#"><i class='bx bxl-twitter'></i></a>
          <a href="#"><i class='bx bxl-linkedin-square'></i></a>
          <a href="#"><i class="bx bxl-github"></i></a>
        </div>
      </div>
    </div>
  </section>

  <!-- About -->
  <section class="about container" id="about">
    <!-- Heading -->
    <h2 class="heading">A propos</h2>
    <!-- About Content -->
    <div class="about-content">
      <div class="about-data">
        <span>A PROPOS DE MOI</span>
        <h2>Dévelopeur Web junior</h2>
        <a href="" class="btn" download="">
          Télècharger cv
          <i class='bx bx-download'></i>
        </a>
      </div>
      <div class="about-text">
        <p>Je m'appelle Loic alcesilas j'ai 21 ans, je suis un passionée d'informatique et du monde tech.</p>
        <p>J'ai obtenue un BAC STI2D à Maubeuge.</p>
        <p>Actuellement en formation chez Openclassroom.</p>
      </div>
    </div>
  </section>

  <!-- Services -->
  <section class="services container" id="services">
    <!-- Heading -->
    <h2 class="heading">Services</h2>
    <!-- Services Content -->
    <div class="services-content">
      <div class="services-box">
        <i class='bx bx-code-alt'></i>
        <h2>Développement web</h2>
        <p>Création de site PHP/JS de zero jusqu'à sa livraison final. 
          </p>
      </div>
      <div class="services-box">
        <i class='bx bx-lock'></i>
        <h2>Intégration de Maquette</h2>
        <p>Création de maquette statique en HTML/CSS,
          en respectant le mockup fournit.</p>
      </div>
      <div class="services-box">
        <i class='bx bx-brush'></i>
        <h2>Site Wordpress</h2>
        <p>Conception de site wordpress avec réferencement SEO. Utilisation de plugin/builder 
          hebergement du site.</p>
      </div>
    </div>
  </section>
  <!-- Portfolio -->
  <section class="portfolio container" id="portfolio">
    <!-- Heading -->
    <h2 class="heading">Portfolio</h2>
    <!-- Portfolio Content -->
    <div class="portfolio-content">
      <?php foreach ($projets as $projet) : ?>
        <div class="portfolio-box">
          <article>
            <img src="<?= $projet['image_desc'] ?>" alt="" class="portfolio-img" href="index.php?action=Projet&id=<?= $projet['id'] ?>">
            <!-- Overlay -->
            <div class="portfolio-overlay" href="index.php?action=Projet&id=<?= $projet['id'] ?>">
              <h2><?= $projet['titre'] ?></h2>

              <a href="index.php?action=Projet&id=<?= $projet['id'] ?>">
                <i class='bx bx-link-alt'></i>
              </a>
            </div>
        </div>
        </article>
      <?php endforeach; ?>
  </section>


  <!-- SKILL -->
  <section class="container skill" id="skill">
    <!-- Heading -->
    <h2 class="heading">Skills</h2>
    <!-- Skill Content -->
    <div class="skill-content swiper">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <!-- skill Box -->
          <div class="skill-box">
           <i class='bx bxl-html5'></i>
            <p class="skill-text">
          Integration, respect des Media querie(responsive) et de la norme W3C, sémantique logique.    
            </p>
            <div class="bar">
            <div class="bar-stat" id="html">
                <span class="bar-text">HTML - 90%</span>
            </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <!-- skill Box -->
          <div class="skill-box">
          <i class='bx bxl-javascript'></i>
            <p class="skill-text">
              Intégration d'API tiers, animation du site mise en place de slider, mode sombre et plein d'autre !
            </p>
            <div class="bar">
            <div class="bar-stat" id="js">
            <span class="bar-text">JS - 60%</span>
            </div>
            </div>
        </div>
        </div>

        
        <div class="swiper-slide">
          <!-- Skill Box -->
          <div class="skill-box">
          <i class='bx bxl-php' ></i>
            <p class="skill-text">
              Respect de l'architecture MVC, Requete SQL, mise en place de routeur.
            </p>
            <div class="bar">
            <div class="bar-stat" id="php">
            <span class="bar-text">PHP - 70%</span>
            </div>
            </div>
          </div>
        </div>


      </div>

      <div class="swiper-pagination"></div>
    </div>
  </section>
  <!-- Contact Form -->
  <section class="contact container" id="contact">
    <!-- Heading -->
    <h2 class="heading">Contact</h2>
    <!-- Contact Form -->
    <form action="" class="contact-form" id="contact-form">
      <input type="text" placeholder="Votre nom" class="name" required>
      <input type="email" name="" id="" placeholder="Address Email" class="email" required>
      <textarea name="" id="" cols="30" rows="10" placeholder="Rédigez votre message ici..." class="message" required></textarea>
      <input type="submit" value="Envoyer" class="send-btn">
    </form>
  </section>
  <!-- Footer -->
  <section class="footer container" id="footer">
    <div class="social">
      <a href="mailto:loic.alcesilas@gmail.com"><i class='bx bx-envelope'></i></a>
      <a href=""><i class='bx bxl-twitter'></i></a>
      <a href=""><i class='bx bxl-linkedin-square'></i></a>
      <a href=""><i class="bx bxl-github"></i></a>
    </div>
    <!-- Footer Links -->
    <div class="footer-links">
      <a href="">Politique de confidentialité</a>
      <a href="">Conditions d'utilisations</a>
      <?php
      if (isset($_SESSION['pseudo'])) {
        echo '<a href="index.php?action=adminVue">Administration</a>';
        echo '<a href="index.php?action=logoutAdmin">logout</a>';
      } else {
        echo '<a href="index.php?action=loginVueAdmin">Admin</a>';
      }
      ?>
    </div>

    <p>© 2022 <strong>Alcesilas Loic - Dev WEBJ OpenClassrooms</strong></p>
  </section>
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
  
  <!-- Link Swiper Js -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script src="public/js/main.js"></script>
  <script src="public/js/contact.js"></script>
  <script src="public/js/swiper.js"></script>
</body>

</html>