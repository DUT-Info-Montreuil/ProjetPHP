<?php

require_once './Connexion.php';

class ModeleProfil extends Connexion
{

    public function __construct(){

    }

    function getProfil($login)
    {
        $sql = 'SELECT * from utilisateur WHERE login = ?';
        $req = self::$bdd->prepare($sql);
        $req->execute(array($login));
        $infoProfil = $req->fetch();
        return $infoProfil;
    }
   /*
    public function getProfil2()
    {
        $req =self::$bdd->prepare('SELECT * FROM profil where login="osalek"') ;
        $req->execute();
        $res = $req->fetch();
        return $res;

    }
   */

}
?>