<?php

class VueConnexion {

    function form_connexion() {
        require_once "./modules/Affichage/login.php";
    }

    function form_deconnexion() {
        echo "<a href=index.php?module=ModConnexion&action=deconnexion>Deconnexion</a><br/>";

    }
}

?>