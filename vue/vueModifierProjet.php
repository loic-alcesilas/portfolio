<?php $this->titre = "Modifier un Projet"; ?>


<div class="formProjet">
  <h1 class="sous-titre">MODIFIER UN PROJET</h1>
  <form  method="post" action="<?="index.php?action=modificationProjet&id=" . $projet['id']?>"  >
    <label>Titre</label>
    <input class='inputForm'type="text" id="titre" name="titre"  value="<?=$projet['titre']?>">

    <label>Image de preview</label>
    <input class='inputForm'type="text" id="image_desc" name="image_desc"  value="<?=$projet['image_desc']?>">

    <label>Image du projets</label>
    <input class='inputForm'type="text" id="image_projet" name="image_projet"  value="<?=$projet['image_projet']?>">
    <input class='inputForm'type="text" id="image_projet2" name="image_projet2"  value="<?=$projet['image_projet2']?>">


    <label>Texte image</label>
    
    <input class='inputForm'type="text" id="desc_img" name="desc_img"  value="<?=$projet['desc_img']?>">
    <input class='inputForm'type="text" id="desc_img2" name="desc_img2" value="<?=$projet['desc_img2']?>">

    <label>Description</label>
    <textarea id="contenue"   style="height:200px" name="contenue"><?=$projet['contenue']?></textarea>

    <label>Compétence</label>
    <textarea id="tinymce"  style="height:100px" name="competence"> <?=$projet['competence']?></textarea>


    <input class="btn-form"type="submit" value="MODIFIER" id="submit" name="modifierProjet">
  </form>
</div>
