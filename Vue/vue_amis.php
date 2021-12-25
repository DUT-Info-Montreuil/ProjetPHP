<?php
require_once "./Vue/Vue.php";

class VueAmis
{

    function afficherLesUtilisateurs($liste)
    {
        $data["titre"] = "utilisateurs";
        $data["liste"] = $liste;
        Vue::render("Affichage/utilisateurs.php", $data);
    }

    function afficherLesDemandesAmi($liste)
    {
        $data["titre"] = "Invitations";
        $data["liste"] = $liste;
        Vue::render("Affichage/invitations.php", $data);

    }

    function afficherMesAmis($liste)
    {
        $data["titre"] = "Mes Amis";
        $data["liste"] = $liste;
        Vue::render("Affichage/amis.php", $data);


    }
}