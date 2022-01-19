<?php

require_once './modules/ModAdmin/cont_admin.php';

class ModAdmin
{
    private $controleur;

    public function __construct()
    {

        $this->controleur = new ContAdmin();
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "matchExpired";
        }


        switch ($action) {
            case 'matchsExpired'  :
                $this->controleur->getmatchsExpired();
                break;
            case 'SupprimerMatchExpired':
                $this->controleur->supprimerMatch();
                break;
            case 'UtilisateursInscrits':
                $this->controleur->getUtilisateursInscrits();
                break;
            case 'SupprimerUtilisateur' :
                $this->controleur->supprimerUtilisateurInscrit();
                break;

        }

    }
}


