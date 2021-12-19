<?php
require_once "./Vue/Vue.php";

class VueProfil
{


    function afficherProfil($data)
    {
        Vue::render("Affichage/profil.php", $data);
    }


    function afficherFormulaireModifier()
    {
        require_once 'Affichage/formulaireModifProfil.php';

    }
}