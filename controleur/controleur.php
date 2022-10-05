<?php

namespace OpenClassrooms\Portfolio\Controleur; // La classe sera dans ce namespace

require_once 'Modele/modeleProjets.php';
require_once 'Modele/modeleAdmin.php';

class Controleur 
{
    private $modeleProjets;
    private $modeleAdmin;

    public function __construct()
    {
        $this->modeleProjets = new \OpenClassrooms\Portfolio\Modele\ProjetsManager();
        $this->modeleAdmin = new \OpenClassrooms\Portfolio\Modele\AdminManager();
    }

    //// PARTIE PROJET /////


    // Affiche la liste de tous les projets du site
    public function accueil()
    {
        $projets = $this->modeleProjets->getProjets();
        require 'Vue/vueAccueil.php';

    }

    // Affiche les détails sur un billet
    public function projet($idProjet)
    {
        $projet = $this->modeleProjets->getOneProjet($idProjet);
        $vue = new \OpenClassrooms\Portfolio\Vue\Vue("Projet");
        $vue->generer(array('projet' => $projet));
    }



    //// PARTIE ADMIN /////


    // Ajoute l'admin à la base de données
    public function adminAJout($pseudo, $pass)
    {
        $admin = $this->modeleAdmin->ajouterAdmin($pseudo, $pass);
        if ($admin) {
        header('Location: index.php?action=inscriptionadmin');
   
        }
        // Actualisation de l'affichage
        throw new \Exception('Impossible d\'ajouter l\'admin');
    }

    // Affiche la page d'administration
    public function admin()
    {
        $projets = $this->modeleProjets->getProjets();
        $vue = new \OpenClassrooms\Portfolio\Vue\Vue("Admin");
        $vue->generer(array('projets' => $projets));
    }



}