<?php
require_once "./Vue/Vue.php";

class VueProfil
{


    function afficherProfil($data)
    {
        $data["titre"]="Mon Profil";
        Vue::render("Affichage/profil.php",$data);

    }

    function afficherFormulaireModifier(){
        Vue::render("Affichage/formulaireModifProfil.php",["titre"=>"Modification"] );

    }
    function afficherMessageAlerte(){
        Vue::render("Affichage/MessageAlerte.php");
    }
}