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
    function creerMatch($login,$notif, $nomMatch,$lieuMatch,$NbJoueurs,$dateMatch,$heureMatch,$imageMatch){
        {
            $contenuMatch = $notif.",".$lieuMatch;
            $req = self::$bdd->prepare("INSERT INTO `notification`(`ContenuNotification`, `DateNotification`) VALUES (?,now())");
            $req->execute(array($contenuMatch));
            $idnotif=self::$bdd->lastInsertId();

            $req2 = self::$bdd->prepare("INSERT INTO `matchs`(`nomMatch`, `dateMatch`, `lieu`, `nbrJoueur`, `heure`, `Image`, `idUtilisateur`, `idNotification`) VALUES (?,?,?,?,?,?,(SELECT idUtilisateur from utilisateur natural join identifiants where login = ?),? )");
            $req2->execute(array($nomMatch,$dateMatch,$lieuMatch,$NbJoueurs,$heureMatch,$imageMatch,$login,$idnotif));
        }

    }

}