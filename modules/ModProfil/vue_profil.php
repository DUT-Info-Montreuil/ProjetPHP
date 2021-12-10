<?php

class VueProfil
{

    public function __construct(){

    }

    function afficherProfil($Profil)
    {
        echo $Profil['login'];
        echo $Profil['Nom'];
        echo $Profil['Prenom'];
        echo $Profil['age'];
        echo $Profil['sexe'];
        echo $Profil['ville'];
        echo $Profil['posteMatch'];
    }
}


?>