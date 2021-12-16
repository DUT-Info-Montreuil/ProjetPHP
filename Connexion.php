<?php
class Connexion {

    protected static $bdd=NULL;

    public function __construct () {
    }

    public static function initConnexion() {

        //test de la connexion 
        try {
            $dns="mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201644";
            $user="dutinfopw201644";
            $password="rusedyny";
            self::$bdd = new PDO($dns,$user,$password);
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            $e->getMessage();
        }
    }

}
?>