<!doctype html>
<html lang="fr">

<head>
    <title>Inscription - Admin</title> <!-- Élément spécifique -->
    <meta charset="UTF-8" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <section class="fondco">
        <div class="formulaireConnexion">
            <form class="formConnexion" method="post" action="index.php?action=signin">
                <input class="inputCo" type="text" id="pseudo" placeholder="Pseudo" name="pseudo"><br>
                <input class="inputCo" type="password" id="pass" placeholder="Mot de passe" name="pass"><br>
                <input class="btn-sign" type="submit" value="S'inscrire" id="submit" name="Inscription ›">
                <p class="back"><a href="index.php">Retourner à la page d'accueil</a> </p>
            </form>
        </div>
    </section>
</body>
</html>