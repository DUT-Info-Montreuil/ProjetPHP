<?php
require_once "./Vue/Vue.php";

class VueAmis
{

    function afficherLesUtilisateurs($data)
    {

        Vue::render("Affichage/utilisateurs.php",$data);

    }
    function afficherLesDemandesAmi($data){

        Vue::render("Affichage/invitations.php",$data);

    }
    function afficherMesAmis($data){

        Vue::render("Affichage/amis.php",$data);

    }

}