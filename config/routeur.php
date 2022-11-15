<?php

namespace OpenClassrooms\Portfolio\Routeur;

require_once 'Controleur/controleur.php';
require_once 'Config/vue.php';

class Routeur
{
    private $ctrl;

    public function __construct()
    {
        $this->ctrl = new \OpenClassrooms\Portfolio\Controleur\Controleur();
    }

    // Traite une requête entrante
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {

                //// PARTIE PROJET ET COMMENTAIRE /////

                // ACTION POUR OBTENIR LES PROJETS
                if ($_GET['action'] == 'Projet') {
                    if (isset($_GET['id'])) {
                        $idProjet = intval($this->getParametre($_GET, 'id'));
                        if ($idProjet != 0) {
                            $this->ctrl->projet($idProjet);
                        } else {
                            throw new \Exception("Identifiant de Projet non valide");
                        }
                    } else {
                        throw new \Exception("Identifiant de Projet non défini");
                    }
                }

                
                //  ACTION POUR COMMENTER UN ARTICLE
                else if ($_GET['action'] == 'commenter') {
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idProjet = $this->getParametre($_POST, 'id');
                    $this->ctrl->commenter($contenu, $idProjet);

                }

                //  ACTION POUR SIGNALER UN COMMENTAIRE
                else if ($_GET['action'] == 'signalerCommentaire') {
                    $idProjet = $this->getParametre($_GET, 'id');
                    $idCommentaire = $this->getParametre($_GET, 'id');
                    $this->ctrl->signalerCommentaires($idProjet, $idCommentaire);
                }
                
                // ACTION POUR VALIDER UN COMMENTAIRE
                else if ($_GET['action'] == 'validerCom') {

                    
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'admin vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $idCommentaire = $this->getParametre($_GET, 'id');
                        $this->ctrl->validerCommentaire($idCommentaire);
                    }

                }
                
