<?php
require_once './Connexion.php';

class ModeleMatchs extends Connexion
{


    public function __construct()
    {

    }

    function getProfil($login)
    {
        $sql = 'select * from utilisateur natural join identifiants where login = ?';
        $req = self::$bdd->prepare($sql);
        $req->execute(array($login));
        return $req->fetch();
    }
    function  getTousLesMatchs(){
        $req = self::$bdd->prepare("SELECT * FROM matchs");
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }
    function  getTousLesMatchsParFiltre($adresseMatch){
        $req = self::$bdd->prepare("SELECT * FROM matchs where lieu LIKE '%".$adresseMatch."%'");
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }
    function verifierNombresParticipants($idMatch){
        $req = self::$bdd->prepare("SELECT * from participer where idMatch = ?");
        $req->execute(array($idMatch));
        $res = $req->rowCount();
        return $res;

    }
    function getNombreParticipantsValable($idMatch){
        $req = self::$bdd->prepare("SELECT nbrJoueur from matchs where idMatch = ?");
        $req->execute(array($idMatch));
        $res = $req->fetch();
        return $res[0];
    }
    function  participerMatch($login ,$idMatch ){
        $req = self::$bdd->prepare("INSERT INTO `participer`(`idUtilisateur`, `idMatch`) VALUES ((select idUtilisateur from utilisateur natural join identifiants where login = ?),?)");
        $req->execute(array($login,$idMatch));
    }
    function creerMatch($login,$notif, $nomMatch,$lieuMatch,$NbJoueurs,$dateMatch,$heureMatch,$imageMatch){
            $contenuMatch = $notif.",".$lieuMatch;
            $req = self::$bdd->prepare("INSERT INTO `notification`(`ContenuNotification`, `DateNotification`) VALUES (?,now())");
            $req->execute(array($contenuMatch));
            $idnotif=self::$bdd->lastInsertId();

            $req2 = self::$bdd->prepare("INSERT INTO `matchs`(`nomMatch`, `dateMatch`, `lieu`, `nbrJoueur`, `heure`, `Image`, `idUtilisateur`, `idNotification`) VALUES (?,?,?,?,?,?,(SELECT idUtilisateur from utilisateur natural join identifiants where login = ?),? )");

            $req2->execute(array($nomMatch,$dateMatch,$lieuMatch,$NbJoueurs,$heureMatch,$imageMatch,$login,$idnotif));
            $idMatch=self::$bdd->lastInsertId();

            $req3 = self::$bdd->prepare("INSERT INTO `participer`(`idUtilisateur`, `idMatch`) VALUES ((select idUtilisateur from utilisateur natural join identifiants where login = ?),?)");
            $req3->execute(array($login,$idMatch));
        }
    function creerMatchSansParticipation($login,$notif, $nomMatch,$lieuMatch,$NbJoueurs,$dateMatch,$heureMatch,$imageMatch){
        $contenuMatch = $notif.",".$lieuMatch;
        $req = self::$bdd->prepare("INSERT INTO `notification`(`ContenuNotification`, `DateNotification`) VALUES (?,now())");
        $req->execute(array($contenuMatch));
        $idnotif=self::$bdd->lastInsertId();

        $req2 = self::$bdd->prepare("INSERT INTO `matchs`(`nomMatch`, `dateMatch`, `lieu`, `nbrJoueur`, `heure`, `Image`, `idUtilisateur`, `idNotification`) VALUES (?,?,?,?,?,?,(SELECT idUtilisateur from utilisateur natural join identifiants where login = ?),? )");
        $req2->execute(array($nomMatch,$dateMatch,$lieuMatch,$NbJoueurs,$heureMatch,$imageMatch,$login,$idnotif));
    }
    function getMesMatchs($idUtilisateur){
        $req = self::$bdd->prepare("SELECT * FROM matchs where idMatch IN (SELECT idMatch from participer where idUtilisateur=?) ");
        $req->execute(array($idUtilisateur));
        $res = $req->fetchAll();
        return $res;
    }
    function retirerParticipation($idMatch, $login){
        $req = self::$bdd->prepare("DELETE FROM participer  where idMatch = ? and idUtilisateur = (SELECT idUtilisateur from utilisateur natural join identifiants where login= ?) ");
        $req->execute(array($idMatch,$login));

    }
    function getDatesMatchsAmis($login){
        $req = self::$bdd->prepare("SELECT dateMatch FROM matchs where idMatch IN (SELECT idMatch from participer where idUtilisateur IN (SELECT idUtilisateur_1 from etreami where idUtilisateur=(SELECT idUtilisateur from utilisateur natural join identifiants where login= ?) ))");
        $req->execute(array($login));
        $res = $req->fetchAll();
        return $res;
    }
    function getMatchsAmis($login , $dateMatch){
        $req = self::$bdd->prepare("SELECT * FROM matchs where idMatch IN (SELECT idMatch from participer where idUtilisateur IN (SELECT idUtilisateur_1 from etreami where idUtilisateur=(SELECT idUtilisateur from utilisateur natural join identifiants where login= ?) )) and dateMatch = ?");
        $req->execute(array($login,$dateMatch));
        $res = $req->fetchAll();
        return $res;
    }
    function getAmisParticipants($login ,$dateMatch){
        $req = self::$bdd->prepare("SELECT nom FROM utilisateur where idUtilisateur IN (SELECT idUtilisateur_1 from etreami where idUtilisateur=(SELECT idUtilisateur from utilisateur natural join identifiants where login=?)) and idUtilisateur IN (SELECT idUtilisateur from participer where idMatch IN (SELECT idMatch from matchs where dateMatch=?))");
        $req->execute(array($login,$dateMatch));
        $res = $req->fetchAll();
        return $res;
    }
    function ajouterPhotos($idMatch,$photo){
        $req = self::$bdd->prepare("INSERT INTO `photos`(`photo`, `idMatch`) VALUES (?,?)");
        $req->execute(array($photo,$idMatch));
    }



}