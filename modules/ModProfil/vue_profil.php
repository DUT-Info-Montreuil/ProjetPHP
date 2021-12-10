<?php

class VueProfil{

    public function __construct () {

    }

function afficherProfil($Profil){
                  echo $Profil['Nom'];
                  echo $Profil['Prenom'];
                  echo $Profil['PositionMatch'];
                  echo $Profil['login'];
                  //(a continuer)

?>