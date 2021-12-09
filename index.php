<?php

require_once "./Connexion.php";
session_start();

if (!isset($_GET['module'])) {
    $module="ModAccueil";
}
else {
    $module = $_GET['module'];
}

Connexion::initConnexion();

switch ($module) {
    case "ModConnexion":
    case "ModInscription":
    case "ModAccueil":
        require_once "./modules/$module/$module.php";
        require_once "./modules/Affichage/header.php";
        new $module();
        break;
    default :
        die("Interdiction d'accès");
}
require_once "./modules/Affichage/footer.php";

?>