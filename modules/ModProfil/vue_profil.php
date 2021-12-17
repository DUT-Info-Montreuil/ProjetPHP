<?php
require_once "./Vue/Affichage/profil.php";

class VueProfil
{


    function afficherProfil($profil)
    {
        Vue::render('profil.php', $profil);

    }

    function afficherFormulaireModifier()
    {
        require_once './modules/Affichage/formulaireModifProfil.html';

    }
}