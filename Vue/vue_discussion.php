<?php
require_once "./Vue/Vue.php";

class VueDiscussion
{
    function afficherFormulaireDiscussion($liste,$messages,$idUser)
    {

        $data= explode(",", $liste);
        $data["titre"] = "Discussion ";
        $data["liste"] = $liste;
        $data["messages"] = $messages;
        $data["userTest"] = $idUser;
        Vue::render("Affichage/discussionMatchs.php", $data);

    }


}