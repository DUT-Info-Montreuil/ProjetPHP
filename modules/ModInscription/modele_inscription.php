<?php

require_once "./Connexion.php";

class ModeleInscription extends Connexion {
    
    public function inscription($login, $password) {
        $requete= self::$bdd->prepare("INSERT INTO utilisateurs (login, password) VALUES (:login, :password)");
        $requete->bindParam('login',$login);
        $passwordHash=password_hash($password,PASSWORD_DEFAULT);
        $requete->bindParam('password',$passwordHash);
        return $requete->execute();
    }
}

?>
