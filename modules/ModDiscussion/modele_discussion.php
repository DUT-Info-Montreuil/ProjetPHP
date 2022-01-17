<?php

require_once "./Connexion.php";

class ModeleDiscussion extends Connexion
{

    function envoyerMessage($contenuMessage, $photoDiscussion,$login,$idMatch)
    {
        $req = self::$bdd->prepare("INSERT INTO `espaceDiscussion`(`contenu`, `nomUtilisateur`,`photo`,`DatePublication`, `idUtilisateur`, `idMatch`) VALUES (?,(select nom from utilisateur natural join identifiants where login = ?),?,now(),(select idUtilisateur from utilisateur natural join identifiants where login = ?),?) ");
        $req->execute(array($contenuMessage,$login,$photoDiscussion,$login,$idMatch));

    }

    function getMessages($idMatch){
        $req = self::$bdd->prepare("SELECT * from espaceDiscussion where idMatch=? order by idMessage ASC");
        $req->execute(array($idMatch));
        $res = $req->fetchAll();
        return $res;
    }
    function getIduser($login){
        $req = self::$bdd->prepare("select idUtilisateur,nom from utilisateur natural join identifiants where login=?");
        $req->execute(array($login));
        $res = $req->fetchAll();
        return $res;
    }
}