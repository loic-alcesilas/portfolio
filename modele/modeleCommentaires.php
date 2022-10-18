<?php

namespace OpenClassrooms\Portfolio\Modele; // La classe sera dans ce namespace 

require_once "Config/modele.php";

class CommentairesManager extends Modele

{
    // Renvoie la liste des commentaires associés à un Projet
    public function getCommentaires($idProjet)
    {
        $sql = 'SELECT com_id AS id, com_AUTEUR AS auteur,'
            . ' COM_CONTENU as contenu from commentaire'
            . ' where `projets`.`id` = ?';
        $commentaires = $this->executerRequete($sql, array($idProjet));
        return $commentaires;
    }

    // ajoute un commentaire en BDD
    public function ajouterCommentaire($auteur, $contenu, $idProjet)
    {
        $sql = 'INSERT into commentaire(COM_AUTEUR, COM_CONTENU, PROJET_ID)'
            . ' values(?, ?, ?)';
        $ajout = $this->executerRequete($sql, array($auteur, $contenu, $idProjet));
        return $ajout;
    }


    //  Supprime un Projet de la base de données
    public function deleteCommentaire($idCommentaire)
    {
        // Supprime un Projet de la base de données
        $sql = 'DELETE FROM `commentaire` WHERE `commentaire`.`com_ID` = ?';
        $suppression = $this->executerRequete($sql, array($idCommentaire));
        return $suppression;
    }
}
