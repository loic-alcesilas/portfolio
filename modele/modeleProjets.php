<?php

namespace OpenClassrooms\Portfolio\Modele; // La classe sera dans ce namespace

require_once "Config/modele.php";

class ProjetsManager extends Modele
{
    // Renvoie la liste de tous les billets, triés par identifiant décroissant
    public function getProjets()
    {
        $sql = 'SELECT id, titre, image_desc FROM projets ORDER BY id desc';
        $projets = $this->executerRequete($sql);
        return $projets;
    }

    // Renvoie les informations sur un projet
    public function getOneProjet($idProjet)
    {
        $sql = 'select id, titre, desc_img, desc_img2, image_desc, image_projet, image_projet2, contenue, competence'
            . ' from projets'
            . ' where id=?';
        $projet = $this->executerRequete($sql, array($idProjet));
        if ($projet->rowCount() > 0) {

            // if ($billet->rowCount() == 1) {
            return $projet->fetch();
        } else {
            throw new \Exception("Aucun projet ne correspond à l'identifiant '$idProjet'");
        }
    }

    // Ajoute les données du Projet dans la table associée
    public function insertProjet($image_desc, $titre, $image_projet, $image_projet2, $desc_img, $desc_img2, $competence, $contenue)
    {
        $sql = 'INSERT into projets(image_desc, titre, image_projet, image_projet2, desc_img, desc_img2, competence, contenue)'
            . ' values(?, ?, ?, ?, ?, ?, ?, ?)';

        $ajoutProjet = $this->executerRequete($sql, array($image_desc, $titre, $image_projet, $image_projet2, $desc_img, $desc_img2, $competence, $contenue));
        return $ajoutProjet;
    }

    // Modifie les données du projet dans la table associée
    public function modifierProjet($idProjet, $image_desc, $titre, $image_projet, $image_projet2, $desc_img, $desc_img2, $competence, $contenue)
    {
        $sql = 'UPDATE projets SET titre=?, image_desc=?, image_projet=?, image_projet2=?, desc_img=?, desc_img2=?, contenue=?, competence=? WHERE `projets`.`id` = ?';
        $modifierProjet = $this->executerRequete($sql, array($idProjet, $image_desc, $titre, $image_projet, $image_projet2, $desc_img, $desc_img2, $competence, $contenue));
 
        return $modifierProjet;
    }   

    //  Supprime un projet de la base de données
    public function deleteProjet($idProjet)
    {
        $sql = 'DELETE FROM `projets` WHERE `projets`.`id` = ?';
        $suppression = $this->executerRequete($sql, array($idProjet));
        return $suppression;
    }
}
