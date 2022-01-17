<?php
require_once "./Vue/Vue.php";

class VueAmis
{

    function afficherLesUtilisateurs($liste)
    {
        $data["titre"] = "Utilisateurs";
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
     function afficherUsersRechercher($liste){
         $data["liste"] = $liste;
         include_once("Affichage/recherche_utilisateur.php");
     }
     function afficherNombreLikes($nbLikes){
             $data["liste5"] =$nbLikes;
             include("Affichage/nombreLikes.php");
     }
     function afficherNombreDesLikes($nbDesLikes){
         $data["liste6"] =$nbDesLikes;
         include("Affichage/nombreDesLikes.php");
     }


    function alerte_message($message,$alerte,$url) {
        Vue::alerte_message($message,$alerte,$url);
    }

}