<?php
require_once "./Vue/Vue.php";

class VueProfil
{


    function afficherProfil($data)
    {
        Vue::render("Affichage/profil.php", $data);
        Vue::render("Affichage/profil.php",["titre"=>"profil"]);

    }


    function afficherFormulaireModifier()
    {
        require_once("Affichage/formulaireModifProfil.php");

    }
    function afficherMessageAlerte(){
        Vue::render("Affichage/MessageAlerte.php");
    }
}