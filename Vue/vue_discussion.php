<?php
require_once "./Vue/Vue.php";

class VueDiscussion
{
    function afficherFormulaireDiscussion($liste,$messages,$idUser,$nomMatch){
        $data= explode(",", $liste);
        $data["titre"] = "Discussion ";
        $data["nomMatch"]=$nomMatch;
        $data["liste"] = $liste;
        $data["messages"] = $messages;
        $data["userTest"] = $idUser;
        Vue::render("Affichage/discussionMatchs.php", $data);

    }

    function alerte_message($message,$alerte,$url) {
        Vue::alerte_message($message,$alerte,$url);
    }

}