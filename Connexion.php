<?php
class Connexion {

    protected static $bdd=NULL;

    public function __construct () {
    }

    public static function initConnexion() {
        try {/*
            $dns="mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201646";
            $user="dutinfopw201646";
            $password="bygyjyjy";
            self::$bdd = new PDO($dns,$user,$password);*/

            $dns="mysql:host=localhost;dbname=basicfoot";
            $user="root";
            self::$bdd = new PDO($dns,$user);

            self::$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
?>