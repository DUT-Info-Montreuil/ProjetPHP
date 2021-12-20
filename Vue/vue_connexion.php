<?php

require_once "./Vue/Vue.php";
class VueConnexion {

    function form_connexion() {
        Vue::render("Affichage/connexion.php",["titre"=>"Connexion"]);
    }

    function form_profil() {
        Vue::render("Affichage/profil.php",["titre"=>"Mon Profil"]);
    }

    function form_script_mdp_incorrect() {
        $message="Erreur l'adresse mail ou le mot de passe est incorrecte";
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    }

    function form_script_login_incorrect($login) {
        $message="Erreur l'adresse mail $login n'appartient à aucun compte";
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    }
}

?>