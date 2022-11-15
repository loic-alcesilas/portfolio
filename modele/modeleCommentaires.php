<?php

namespace OpenClassrooms\Portfolio\Modele; // La classe sera dans ce namespace 

require_once "Config/modele.php";

class CommentairesManager extends Modele

{
    // Renvoie la liste des commentaires associés à un Projet
    public function getCommentaires($idProjet)
    {
        $sql = 'SELECT com_id AS id,'
            . ' COM_CONTENUE as contenu, COM_DATE as date, user_id from commentaire'
            . ' where  PROJET_ID= ?';
        $commentaires = $this->executerRequete($sql, array($idProjet));
        return $commentaires->fetchAll();
    }

    // ajoute un commentaire en BDD
    public function ajouterCommentaire( $contenu, $idProjet)
    {
        $sql = 'INSERT into commentaire(COM_DATE, COM_CONTENUE, PROJET_ID, user_id)'
            . ' values(NOW(), ?, ?, ?)';
        $ajout = $this->executerRequete($sql, array($contenu, $idProjet, $_SESSION['user_id']));
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

       // Renvoie la liste de tous les commentaires signalés
       public function getComSignale()
       {
           $sql = 'SELECT com_id AS id, com_date AS date,'
               . ' COM_AUTEUR AS auteur, com_contenue AS contenu, com_signale AS signale, PROJET_ID AS idProjet FROM commentaire'
               . ' WHERE com_signale=true';
           $commentaire = $this->executerRequete($sql);
           return $commentaire;
       }

           // Modifie les données d'un commentaire pour le passer en signaler
        public function commentaireSignale($idCommentaire)
        {
        $sql = 'UPDATE commentaire SET com_signale=TRUE WHERE COM_ID = ?';
        $signalerCommentaire = $this->executerRequete($sql, array($idCommentaire));
        return $signalerCommentaire;
        }

        
        // Modifie les données d'un commentaire pour le passer en Validé
        public function commentaireValide($idCommentaire)
        {
        $sql = 'UPDATE commentaire SET com_signale=FALSE WHERE COM_ID = ?';
        $signalerCommentaire = $this->executerRequete($sql, array($idCommentaire));
        return $signalerCommentaire;
        }
}
