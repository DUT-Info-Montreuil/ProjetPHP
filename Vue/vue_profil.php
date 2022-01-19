<?php
require_once "./Vue/Vue.php";

class VueProfil
{


    function afficherProfil($data)
    {
        $data["titre"]="Mon Profil";
        Vue::render("Affichage/profil.php",$data);
    }
    function afficherProfilAdmin($data){
        $data["titre"]="Mon Profil";
        Vue::render("Affichage/profilAdmin.php",$data);

    }


    function afficherFormulaireModifier($data){
        $data["titre"]="Modification";
        Vue::render("Affichage/formulaireModifProfil.php",$data);

    }

    function afficherMessageAlerte(){
        $data["titre"]="Deconnecter";
        Vue::render("Affichage/messageAlerte.php",$data);
    }

    function afficherProfilUtilisateur($data){
        $data["titre"]="Profil Utilisateur";
        Vue::render("Affichage/profilUtilisateur.php",$data);
    }

}