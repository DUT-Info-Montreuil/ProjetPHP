<?php
require_once "./Vue/Vue.php";

class VueAdmin
{

    function afficherMatchsExpired($matchs)
    {
        $data["titre"] = "matchs Expired";
        $data["matchsExpired"] = $matchs;
        Vue::render("Affichage/matchsExpired.php", $data);
    }
    function afficherUtilisateursInscrits($users){
        $data["titre"] = "utilisateurs";
        $data["utilisateursInscrits"] = $users;
        Vue::render("Affichage/utilisateursInscrits.php", $data);
    }


    function alerte_message($message,$alerte,$url) {
        Vue::alerte_message($message,$alerte,$url);
    }
}