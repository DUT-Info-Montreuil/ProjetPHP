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
        $req->bindParam('login',$login);
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }

    public function demanderEtreAmis($login, $idAmi, $val)
    {

        $sql = "INSERT INTO `etreami`(`idUtilisateur`, `idUtilisateur_1`, `testerValidation`) VALUES ((SELECT idUtilisateur from utilisateur natural join identifiants where login = ?),?,?);";
        $req2 = self::$bdd->prepare($sql);
        $req2->execute(array($login,$idAmi, $val));

    }
    public function getDemandesAmis($login)
    {
    $req=self::$bdd->prepare("SELECT * from utilisateur where idUtilisateur IN (SELECT idUtilisateur FROM etreami WHERE idUtilisateur_1 = (SELECT idUtilisateur from utilisateur natural join identifiants where login=:login) and testerValidation=0)");
    $req->bindParam('login',$login);
    $req->execute();
    $res = $req->fetchAll();
    return $res;
    }
    public function accepterInvitation($idAmi,$val)
    {
        $req=self::$bdd->prepare("UPDATE etreAmi SET testerValidation = :val where idUtilisateur=:idAmi");
        $req->bindParam('idAmi',$idAmi);
        $req->bindParam('val',$val);
        $req->execute();
    }
    public function getListeAmis($login)
    {
        $req=self::$bdd->prepare("SELECT * from utilisateur where idUtilisateur IN (SELECT idUtilisateur FROM etreami WHERE idUtilisateur_1 = (SELECT idUtilisateur from utilisateur natural join identifiants where login=:login and testerValidation=1))");
        $req->bindParam('login',$login);
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }

}


