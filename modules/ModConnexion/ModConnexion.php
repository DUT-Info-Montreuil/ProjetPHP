<?php

require_once "./modules/ModConnexion/cont_connexion.php";

class ModConnexion
{
    private $controleur;

    function __construct()
    {

        $this->controleur = new ContConnexion();


        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "formulaire";
        }

        switch ($action) {
            case 'formulaire' :
                $this->controleur->test_connexion();
                break;
            case 'connexion' :
                $this->controleur->connexion();
                break;
            case 'deconnexion':
                $this->controleur->deconnexion();
                break;
            default:
                $this->controleur->test_connexion();
                break;
        }
    }
}

