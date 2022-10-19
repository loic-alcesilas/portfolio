<?php

namespace OpenClassrooms\Portfolio\Controleur; // La classe sera dans ce namespace

require_once 'Modele/modeleProjets.php';
require_once 'Modele/modeleAdmin.php';
require_once 'Modele/modeleUtilisateur.php';
require_once 'Modele/modeleCommentaires.php';
require_once 'Config/vue.php';

class Controleur 
{
    private $modeleProjets;
    private $modeleAdmin;
    private $modeleUtilisateur;
    private $modeleCommentaires;

    public function __construct()
    {
        $this->modeleProjets = new \OpenClassrooms\Portfolio\Modele\ProjetsManager();
        $this->modeleAdmin = new \OpenClassrooms\Portfolio\Modele\AdminManager();
        $this->modeleUtilisateur = new \OpenClassrooms\Portfolio\Modele\UtilisateurManager();
        $this->modeleCommentaires = new \OpenClassrooms\Portfolio\Modele\CommentairesManager();
    }

    //// PARTIE PROJET ET COMMENTAIRE /////

    // Affiche la liste de tous les projets du site
    public function accueil()
    {
        $projets = $this->modeleProjets->getProjets();
        require 'Vue/vueAccueil.php';

    }

    // Affiche les détails sur un Projet et Commentaires
    public function projet($idProjet)
    {
        $projet = $this->modeleProjets->getOneProjet($idProjet);
        $commentaires = $this->modeleCommentaires->getCommentaires($idProjet);
        $vue = new \OpenClassrooms\Portfolio\Vue\Vue("Projet");
        $vue->generer(array('projet' => $projet,  'commentaires' => $commentaires));
    }

      // Ajouter un commentaire
      public function commenter($auteur, $contenu, $idProjet)
      {
          $projet = $this->modeleProjets->getOneProjet($idProjet);
          $commenter = $this->modeleCommentaires->ajouterCommentaire($auteur, $contenu, $idProjet);
          if ($commenter) {
              header('Location: index.php?action=Projet&id=' . $projet["id"]);
  
          } else {
              throw new \Exception('Impossible d\'ajouter le commentaire !');
          }
  
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

    // Supprime les données liées à un projet avec c'est commentaire de la bdd
    public function supprimer($idProjet)
    {
        $projet = $this->modeleProjets->getProjets($idProjet);
        $supprimer = $this->modeleProjets->deleteProjet($idProjet);
        $supprimer = $this->modeleProjets->deleteProjetCom($idProjet);
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
    public function logoutAdmin()
    {
        session_start();
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();
        header('Location: index.php');
    }

    //// PARTIE UTILISATEUR /////

    // Affiche la page pour aller a laconnexion ou inscription
    public function VueUtilisateur()
    {
        $vue = new \OpenClassrooms\portfolio\Vue\Vue("Utilisateur");
        $vue->generer(array());
    }

        

    public function authentification($nom, $resultat)
    {

        $user = $this->modeleUtilisateur->getUser($nom);
        $isPasswordCorrect = password_verify($resultat, $user['mdp']);

        if ($isPasswordCorrect) {
            
            session_name('user');
            session_start();
            $_SESSION['nom'] = $nom;
            header('Location: index.php?action=VueUtilisateur');
            
        } else {
            throw new \Exception("Mauvais identifiant ou mot de passe !");

        }
    }
    
    
    // Ajoute un utilisateur à la base de données
    public function utilisateur($nom, $mdp)
    {
        $utilisateur = $this->modeleUtilisateur->ajouterUtilisateur($nom, $mdp);
        if ($utilisateur) {
            header('Location: index.php');

        }
        // Actualisation de l'affichage
        throw new \Exception('Impossible d\'ajouter l\'utilisateur');
    }

     // Clotûre la session
     public function logoutUser()
     {
        session_name('user');
        session_start();
        // Suppression des variables de session et de la session
         $_SESSION = array();
         session_destroy();
         header('Location: index.php');
     }
 


}