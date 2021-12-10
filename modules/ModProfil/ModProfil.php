<?php

require_once './modules/ModProfil/cont_profil.php';

class ModProfil
{
    private $controleur;

    public function __construct()
    {
        $this->controleur = new ContAccueil();
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "Profil";
        }
        switch ($action) {
            case 'Profil':
                if(isset($_SESSION['login'])){
                    $username = $_SESSION['login'];
                    $this -> controleur -> monProfil($username);
                }
                break;
        }

    }
}


