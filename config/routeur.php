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

                //// PARTIE PROJET /////

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

                //ACTOIN POUR SUPPRIMMER UN PROJET
                else if ($_GET['action'] == 'delete') {

                    session_start();
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $idProjet = $this->getParametre($_GET, 'id');
                        $this->ctrl->supprimer($idProjet);
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
                    require 'Vue/vueConnexion.php';

                }

                 // ACTION POUR CONNECTER ADMIN
                 else if ($_GET['action'] == 'connexionAdmin') {
                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $resultat = $this->getParametre($_POST, 'pass');
                    $this->ctrl->authentificationAdmin($pseudo, $resultat);

                }

                // ACTION POUR ARRIVER SUR LA PAGE ADMINISTRATION
                else if ($_GET['action'] == 'adminVue') {
                    session_start();
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $this->ctrl->admin();

                    }
                }

                 //// PARTIE CRUD AJOUTPROJET /////

                // ACTION POUR ACCÉDER À LA PAGE D'AJOUT D'ARTICLE
                else if ($_GET['action'] == 'vueProjet') {

                    session_start();
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

                    session_start();
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

                // ACTION POUR SE DÉCONNECTER
                else if ($_GET['action'] == 'logout') {

                    $this->ctrl->logout();

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
