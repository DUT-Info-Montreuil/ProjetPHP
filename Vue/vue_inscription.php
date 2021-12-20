<?php

require_once "./Vue/Vue.php";
class VueInscription{
 
    function form_inscription() {
        Vue::render("Affichage/inscription.php",["titre"=>"Inscription"]);
    }

    function form_script_reussi() {
        $message='Votre compte est maintenant créé';
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    }


    function form_script_loginExistant($login) {
        $message="Erreur l'adresse mail : $login est deja associee à un compte";
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    }

    function form_connexion() {
        Vue::render("Affichage/connexion.php",["titre"=>"Connexion"]);
    }


}


?>