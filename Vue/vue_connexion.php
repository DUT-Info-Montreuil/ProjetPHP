<?php

require_once "./Vue/Vue.php";
class VueConnexion {

    function form_connexion() {
        Vue::render("Affichage/connexion.php",["titre"=>"Connexion"]);
    }

    function form_deconnexion() {
        Vue::render("Affichage/deconnexion.php");
    }
}

?>