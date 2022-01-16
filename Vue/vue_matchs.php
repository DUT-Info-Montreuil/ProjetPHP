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
        Vue::render("Affichage/pageMatchs.php", $data);
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
        $data["titre"] = "Matchs Amis";
        $data["liste"] = $liste;
        $data["AmisParticipants"] = $AmisParticipants;
        Vue::render("Affichage/matchsAmis.php",$data);

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

    function afficherNotifications($liste){
        $data["liste3"] = $liste;
        include("Affichage/notifications.php");
    }
    function afficherNombreNotifications($nbNotif){
        $data["liste4"] =$nbNotif;
        include("Affichage/nombreNotifications.php");
    }

}