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
