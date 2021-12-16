<?php

class Connexion {
    protected static $bdd = NULL;



    public static function initConnexion() {
        $dns="mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201646";
        $user="dutinfopw201646";
        $password="bygyjyjy";
        self::$bdd = new PDO($dns,$user,$password);

    }
}
?>