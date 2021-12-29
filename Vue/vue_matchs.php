<?php
require_once "./Vue/Vue.php";

class VueMatchs
{


    function afficherPageMatchs($data)
    {
        $data["titre"] = "Matchs";
        Vue::render("Affichage/matchs.php", $data);

    }
}