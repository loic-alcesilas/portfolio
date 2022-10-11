<?php

namespace OpenClassrooms\Portfolio\Controleur; // La classe sera dans ce namespace

require_once 'Modele/modeleProjets.php';
require_once 'Modele/modeleAdmin.php';
require_once 'Config/vue.php';

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

     //// PARTIE CRUD PROJET /////

    // Affiche la page pour modifier un projet
    public function changerProjet($idProjet)
    {
        $projet = $this->modeleProjets->getOneProjet($idProjet);
        $vue = new \OpenClassrooms\Portfolio\Vue\Vue("ModifierProjet");
        $vue->generer(array('projet' => $projet));
    }

    // Modifie un projet déjà existant
    public function modifierProjets($idProjet, $image_desc, $titre, $image_projet, $image_projet2, $desc_img, $desc_img2, $competence, $contenue)
    {
        $modifier = $this->modeleProjets->modifierProjet($idProjet, $image_desc, $titre, $image_projet, $image_projet2, $desc_img, $desc_img2, $competence, $contenue);
        if ($modifier) {
            header('Location: index.php?action=adminVue');

        }
        throw new \Exception('Impossible de modifier le projet !');

    }

     // Affiche la page pour ajouter un projet
     public function ajoutProjet()
     {
         $vue = new \OpenClassrooms\Portfolio\Vue\Vue("AjoutProjet");
         $vue->generer(array());
     }

    //affiche le nouveau projet
    public function vueProjet($image_desc, $titre, $image_projet, $image_projet2, $desc_img, $desc_img2, $competence, $contenue)
    {
        $ajouterProjet = $this->modeleProjets->insertProjet($image_desc, $titre, $image_projet, $image_projet2, $desc_img, $desc_img2, $competence, $contenue);
        if ($ajouterProjet) {
            header('Location: index.php?action=adminVue');

        }
        // Actualisation de l'affichage du projet
        throw new \Exception('Impossible d\'ajouter le projet');
    }

    // Supprime les données liées à un projet de la bdd
    public function supprimer($idProjet)
    {
        $projet = $this->modeleProjets->getProjets($idProjet);
        $supprimer = $this->modeleProjets->deleteProjet($idProjet);
        if ($supprimer) {
            header('Location: index.php?action=adminVue');

        }
        // Actualisation de l'affichage
        throw new \Exception('Impossible de supprimer le projet');

    }


    //// PARTIE ADMIN /////


    // Ajoute l'admin à la base de données
    public function adminAjout($pseudo, $pass)
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

    public function authentificationAdmin($pseudo, $resultat)
    {

        $admin = $this->modeleAdmin->getAdmin($pseudo);
        $isPasswordCorrect = password_verify($resultat, $admin['pass']);

        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['pseudo'] = $pseudo;
            header('Location: index.php');
        } else {
            throw new \Exception("Mauvais identifiant ou mot de passe !");

        }
    }

    // Clotûre la session
    public function logout()
    {
        session_start();
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        header('Location: index.php');
    }

    //// PARTIE  /////



}