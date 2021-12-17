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
               //$this -> controleur ->monProfil2();
                var_dump($_SESSION['login']);
                exit();
                if(isset($_SESSION['login'])){
                    $username = $_SESSION['login'];
                    echo "connecte";
                    $this->controleur->monProfil($username);
                }
                break;
            case 'FormModifProfil':
                $this -> controleur-> formulaireModif();
                break;
            case 'ModificationBD':
                if(isset($_SESSION['login'])){
                    $oldpseudo = $_SESSION['login'];
                }
                $pseudo = htmlspecialchars($_POST['civiliteNv']);
                $nom = htmlspecialchars($_POST['nomModif']);
                $prenom = htmlspecialchars($_POST['prenomModif']);
                $mdp = hash('sha256', $_POST['mdpModif']);
                $mailo = htmlspecialchars($_POST['mailModif']);
                $adresse = htmlspecialchars($_POST['adresseModif']);
                $tel = htmlspecialchars($_POST['telModif']);
                $this -> controleur -> BdModificaton($pseudo,$mdp,$mailo,$nom,$prenom,$adresse,$tel,$oldpseudo);
                break;
        }

    }
}


