<?php $this->titre = "Ajouter un Projet"; ?>


<div class="formProjet">
  <h1 class="sous-titre">AJOUT DE PROJET</h1>
  <form action="/action_page.php">
    <label for="fname">Titre</label>
    <input class='inputForm'type="text" id="fname" name="firstname" placeholder="Titre">

    <label for="sujet">Image de preview</label>
    <input class='inputForm'type="text" id="sujet" name="sujet" placeholder="Url">

    <label for="emailAddress">Image du projets</label>
    <input class='inputForm'type="text" id="sujet" name="sujet" placeholder="Url image du projet 1">
    <input class='inputForm'type="text" id="sujet" name="sujet" placeholder="Url image du projet 2">


    <label for="subject">Texte image</label>
    
    <input class='inputForm'type="text" id="sujet" name="sujet" placeholder="texte de l'image 1">
    <input class='inputForm'type="text" id="sujet" name="sujet" placeholder="Texte de l'image 2">

    <label for="subject">Description</label>
    <textarea id="tinymce" name="subject" placeholder="Sur ce projet..." style="height:100px"></textarea>

    <label for="subject">Compétence</label>
    <textarea id="tinymce" name="subject" placeholder="Sur ce projet..." style="height:100px"></textarea>


    <input class="btn-form"type="submit" value="Envoyer">
  </form>
</div>
