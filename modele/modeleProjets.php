<?php

namespace OpenClassrooms\Portfolio\Modele; // La classe sera dans ce namespace

require_once "Config/modele.php";

class ProjetsManager extends Modele
{
    // Renvoie la liste de tous les billets, triés par identifiant décroissant
    public function getProjets()
    {
        $sql = 'SELECT id, titre, contenue, image_desc FROM projets ORDER BY id desc';
        $projets = $this->executerRequete($sql);
        return $projets;
    }
    
}