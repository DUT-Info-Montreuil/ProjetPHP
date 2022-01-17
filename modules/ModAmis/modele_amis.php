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

        $sql = "INSERT INTO `etreAmi`(`idUtilisateur`, `idUtilisateur_1`, `testerValidation`) VALUES ((SELECT idUtilisateur from utilisateur natural join identifiants where login = ?),?,?);";
        $req = self::$bdd->prepare($sql);
        $req->execute(array($login, $idAmi, $val));

        $sql2 = "INSERT INTO `etreAmi`(`idUtilisateur`, `idUtilisateur_1`, `testerValidation`) VALUES (?,(SELECT idUtilisateur from utilisateur natural join identifiants where login = ?),2);";
        $req2 = self::$bdd->prepare($sql2);
        $req2->execute(array($idAmi,$login));


    }

    public function getDemandesAmis($login)
    {
        $req = self::$bdd->prepare("SELECT * from utilisateur where idUtilisateur IN (SELECT idUtilisateur FROM etreAmi WHERE idUtilisateur_1 = (SELECT idUtilisateur from utilisateur natural join identifiants where login=:login) and testerValidation=0)");
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
        $req = self::$bdd->prepare("SELECT * from utilisateur where idUtilisateur IN (SELECT idUtilisateur FROM etreAmi WHERE idUtilisateur_1 = (SELECT idUtilisateur from utilisateur natural join identifiants where login=:login and testerValidation=1))");
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
    function rechercherUtilisateur($user,$login){
        $req = self::$bdd->prepare("SELECT * FROM utilisateur where prenom LIKE '".$user."%' and idUtilisateur NOT IN (select idUtilisateur from utilisateur where idUtilisateur = (SELECT idUtilisateur from utilisateur natural join identifiants where login=:login ))");
        $req->bindParam('login', $login);
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }
    function ajouterDeslike($login ,$idUser){
        if (($this->testerSiDejaLike($login,$idUser))==1){
           $this->testerSiDejaLike($login,$idUser);

            $req = self::$bdd->prepare("UPDATE avoirnote SET `dislike` = 1 , `like`= 0 where idUtilisateur = (select idUtilisateur from utilisateur where idUtilisateur = (SELECT idUtilisateur from utilisateur natural join identifiants where login=? )) and idUtilisateur_1 = ?");
            $req->execute(array($login,$idUser));
        }
        $req2 = self::$bdd->prepare("INSERT INTO `avoirnote`(`like`, `dislike`, `idUtilisateur`, `idUtilisateur_1`) VALUES (0,1,(select idUtilisateur from utilisateur where idUtilisateur = (SELECT idUtilisateur from utilisateur natural join identifiants where login=? )),?)");
        $req2->execute(array($login,$idUser));
    }
    function testerSiDejaDeslike($login ,$idUser){
        $req = self::$bdd->prepare("SELECT * from avoirnote where idUtilisateur = (select idUtilisateur from utilisateur where idUtilisateur = (SELECT idUtilisateur from utilisateur natural join identifiants where login=? ) ) and dislike =1 and idUtilisateur_1 = ?");
        $req->execute(array($login,$idUser));
        $res = $req->rowCount();
        return $res;
    }
    function testerSiDejaLike($login,$idUser){
        $req = self::$bdd->prepare("SELECT * from avoirnote where idUtilisateur = (select idUtilisateur from utilisateur where idUtilisateur = (SELECT idUtilisateur from utilisateur natural join identifiants where login=? ) )  and `like` =1  and idUtilisateur_1 = ?");
        $req->execute(array($login,$idUser));
        $res = $req->rowCount();
        return $res;
    }
    function ajouterLike($login ,$idUser){

        if (($this->testerSiDejaDeslike($login,$idUser))==1){
            $this->testerSiDejaDeslike($login,$idUser);

            $req = self::$bdd->prepare("UPDATE avoirnote SET `dislike` = 0 , `like`= 1 where idUtilisateur = (select idUtilisateur from utilisateur where idUtilisateur = (SELECT idUtilisateur from utilisateur natural join identifiants where login=? )) and idUtilisateur_1 = ?");
            $req->execute(array($login,$idUser));
        }else{
            $req2 = self::$bdd->prepare("INSERT INTO `avoirnote`(`like`, `dislike`, `idUtilisateur`, `idUtilisateur_1`) VALUES (1,0,(select idUtilisateur from utilisateur where idUtilisateur = (SELECT idUtilisateur from utilisateur natural join identifiants where login=? )),?)");
            $req2->execute(array($login,$idUser));
        }

    }
    function getNombreLikesUser($idUser){
        $req = self::$bdd->prepare("SELECT * from avoirnote where `like` = 1 and idUtilisateur_1 = ?");
        $req->execute(array($idUser));
        $res = $req->rowCount();
        return $res;
    }
    function getNombreDeslikesUser($idUser){
        $req = self::$bdd->prepare("SELECT * from avoirnote where `dislike` = 1 and idUtilisateur_1 = ?");
        $req->execute(array($idUser));
        $res = $req->rowCount();
        return $res;
    }

}

