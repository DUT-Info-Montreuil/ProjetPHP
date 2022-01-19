<?php

require_once './Connexion.php';

class ModeleAdmin extends Connexion
{

    public function __construct()
    {

    }

    function getMatchsExpired()
    {
        $sql = 'select * from matchs where dateMatch<current_date()';
        $req = self::$bdd->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
    function supprimerMatch($idMatch){
        $req = self::$bdd->prepare("DELETE from photos where idMatch=?");
        $req->execute(array($idMatch));

        $req2 = self::$bdd->prepare("DELETE from participer where idMatch =?");
        $req2->execute(array($idMatch));

        $req3 = self::$bdd->prepare("  DELETE from invitationMatch where idMatch=?");
        $req3->execute(array($idMatch));

        $req4 = self::$bdd->prepare("DELETE from espaceDiscussion where idMatch =?");
        $req4->execute(array($idMatch));

        $req5 = self::$bdd->prepare("DELETE from matchs where idMatch =?");
        $req5->execute(array($idMatch));

    }
    public function getUtilisateursInscrits($login){

        $sql = 'select * from utilisateur where idUtilisateur NOT IN (select idUtilisateur from utilisateur natural join identifiants where login = ?)';
        $req = self::$bdd->prepare($sql);
        $req->execute(array($login));
        return $req->fetchAll();
    }
    public function supprimerUtilisateurInscrit($idUtilisateur){
        $sql = 'DELETE FROM participer where idUtilisateur IN (?) ';
        $req = self::$bdd->prepare($sql);
        $req->execute(array($idUtilisateur));

        $sql1 = 'DELETE FROM notification where idUtilisateur IN (?) ';
        $req1= self::$bdd->prepare($sql1);
        $req1->execute(array($idUtilisateur));

        $sql2 = 'DELETE FROM invitationMatch where idUtilisateur IN (?) or idUtilisateur_1 IN(?) ';
        $req2= self::$bdd->prepare($sql2);
        $req2->execute(array($idUtilisateur,$idUtilisateur));

        $sql3 = 'DELETE FROM espaceDiscussion where idUtilisateur IN (?)';
        $req3= self::$bdd->prepare($sql3);
        $req3->execute(array($idUtilisateur));

        $sql4 = 'DELETE FROM avoirNote where idUtilisateur IN (?) or idUtilisateur_1 IN (?)';
        $req4= self::$bdd->prepare($sql4);
        $req4->execute(array($idUtilisateur,$idUtilisateur));

        $sql5 = 'DELETE FROM etreAmi WHERE idUtilisateur IN (?)';
        $req5 = self::$bdd->prepare($sql5);
        $req5->execute(array($idUtilisateur));

        $sql7 = 'DELETE FROM etreAmi WHERE idUtilisateur_1 IN ( ?)';
        $req7 = self::$bdd->prepare($sql7);
        $req7->execute(array($idUtilisateur));

        $sql8 = 'DELETE utilisateur, identifiants FROM utilisateur natural join identifiants where idUtilisateur = ?';
        $req8 = self::$bdd->prepare($sql8);
        $req8->execute(array($idUtilisateur));
    }





}
?>