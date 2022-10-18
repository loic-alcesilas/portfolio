<?php

namespace OpenClassrooms\Portfolio\Modele; // La classe sera dans ce namespace

require_once "Config/modele.php";

class UtilisateurManager extends Modele
{

    public function getUser($nom)
    {
        //  Récupération de l'utilisateur et de son pass hashé
        $sql = 'SELECT id, mdp FROM users WHERE nom = ?';
        $connexion = $this->executerRequete($sql, array($nom));
        $resultat = $connexion->fetch();
        return $resultat;

    }

    public function ajouterUtilisateur($nom, $mdp)
    {
        $sql = 'INSERT into users(nom, mdp)'
            . ' values(?, ?)';
        $ajout = $this->executerRequete($sql, array($nom, $mdp));
        return $ajout;
    }

}
