<?php
require_once "./Vue/Vue.php";

class VueMatchs
{


    function afficherPageMatchs($data,$dates,$sommeLikes,$sommeDeslikes)
    {
        $data["titre"] = "Matchs";
        $data["listeDatesMatchs"] = $dates;
        $data['sommeLikes']= $sommeLikes;
        $data['sommeDeslikes'] = $sommeDeslikes;
        Vue::render("Affichage/gererMatchs.php", $data);

    }


    function afficherFormulaireCreationMatch(){
        Vue::render("Affichage/creationMatch.php",["titre"=>"Creation Match"]);

    }
    function afficherLaListeMatch($liste){
        $data["titre"] = "Matchs";
        $data["liste"] = $liste;
        vue::render("Affichage/pageMatchs.php", $data);

    }
    function afficherLesMatchsRechercher($liste){
        $data["liste"] = $liste;
        include_once("Affichage/recherche_match.php");
    }

    function afficherMesMatchs($liste){
            $data["titre"] = "Mes Matchs";
            $data["liste"] = $liste;
            Vue::render("Affichage/mesMatchs.php", $data);
    }
    function afficherFormAjoutePhotos(){
        Vue::render("Affichage/ajouterPhotosMatchs.php",["titre"=>"Ajouter Photos"]);

    }
    function afficherMatchsAmis($liste,$AmisParticipants){
        $data["titre"] = "Matchs de vos amis";
        $data["liste"] = $liste;
        $data["AmisParticipants"] = $AmisParticipants;

        Vue::render("Affichage/matchsAmis.php",$data);

    }
    function afficherMatchsInviter($listeMatchs,$listeAmis){
        $data["titre"] = "Mes demandes de match";
        $data["Matchs"] = $listeMatchs;
        $data["AmisInvitants"] = $listeAmis;
        Vue::render("Affichage/match_Inviter.php",$data);
    }


    function afficherFormAjouterPhotos(){
        Vue::render("Affichage/espaceAjoutPhotos.php",["titre"=>"Ajouter Photos"]);

    }
    function afficherPhotosMatchs($PhotosDiscussion,$photosGalerry){
        $data["titre"] = "Photos Matchs";
        $data["liste"] = $PhotosDiscussion;
        $data["liste2"] = $photosGalerry;
        Vue::render("Affichage/photosMatchs.php",$data);
    }
    function afficherMatch($data){
        $data["titre"] = "Match";
        Vue::render("Affichage/match.php" ,$data);
    }

    function afficherNotifications($liste){
        $data["liste3"] = $liste;
        include("Affichage/notifications.php");
    }
    function afficherNombreNotifications($nbNotif){
        $data["liste4"] =$nbNotif;
        include("Affichage/nombreNotifications.php");
    }
    function alerte_message($message,$alerte,$url) {
        Vue::alerte_message($message,$alerte,$url);
    }

}