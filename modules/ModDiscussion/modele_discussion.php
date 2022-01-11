<?php

require_once "./Connexion.php";

class ModeleDiscussion extends Connexion
{

    function envoyerMessage($contenuMessage, $login,$idMatch)
    {
        $req = self::$bdd->prepare("INSERT INTO `espacediscussion`(`contenu`, `nomUtilisateur`,`DatePublication`, `idUtilisateur`, `idMatch`) VALUES (?,(select nom from utilisateur natural join identifiants where login = ?),now(),(select idUtilisateur from utilisateur natural join identifiants where login = ?),?) ");
        $req->execute(array($contenuMessage,$login,$login,$idMatch));

    }
    function getMessages($idMatch){
        $req = self::$bdd->prepare("SELECT * from espacediscussion where idMatch=? order by idMessage ASC");
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