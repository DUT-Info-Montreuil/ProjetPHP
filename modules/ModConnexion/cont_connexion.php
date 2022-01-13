<?php

require_once "./Vue/vue_connexion.php";
require_once "./modules/ModConnexion/modele_connexion.php";

class ContConnexion {
    private $modele;
    private $vue;

    function __construct () {
        $this->vue = new VueConnexion();
        $this->modele = new ModeleConnexion();
    }

    function test_connexion () {
        $this->vue->form_connexion();

    }

    function connexion () {

        $login=$_POST['login'];
        $password=$_POST['password'];
        $user=$this->modele->connexion($login);
        if(!empty($user)) {
            $count=password_verify($password,$user['password']);

            if($count) {
                $_SESSION['login']=$login;
                header('Location: index.php?module=ModProfil');
                if (isset($_POST['check'])){
                    setcookie('login' , $login ,time()+360*24*3600,null,null,false,true);
                    setcookie('password' , $password,time()+360*24*3600,null,null,false,true);
                }
                exit();

            }
            else {
                $this->vue->alerte_message("L'adresse mail ou le mot de passe saisie est incorrecte</br>Veuillez réessayer de vous <a href='index.php?module=ModConnexion' class='alert-link'>connecter</a>","danger","index.php?module=ModConnexion");
            }
        }

        else {
            $this->vue->alerte_message("L'adresse mail $login n'appartient à aucun compte</br>Veuillez réessayer de vous <a href='index.php?module=ModConnexion' class='alert-link'>connecter </a>ou vous <a href='index.php?module=ModInscription' class='alert-link'>inscrire</a>","danger","index.php?module=ModInscription");
        }

    }

    function deconnexion() {
        unset($_SESSION['login']);
        $this->vue->form_connexion();
    }
}
?>
