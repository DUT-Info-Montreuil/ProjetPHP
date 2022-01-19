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
            $contenuMatch = $notif."".$lieuMatch;
            foreach ($this->getIdUsers($lieuMatch) as $idUsers) {
            $req = self::$bdd->prepare("INSERT INTO `notification`(`idUtilisateur`,`ContenuNotification`, `DateNotification`,`status`) VALUES (?,?,now(),0)");
            $req->execute(array($idUsers[0],$contenuMatch));
            }
            $idnotif = self::$bdd->lastInsertId();

            $req2 = self::$bdd->prepare("INSERT INTO `matchs`(`nomMatch`, `dateMatch`, `lieu`, `nbrJoueur`, `heure`, `Image`, `idUtilisateur`, `idNotification`) VALUES (?,?,?,?,?,?,(SELECT idUtilisateur from utilisateur natural join identifiants where login = ?),? )");

            $req2->execute(array($nomMatch,$dateMatch,$lieuMatch,$NbJoueurs,$heureMatch,$imageMatch,$login,$idnotif));
            $idMatch=self::$bdd->lastInsertId();

            $req3 = self::$bdd->prepare("INSERT INTO `participer`(`idUtilisateur`, `idMatch`) VALUES ((select idUtilisateur from utilisateur natural join identifiants where login = ?),?)");
            $req3->execute(array($login,$idMatch));
    }


    function getIdUsers($adressMatch){
        $req = self::$bdd->prepare("SELECT idUtilisateur from utilisateur where ville LIKE '".$adressMatch."'");
        $req->execute(array($adressMatch));
        $res = $req->fetchAll();
        return $res;
    }


    function getMesMatchs($idUtilisateur){
        $req = self::$bdd->prepare("SELECT * FROM matchs where idMatch IN (SELECT idMatch from participer where idUtilisateur=?) ");
        $req->execute(array($idUtilisateur));
        $res = $req->fetchAll();
        return $res;
    }
    function getmatch($idMatch){
        $req = self::$bdd->prepare("SELECT * FROM matchs where idMatch =? ");
        $req->execute(array($idMatch));
        $res = $req->fetchAll();
        return $res;
    }
    function getAmisInvitant($login){
        $req = self::$bdd->prepare("SELECT nom FROM utilisateur where idUtilisateur IN (SELECT idUtilisateur from invitationMatch where idUtilisateur_1=(SELECT idUtilisateur from utilisateur natural join identifiants where login=?))");
        $req->execute(array($login));
        $res = $req->fetchAll();
        return $res;
    }
    function getMatchsInviter($login){
        $req = self::$bdd->prepare("SELECT * FROM matchs where idMatch IN (SELECT idMatch from invitationMatch where idUtilisateur_1=(SELECT idUtilisateur from utilisateur natural join identifiants where login= ?)) ");
        $req->execute(array($login));
        $res = $req->fetchAll();
        return $res;
    }
    function retirerParticipation($idMatch, $login){
        $req = self::$bdd->prepare("DELETE FROM participer  where idMatch = ? and idUtilisateur = (SELECT idUtilisateur from utilisateur natural join identifiants where login= ?) ");
        $req->execute(array($idMatch,$login));
    }

    function getDatesMatchsAmis($login){
        $req = self::$bdd->prepare("SELECT dateMatch FROM matchs where idMatch IN (SELECT idMatch from participer where idUtilisateur IN (SELECT idUtilisateur_1 from etreAmi where idUtilisateur=(SELECT idUtilisateur from utilisateur natural join identifiants where login= ?) ))");
        $req->execute(array($login));
        $res = $req->fetchAll();
        return $res;
    }
    function getMatchsAmis($login , $dateMatch){
        $req = self::$bdd->prepare("SELECT * FROM matchs where idMatch IN (SELECT idMatch from participer where idUtilisateur IN (SELECT idUtilisateur_1 from etreAmi where idUtilisateur=(SELECT idUtilisateur from utilisateur natural join identifiants where login= ?) )) and dateMatch = ?");
        $req->execute(array($login,$dateMatch));
        $res = $req->fetchAll();
        return $res;
    }
    function getAmisParticipants($login ,$dateMatch){
        $req = self::$bdd->prepare("SELECT nom FROM utilisateur where idUtilisateur IN (SELECT idUtilisateur_1 from etreAmi where idUtilisateur=(SELECT idUtilisateur from utilisateur natural join identifiants where login=?)) and idUtilisateur IN (SELECT idUtilisateur from participer where idMatch IN (SELECT idMatch from matchs where dateMatch=?))");
        $req->execute(array($login,$dateMatch));
        $res = $req->fetchAll();
        return $res;
    }
    function ajouterPhotos($idMatch,$photo){
        $req = self::$bdd->prepare("INSERT INTO `photos`(`photo`, `idMatch`) VALUES (?,?)");
        $req->execute(array($photo,$idMatch));
    }
    function getPhotosMatchsDiscussion($idMatch){
        $req = self::$bdd->prepare("SELECT photo FROM espaceDiscussion where idMatch =? ");
        $req->execute(array($idMatch));
        $res = $req->fetchAll();
        return $res;
    }
    function getPhotosMatchs($idMatch){
        $req = self::$bdd->prepare("SELECT photo FROM photos where idMatch =? ");
        $req->execute(array($idMatch));
        $res = $req->fetchAll();
        return $res;
    }
    function getNotifications($login){

        $req = self::$bdd->prepare("SELECT * FROM notification where ContenuNotification LIKE Concat('%' ,(SELECT ville from utilisateur  natural join identifiants where login = ? ORDER BY RAND() LIMIT 1)  ) and status=0 and idUtilisateur =(SELECT idUtilisateur from utilisateur  natural join identifiants where login = ?);");
        $req->execute(array($login,$login));
        $res = $req->fetchAll();
        return $res;
    }
    function lireNotifications($login){
        $req = self::$bdd->prepare("UPDATE notification SET status = 1 where status = 0 and idUtilisateur = (SELECT idUtilisateur from utilisateur natural join identifiants where login= ?)  ");
        $req->execute(array($login));
    }
    function compterNombreDeNotifications($login){
        $req = self::$bdd->prepare("SELECT * from notification where status = 0 and ContenuNotification LIKE Concat('%' ,(SELECT ville from utilisateur  natural join identifiants where login = ? ORDER BY RAND() LIMIT 1) ) and idUtilisateur =(SELECT idUtilisateur from utilisateur  natural join identifiants where login = ?)");
        $req->execute(array($login,$login));
        $res = $req->rowCount();
        return $res;
    }
    function getSommeMesLikes($login){
        $req = self::$bdd->prepare("SELECT * from avoirNote where `like` = 1 and idUtilisateur_1 = (SELECT idUtilisateur from utilisateur natural join identifiants where login= ?)");
        $req->execute(array($login));
        $res = $req->rowCount();
        return $res;
    }
    function getSommeMesDislikes($login){
        $req = self::$bdd->prepare("SELECT * from avoirNote where `dislike` = 1 and idUtilisateur_1 = (SELECT idUtilisateur from utilisateur natural join identifiants where login= ?)");
        $req->execute(array($login));
        $res = $req->rowCount();
        return $res;
    }


    function refuserInvitation($idMatch,$idUtilisateur_1) {
        $req = self::$bdd->prepare("DELETE from invitationMatch where idMatch=? and idUtilisateur_1=(SELECT idUtilisateur from utilisateur natural join identifiants where login=?)");
        $req->execute(array($idMatch,$idUtilisateur_1));
    }

}