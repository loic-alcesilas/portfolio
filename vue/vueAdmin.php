
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
            <a href="<?= "index.php?action=modifierProjet&id=" . $projet['id'] ?>"><i id="edit" class='bx bxs-edit' aria-hidden="true"></i></a>
            <a href="<?= "index.php?action=delete&id=" . $projet['id'] ?>"><i id="del" class='bx bxs-x-square' aria-hidden="true"></i> </a>
        </td>
        </tr>
    <?php endforeach; ?>
    </table>


    <table class='allProjet'>
    <h2 class="heading" >COMMENTAIRE SIGNALER</h2>
    <tr>
            <td>AUTEUR</td>
            <td>MESSAGE</td>
        </tr>
    <?php foreach ($commentaires as $commentaire) : ?>
            <tr>
                <td><?=htmlspecialchars($commentaire['auteur'])?></td>
                <td><?=htmlspecialchars($commentaire['contenu'])?></td>

                <td>
                    <a href="<?="index.php?action=validerCom&id=" . $commentaire['id']?>"><i class='bx bxs-check-square' aria-hidden="true"></i></a>
                    <a href="<?="index.php?action=deleteCom&id=" . $commentaire['id']?>"><i id="del" class='bx bxs-x-square' aria-hidden="true"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>  
    </table>
</section>