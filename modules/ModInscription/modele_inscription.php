<?php

require_once "./Connexion.php";

class ModeleInscription extends Connexion {
    
    public function inscription($prenom,$nom,$age,$sexe,$ville,$poste,$login,$password) {

        $requete=self::$bdd->prepare("INSERT INTO identifiants(`login`,`password`) VALUES (:login, :password);");
        $requete->bindParam('login',$login);
        $requete->bindParam('password',$password);
        $requete->execute();
        $login=self::$bdd->lastInsertId();

        $requete2= self::$bdd->prepare("INSERT INTO Utilisateur (`prenom`, `nom`, `age`, `sexe`, `ville`, `posteMatch`, `login`) VALUES ( :prenom, :nom, :age, :sexe, :ville, :poste, :login);");
        $requete2->bindParam('prenom',$prenom);
        $requete2->bindParam('nom',$nom);
        $requete2->bindParam('age',$age);
        $requete2->bindParam('sexe',$sexe);
        $requete2->bindParam('ville',$ville);
        $requete2->bindParam('poste',$poste);
        $requete2->bindParam('login',$login);
        $requete2->execute();
    }


}

?>
