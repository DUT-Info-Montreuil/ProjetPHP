<?php

require_once './modules/ModProfil/cont_profil.php';

class ModProfil
{
    private $controleur;

    public function __construct()
    {
        $this->controleur = new ContProfil();
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "Profil";
        }
        switch ($action) {
            case 'Profil':
                if(isset($_SESSION['login'])){
                    $username = $_SESSION['login'];
                    $this->controleur->monProfil($username);
                }

                break;
            case 'FormModifProfil':
                $this -> controleur-> formulaireModif();
                break;
            case 'ModificationProfil':
                /*
                if(isset($_SESSION['login'])){
                    $oldlogin = $_SESSION['login'];
                }
                $login = htmlspecialchars($_POST['civiliteNv']);
                $nom = htmlspecialchars($_POST['nomModif']);
                $prenom = htmlspecialchars($_POST['prenomNv']);
                $mdp = hash('sha256', $_POST['mdpNv']);
                $mailo = htmlspecialchars($_POST['mailNv']);
                $adresse = htmlspecialchars($_POST['adresseNv']);
                $this -> controleur -> ModifierProfil($login,$mdp,$mailo,$nom,$prenom,$adresse,$oldlogin);
                break;
               */
        }

    }
}


