<?php $this->titre = "Ajouter un Projet"; ?>


<div class="formProjet">
  <h1 class="sous-titre">AJOUT DE PROJET</h1>
  <form action="index.php?action=ajoutProjet" method="POST">
    <label>Titre</label>
    <input class='inputForm'type="text" id="titre" name="titre" placeholder="Titre">

    <label>Image de preview</label>
    <input class='inputForm'type="text" id="image_desc" name="image_desc" placeholder="Url">

    <label>Image du projets</label>
    <input class='inputForm'type="text" id="image_projet" name="image_projet" placeholder="Url image du projet 1">
    <input class='inputForm'type="text" id="image_projet2" name="image_projet2" placeholder="Url image du projet 2">


    <label>Texte image</label>
    
    <input class='inputForm'type="text" id="desc_img" name="desc_img" placeholder="texte de l'image 1">
    <input class='inputForm'type="text" id="desc_img2" name="desc_img2" placeholder="Texte de l'image 2">

    <label>Description</label>
    <textarea id="contenue"  placeholder="Sur ce projet..." style="height:200px" name="contenue"></textarea>

    <label>Compétence</label>
    <textarea id="tinymce" placeholder="Sur ce projet..." style="height:100px" name="competence"></textarea>


    <input class="btn-form"type="submit" value="Envoyer" id="submit" name="ajoutProjet">
  </form>
</div>
