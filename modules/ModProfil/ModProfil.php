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
                $username = $_SESSION['login'];
                $this -> controleur-> formulaireModif($username);
                break;
            case 'ModificationProfil':
                if(isset($_SESSION['login'])){
                    $login = $_SESSION['login'];
                }
                $nom = htmlspecialchars($_POST['nomNv']);
                $prenom = htmlspecialchars($_POST['prenomNv']);
                $age = htmlspecialchars($_POST['ageNv']);
                $sexe = htmlspecialchars($_POST['civiliteNv']);
                $posteMatch =htmlspecialchars($_POST['posteNv']);
                $email = htmlspecialchars($_POST['emailNv']);
                $ville=htmlspecialchars($_POST['villeNv']);
                $password = password_hash( $_POST['passwordNv'],PASSWORD_DEFAULT);
                $this -> controleur -> ProfilModification($nom,$prenom,$age,$sexe,$posteMatch ,$email,$ville,$password, $login);
                break;
            case 'FormSuppProfil' :
                    $username = $_SESSION['login'];
                    $this->controleur->supprimerProfil($username);
                break;
            case 'ConsulterProfil':
                $this->controleur->profilUtilisateur();
                break;
        }

    }
}


