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

    // Renvoie les informations sur un projet
    public function getOneProjet($idProjet)
    {
        $sql = 'select id, titre, contenue, image_desc, image_projet'
            . ' from projets'
            . ' where id=?';
        $projet = $this->executerRequete($sql, array($idProjet));
        if ($projet->rowCount() > 0) {

            // if ($billet->rowCount() == 1) {
            return $projet->fetch();
        }
        else {
            throw new \Exception("Aucun projet ne correspond à l'identifiant '$idProjet'");
        }
    }

    
}