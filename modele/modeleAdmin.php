<?php

namespace OpenClassrooms\Portfolio\Modele; // La classe sera dans ce namespace

require_once "Config/modele.php";

class UtilisateurManager extends Modele
{
    public function getAdmin($pseudo)
    {
        //  Récupération du pseudo de l'admib et de son pass hashé
        $sql = 'SELECT id, pass FROM users WHERE pseudo = ?';
        $connexion = $this->executerRequete($sql, array($pseudo));
        $resultat = $connexion->fetch();
        return $resultat;

    }

    public function ajouterUtilisateur($pseudo, $pass)
    {
        $sql = 'INSERT into admin(pseudo, pass)'
            . ' values(?, ?)';
        $ajoutAdmin = $this->executerRequete($sql, array($pseudo, $pass));
        return $ajoutAdmin;
    }
}