                // ACTION POUR SUPPRIMER UN COMMENTAIRE
                else if ($_GET['action'] == 'deleteCom') {
                   
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $idCommentaire = $this->getParametre($_GET, 'id');
                        $this->ctrl->supprimerCommentaire($idCommentaire);
                    }
                }

                //// PARTIE ADMIN LOGIN /////

                // ACTION POUR INSCRIRE ADMIN DANS LA BDD
                else if ($_GET['action'] == 'signin') {
                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                    $this->ctrl->adminAjout($pseudo, $pass);
                }

                // ACTION POUR ALLER SUR LA PAGE S'INSCRIRE
                else if ($_GET['action'] == 'signadmin') {
                    $vue = new \OpenClassrooms\Portfolio\Vue\Vue("Inscriptionadmin");
                    $vue->generer(array());
                }

                // ACTION POUR ATTEINDRE LA PAGE CONNEXION ADMIN
                else if ($_GET['action'] == 'loginVueAdmin') {
                    require 'Vue/vueConnexionAdmin.php';

                }

                 // ACTION POUR CONNECTER ADMIN
                 else if ($_GET['action'] == 'connexionAdmin') {
                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $resultat = $this->getParametre($_POST, 'pass');
                    $this->ctrl->authentificationAdmin($pseudo, $resultat);

                }

                // ACTION POUR ARRIVER SUR LA PAGE ADMINISTRATION
                else if ($_GET['action'] == 'adminVue') {
                    
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $this->ctrl->admin();

                    }
                }

                 //// PARTIE CRUD /////

                //ACTION POUR SUPPRIMMER UN PROJET
                else if ($_GET['action'] == 'delete') {

                    
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $idProjet = $this->getParametre($_GET, 'id');
                        $this->ctrl->supprimer($idProjet);
                    }

                }

                // ACTION POUR ACCÉDER À LA PAGE DE MODIFICATION D'UN PROJET
                else if ($_GET['action'] == 'modifierProjet') {

                    
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $idProjet = $this->getParametre($_GET, 'id');
                        $this->ctrl->changerProjet($idProjet);
                    }

                }

                  // ACTION POUR MODIFIER UN PROJET EXISTANT

                  else if ($_GET['action'] == 'modificationProjet') {

                    
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else { 
                        
                        $idProjet = $this->getParametre($_GET, 'id');
                        $titre = $this->getParametre($_POST, 'titre');
                        $image_desc = $this->getParametre($_POST, 'image_desc');
                        $image_projet = $this->getParametre($_POST, 'image_projet');
                        $image_projet2 = $this->getParametre($_POST, 'image_projet2');
                        $desc_img = $this->getParametre($_POST, 'desc_img');
                        $desc_img2 = $this->getParametre($_POST, 'desc_img2');
                        $contenue = $this->getParametre($_POST, 'contenue');
                        $competence = $this->getParametre($_POST, 'competence');
                        $this->ctrl->modifierProjets($titre, $image_desc, $image_projet, $image_projet2, $desc_img, $desc_img2, $contenue, $competence, $idProjet);
                    }

                }

                // ACTION POUR ACCÉDER À LA PAGE D'AJOUT D'ARTICLE
                else if ($_GET['action'] == 'vueProjet') {

                    
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $vue = new \OpenClassrooms\Portfolio\Vue\Vue("AjoutProjet");
                        $vue->generer(array());
                    }

                }

                  // ACTION POUR POSTER LE NOUVEAU PROJET
                else if ($_GET['action'] == 'ajoutProjet') {

                    
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $titre = $this->getParametre($_POST, 'titre');
                        $image_desc = $this->getParametre($_POST, 'image_desc');
                        $image_projet = $this->getParametre($_POST, 'image_projet');
                        $image_projet2 = $this->getParametre($_POST, 'image_projet2');
                        $desc_img = $this->getParametre($_POST, 'desc_img');
                        $desc_img2 = $this->getParametre($_POST, 'desc_img2');
                        $contenue = $this->getParametre($_POST, 'contenue');
                        $competence = $this->getParametre($_POST, 'competence');
                        $this->ctrl->vueProjet($image_desc, $titre, $image_projet, $image_projet2, $desc_img, $desc_img2, $competence, $contenue);
                    }

                }

                //// PARTIE UTILISATEUR /////

                // ACTION POUR INSCRIRE USER DANS LA BDD
                else if ($_GET['action'] == 'signinUser') {
                    $nom = $this->getParametre($_POST, 'nom');
                    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                    $this->ctrl->utilisateur($nom, $mdp);
                }

                // ACTION POUR ALLER SUR LA PAGE S'INSCRIRE
                else if ($_GET['action'] == 'signinVueUser') {
                    $vue = new \OpenClassrooms\Portfolio\Vue\Vue("InscriptionUser");
                    $vue->generer(array());
                }

                // ACTION POUR ATTEINDRE LA PAGE CONNEXION USER
                else if ($_GET['action'] == 'loginVueUser') {
                    require 'Vue/vueConnexionUser.php';

                }

                 // ACTION POUR CONNECTER USER
                 else if ($_GET['action'] == 'connexionUser') {
                    $nom = $this->getParametre($_POST, 'nom');
                    $resultat = $this->getParametre($_POST, 'mdp');
                    $this->ctrl->authentification($nom, $resultat);

                }
                
                  // ACTION POUR aller sur la pade connexion/inscription 
                  else if ($_GET['action'] == 'VueUtilisateur') {

                    $this->ctrl->VueUtilisateur();

                } 
                
                  // ACTION POUR SE DÉCONNECTER
                  else if ($_GET['action'] == 'logoutAdmin') {

                    $this->ctrl->logoutAdmin();

                } 

                // ACTION POUR SE DÉCONNECTER
                else if ($_GET['action'] == 'logoutUser') {

                    $this->ctrl->logoutUser();

                } else {
                    throw new \Exception("Action non valide");
                }


            }

            // DÉFINITION DE L'ACTION PAR DÉFAULT
            else {
                $this->ctrl->accueil();
            }
        } catch (\Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new \OpenClassrooms\Portfolio\Vue\Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else {
            throw new \Exception("Paramètre '$nom' absent");
        }
    }
}
