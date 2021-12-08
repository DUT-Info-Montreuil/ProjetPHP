<?php
if (!isset($_GET['module'])) {
    $_GET['module']="ModAccueil";
}
$module = $_GET['module'];

switch ($module) {
    case "ModAccueil":
        require_once "./modules/$module/$module.php";
        new $module();
        break;
    default :
        die("Interdiction d'accès");
}

?>
