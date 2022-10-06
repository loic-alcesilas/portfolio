<?php $this->titre = "Portfolio - " . $projet['titre']; ?>
 <!-- Scroll Top -->
 <a href="#home" class="scroll-top">
    <i class='bx bx-up-arrow-alt'></i>
  </a>
<section class="vueProjet" id="fadeVue">
    <h2 class="headProjet"><?= $projet['titre'] ?></h2>
    <h3 class="sous-titre">Image du projet</h3>
    <div class="projet-content">
        <div class="projet-box">
            <img id="fadeVue" src="<?= $projet['image_projet'] ?>" alt="" class="Projet-img">
            <!-- Overlay -->
            <div class="">
                <p class=""><?= $projet['desc_img'] ?></p>
                <a href="">
                </a>
            </div>
        </div>
        <div class="projet-box2">
            <img id="fadeVue"src="<?= $projet['image_projet2'] ?>" alt="" class="Projet-img">
            <div class="">
                <p class=""><?= $projet['desc_img2'] ?></p>
                <a href="">
                </a>
            </div>
    </div>
    </div>
    <div class="projet-competence">
    <div class="projet-text">
        <h3 class="sous-titre">En détails</h3>
        <p><?= $projet['contenue'] ?></p>
        <h3 class="sous-titre">Compétence acquise</h3>
        <ul>
        <li><?=$projet['competence']?></li>
    </ul>
    </div>
</section>
