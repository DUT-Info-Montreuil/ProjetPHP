<?php

require_once "./Vue/Vue.php";
class VueInscription{
 
    function form_inscription() {
        Vue::render("Affichage/inscription.php",["titre"=>"Inscription"]);
    }

    function alerte_message($message,$alerte,$url) {
        Vue::alerte_message($message,$alerte,$url);
    }

    function form_connexion() {
        Vue::render("Affichage/connexion.php",["titre"=>"Connexion"]);
    }


}


?>