<?php
session_name('user');
session_start(); ?>
<!doctype html>
<html lang="fr">

<head>
    <title>Inscription - utilisateur</title> <!-- Élément spécifique -->
    <meta charset="UTF-8" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <section class="fondco">
        <div class="formulaireConnexion">
            <form class="formConnexion" method="post" action="index.php?action=signinUser">
                <input class="inputCo" type="text" id="nom" placeholder="Username" name="nom"><br>
                <input class="inputCo" type="password" id="mdp" placeholder="Mot de passe" name="mdp"><br>
                <input class="btn-sign" type="submit" value="S'inscrire" id="submit" name="Inscription ›">
                <p class="back"><a href="index.php">Retourner à la page d'accueil</a> </p>
            </form>
        </div>
    </section>
</body>
</html>