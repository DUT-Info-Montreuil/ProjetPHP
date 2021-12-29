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

}