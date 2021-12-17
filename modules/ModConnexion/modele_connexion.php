<?php

require_once "./Connexion.php";

class ModeleConnexion extends Connexion {

    public function connexion($login) {
        $requete= self::$bdd->prepare("SELECT * from identifiants where login = :login");
        $requete->bindParam('login',$login);
        $requete->execute();
        return $requete->fetch();
    }


}
