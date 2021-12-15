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
        if(isset($_SESSION['login'])) {
            require_once "./modules/Affichage/profil.php";
            $this->vue->form_deconnexion();
        }
        else {
            $this->vue->form_connexion();
        }
    }

    function connexion () {

        $login=$_POST['login'];
        $password=$_POST['password'];
        $user=$this->modele->connexion($login);


        if(!empty($user)) {
            $count=password_verify($password,$user['password']);

            if($count) {
                $_SESSION['login']=$login;
                $this->test_connexion();
            }
            else {
                echo "mdp pas bon";
                $this->vue->form_connexion();
            }
        }

        else {
            echo "Login incorrecte";
            $this->test_connexion();
        }

    }
    function deconnexion () {
        unset($_SESSION['login']);
        $this->vue->form_connexion();
    }

}
?>
