<?php
/*
session_start();
require_once './Connexion.php';
if (!isset($_GET['module'])) {
        $_GET['module']="ModProfil";
}
$module = $_GET['module'];

switch ($module) {
    case "ModProfil":
        require_once "./modules/$module/$module.php";
        new $module();
        break;
    default :
        die("Interdiction d'accès");
}
Connexion::initConnexion();
*/
require_once "./modules/Affichage/Profil.html";

?>
