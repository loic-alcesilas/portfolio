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
            <p><?= $projet['contenue'] ?></p>
            <h3 class="sous-titre">Compétence acquise</h3>
            <ul>
                <li><?= $projet['competence'] ?></li>
            </ul>
        </div>
</section>
<!-- COMMENTAIRE -->
<section class="enteteCommentaire">
    <h2 class="headProjet">Commentaires</h2></br>
</section>

<div class="listeCommentaires">
    <div class="contenuMessage">
        <p class='auteur'><?= htmlspecialchars($commentaire['auteur']) ?></p><br>
        <p class='contenu'><?= htmlspecialchars($commentaire['contenu']) ?></p>
    </div>
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
                <input class='formulairecommentaire' type="hidden" name="id" value="">
                <div class="boutonComs">
                    <input class="boutonCom" type="submit" value="ENVOYER">
                </div>
            </form>
        </div>