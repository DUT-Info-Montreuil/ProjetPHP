<?php

require_once "./Connexion.php";
session_start();

if (!isset($_GET['module'])) {
    $module="ModConnexion";
}
else {
    $module = $_GET['module'];
}

Connexion::initConnexion();

switch ($module) {
    case "ModJoueurs":
    case "ModEquipe":
    case "ModConnexion":
    case "ModProfil":
    case "ModAccueil":
    case "ModInscription":
        require_once "./modules/$module/$module.php";
        require_once "./modules/Affichage/header.php";
        new $module();
        break;
    default :
        die("Interdiction d'accès");
}
require_once "./modules/Affichage/footer.php";

?>
