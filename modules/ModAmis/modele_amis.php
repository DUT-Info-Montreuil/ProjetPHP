<?php
require_once './Connexion.php';

class ModeleAmis extends Connexion
{


    public function __construct()
    {

    }

    public function getTousLesUtilisateurs($login)
    {
        $req = self::$bdd->prepare("SELECT * FROM utilisateur natural join identifiants where login!=:login");
        $req->bindParam('login', $login);
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }

    public function demanderEtreAmis($login, $idAmi, $val)
    {

        $sql = "INSERT INTO `etreami`(`idUtilisateur`, `idUtilisateur_1`, `testerValidation`) VALUES ((SELECT idUtilisateur from utilisateur natural join identifiants where login = ?),?,?);";
        $req = self::$bdd->prepare($sql);
        $req->execute(array($login, $idAmi, $val));

        $sql2 = "INSERT INTO `etreami`(`idUtilisateur`, `idUtilisateur_1`, `testerValidation`) VALUES (?,(SELECT idUtilisateur from utilisateur natural join identifiants where login = ?),2);";
        $req2 = self::$bdd->prepare($sql2);
        $req2->execute(array($idAmi,$login));


    }

    public function getDemandesAmis($login)
    {
        $req = self::$bdd->prepare("SELECT * from utilisateur where idUtilisateur IN (SELECT idUtilisateur FROM etreami WHERE idUtilisateur_1 = (SELECT idUtilisateur from utilisateur natural join identifiants where login=:login) and testerValidation=0)");
        $req->bindParam('login', $login);
        $req->execute();
        $res = $req->fetchAll();
        return $res;


    }

    public function accepterInvitation($idAmi,$login,$val)
    {
        $req = self::$bdd->prepare("UPDATE etreAmi SET testerValidation = :val where idUtilisateur=:idAmi");
        $req->bindParam('idAmi', $idAmi);
        $req->bindParam('val', $val);
        $req->execute();

        $req2 = self::$bdd->prepare("UPDATE etreAmi SET testerValidation = :val where idUtilisateur_1=:idAmi");
        $req2->bindParam('idAmi', $idAmi);
        $req2->bindParam('val', $val);
        $req2->execute();

    }

    public function getListeAmis($login)
    {
        $req = self::$bdd->prepare("SELECT * from utilisateur where idUtilisateur IN (SELECT idUtilisateur FROM etreami WHERE idUtilisateur_1 = (SELECT idUtilisateur from utilisateur natural join identifiants where login=:login and testerValidation=1))");
        $req->bindParam('login', $login);
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }

    public function retirerDeListe($idAmi, $login)
    {
        $req = self::$bdd->prepare("DELETE from etreAmi where idUtilisateur = :idAmi and idUtilisateur_1 IN (select idUtilisateur from utilisateur where idUtilisateur = (SELECT idUtilisateur from utilisateur natural join identifiants where login = :login ))");
        $req->bindParam('idAmi', $idAmi);
        $req->bindParam('login', $login);
        $req->execute();

        $req2 = self::$bdd->prepare("DELETE from etreAmi where idUtilisateur IN (select idUtilisateur from utilisateur where idUtilisateur = (SELECT idUtilisateur from utilisateur natural join identifiants where login=:login )) and idUtilisateur_1 = :idAmi");
        $req2->bindParam('idAmi', $idAmi);
        $req2->bindParam('login', $login);
        $req2->execute();
    }

}

