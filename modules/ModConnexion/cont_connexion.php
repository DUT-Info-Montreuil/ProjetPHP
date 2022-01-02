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
                exit();
            }
            else {
                $this->vue->form_script_mdp_incorrect();
                $this->vue->form_connexion();
            }
        }

        else {
            $this->vue->form_script_login_incorrect($login);
            $this->vue->form_connexion();
        }

    }

    function deconnexion() {
        unset($_SESSION['login']);
        $this->vue->form_connexion();
    }
}
?>
