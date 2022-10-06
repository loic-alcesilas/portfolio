<?php $this->titre = "Administration"; ?>

<section class="dashboard">
    <h2 class="heading">mes projets</h2>
    <table class="allProjet">
        <tr>
            <td>TITRE PROJETS</td>
            <td>  <a href="index.php?action=vueProjet"><i class='bx bxs-plus-circle' ></i> </a></td>
        </tr>
    <?php foreach ($projets as $projet) : ?>
        <tr>
            <td class="titreadmin"><?= $projet['titre'] ?></td>
            <td>
            <a href="<?= "index.php?action=modifier&id" . $projet['id'] ?>"><i id="edit" class='bx bxs-edit' aria-hidden="true"></i></a>
            <a href="<?= "index.php?action=delete&id" . $projet['id'] ?>"><i id="del" class='bx bxs-x-square' aria-hidden="true"></i> </a>
        </td>
        </tr>
    <?php endforeach; ?>
    </table>
</section>