<?php
require_once "./Vue/Vue.php";

class VueMatchs
{


    function afficherPageMatchs($data)
    {
        $data["titre"] = "Matchs";
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
}