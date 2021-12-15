<?php
require_once "./Vue/Vue.php";

class VueAccueil{

    function pageAccueil(){
        Vue::render("Affichage/accueil.php",["titre"=>"Accueil"]);
    }
}
