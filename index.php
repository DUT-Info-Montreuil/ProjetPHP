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
    case "ModProfil":
        require_once "./modules/$module/$module.php";
        new $module();
    break;
    default :
        die("Interdiction d'accès");
}
