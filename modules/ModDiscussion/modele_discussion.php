<?php

require_once "./Connexion.php";

class ModeleDiscussion extends Connexion
{

    function envoyerMessage($contenuMessage, $login,$idMatch)
    {
        $req = self::$bdd->prepare("INSERT INTO `espacediscussion`(`contenu`, `DatePublication`, `idUtilisateur`, `idMatch`) VALUES (?,now(),(select idUtilisateur from utilisateur natural join identifiants where login = ?),?) ");
        $req->execute(array($contenuMessage,$login,$idMatch));

    }
    function getMessages($idMatch){
        $req = self::$bdd->prepare("SELECT * from espacediscussion where idMatch=?");
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