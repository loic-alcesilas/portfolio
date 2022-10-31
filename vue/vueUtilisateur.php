<?php 
 session_name('user');
session_start(); ?>
<!doctype html>
<html lang="fr">

<head>
    <title>Utilisateur </title> <!-- Élément spécifique -->
    <meta charset="UTF-8" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <section class="fondco">
        <div class="formulaireConnexion">
            <div class="formConnexion">
            <?php 
            if (isset($_SESSION['nom']))
            {
                echo '<p class="titre-connexion">vous êtes connectés</p>';
                echo '<li> <a  class="btn-sign" href="index.php?action=logoutUser">vous déconnectez</a><br> </li>';
            }
            else {
           echo '<li> <a  class="btn-sign" href="index.php?action=loginVueUser">Se Connecter</a><br> </li>';
           echo '<li> <a  class="btn-sign" href="index.php?action=signinVueUser">S\'inscrire</a> </li>';
            }
            ?>
                <p class="back"><a href="index.php">Retourner à la page d'accueil</a> </p>
        </div>
        </div>
    </section>
</body>
</html>