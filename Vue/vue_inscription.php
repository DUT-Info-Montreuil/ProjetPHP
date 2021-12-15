<?php

require_once "./Vue/Vue.php";
class VueInscription{
 
    function form_inscription() {
        Vue::render("Affichage/inscription.php",["titre"=>"Inscription"]);
    }

}


?>