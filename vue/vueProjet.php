<?php
session_name('user');
session_start(); ?>
<?php $this->titre = "Portfolio - " . $projet['titre']; ?>
<!-- PROJET -->
<section class="vueProjet" id="fadeVue">
    <h2 class="headProjet"><?= $projet['titre'] ?></h2>
    <h3 class="sous-titre">Image du projet</h3>
    <div class="projet-content">
        <div class="projet-box">
            <img id="fadeVue" src="<?= $projet['image_projet'] ?>" alt="" class="Projet-img">
            <!-- Overlay -->
            <div class="">
                <p class=""><?= $projet['desc_img'] ?></p>
                <a href=""> </a>
            </div>
        </div>
        <div class="projet-box2">
            <img id="fadeVue" src="<?= $projet['image_projet2'] ?>" alt="" class="Projet-img">
            <div class="">
                <p class=""><?= $projet['desc_img2'] ?></p>
                <a href=""></a>
            </div>
        </div>
    </div>
    <div class="projet-competence">
        <div class="projet-text">
            <h3 class="sous-titre">En détails</h3>
            <p class="projetDesc"><?= $projet['contenue'] ?></p>
            <h3 class="sous-titre">Compétence acquise</h3>
            <ul>
                <li class="projetDesc"><?= $projet['competence'] ?></li>
            </ul>
        </div>
</section>
<!-- COMMENTAIRE -->
<section class="enteteCommentaire">
    <h2 class="headProjet">Commentaires</h2></br>
</section>

<?php foreach ($commentaires as $commentaire) : ?>
    <div class="listeCommentaires">
        <div class="contenuMessage">
            <p class='auteur'><span class="span">Ecrit le :<br> <time><?= $commentaire['date'] ?></time> par </span><?= htmlspecialchars($commentaire['auteur']) ?></p>
            <p class='contenu'><?= htmlspecialchars($commentaire['contenu']) ?></p>
        </div>
    </div>
<?php endforeach; ?>
<?php
if (!isset($_SESSION['nom'])) {
?>
    <div class="commenter">
        <div class="entetedescommentaires">
            <h2 class="headProjet">Laisser le votre !</h2>
            <!-- Formulaire pour commenter -->
            <div class="mask">
                <form class="formCommentaireMask">
                <p>Veuillez vous connecter pour écrire un commentaire <a href="index.php?action=VueUtilisateur" class="nav-link">ici</a></p>
                    <div class="mask2">
                        <div class="champCom">
                            <label class="labelCom">Message</label><br>
                            <textarea class='formComContenue' rows="4" placeholder="Votre commentaire ici..." required></textarea>
                        </div><br />
                        <div class="champCom">
                            <label class="labelCom2">Pseudo</label><br>
                            <input class='formComPseudo' type="text" placeholder="Votre pseudo" required>
                        </div><br />
                        <div class="boutonComs">
                            <input class="btn" value="ENVOYER">
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>

<?php
} else {
?>
    <div class="commenter">
        <div class="entetedescommentaires">
            <h2 class="headProjet">Laisser le votre !</h2>
            <!-- Formulaire pour commenter -->
            <form class="formCommentaire" method="post" action="index.php?action=commenter">
                <div class="champCom">
                    <label class="labelCom" for="txtCommentaire">Message</label><br>
                    <textarea class='formComContenue' id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire ici..." required></textarea>
                </div><br />
                <div class="champCom">
                    <label class="labelCom2" for="auteur">Pseudo</label><br>
                    <input class='formComPseudo' id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required>
                </div><br />
                <div class="boutonComs">
                    <input class="formulairecommentaire" type="hidden" name="id" value="<?= $projet["id"] ?>">
                    <input class="btn" type="submit" value="ENVOYER">
                </div>
            </form>
        </div>
    </div>
<?php
}
?>