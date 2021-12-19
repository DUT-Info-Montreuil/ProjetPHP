<?php

require_once './Connexion.php';

class ModeleProfil extends Connexion
{

    public function __construct(){

    }

    function getProfil($login)
    {
        $sql = 'select * from utilisateur natural join identifiants where login = ?';
        $req = self::$bdd->prepare($sql);
        $req->execute(array($login));
        $infoProfil = $req->fetch();
        return $infoProfil;
    }



}
?>