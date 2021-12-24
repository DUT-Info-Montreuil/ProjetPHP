<?php
require_once "./Vue/Vue.php";

class VueProfil
{


    function afficherProfil($data)
    {
        $data["titre"]="Mon Profil";
        Vue::render("Affichage/profil.php",$data);

    }

    function afficherFormulaireModifier($data){
        $data["titre"]="Modification";
        Vue::render("Affichage/formulaireModifProfil.php",$data);

    }
    function afficherMessageAlerte(){
        Vue::render("Affichage/MessageAlerte.php");
    }
}