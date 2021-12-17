<?php
require_once "./Vue/Affichage/profil.php";

class VueProfil
{


    function afficherProfil($data)
    {
        var_dump($data);
        die();
        Vue::render('profil.php', $data);

    }

    function afficherFormulaireModifier()
    {
        require_once './modules/Affichage/formulaireModifProfil.html';

    }
}