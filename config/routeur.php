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
                
                // ACTION POUR INSCRIRE ADMIN DANS LA BDD'
                else if ($_GET['action'] == 'signin') {
                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                    $this->ctrl->adminAJout($pseudo, $pass);
                }

                // ACTION POUR ALLER SUR LA PAGE S'INSCRIRE'
                else if ($_GET['action'] == 'signadmin') {
                    $vue = new \OpenClassrooms\Portfolio\Vue\Vue("Inscriptionadmin");
                    $vue->generer(array());
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
