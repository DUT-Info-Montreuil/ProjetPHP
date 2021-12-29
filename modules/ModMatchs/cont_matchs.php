<?php
require_once './modules/ModMatchs/modele_matchs.php';
require_once './Vue/vue_matchs.php';
class ContMatchs
{

    private $modele;
    private $vue;

    public function __construct()
    {
        $this->modele = new ModeleMatchs();
        $this->vue = new VueMatchs();
    }
    public function pageMatchs($login)
    {
        $profil = $this->modele->getProfil($login);
        $this->vue->afficherPageMatchs($profil);
    }
}