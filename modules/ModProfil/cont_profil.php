<?php
require_once './modules/ModProfil/modele_profil.php';
require_once './Vue/vue_profil.php';
class ContProfil{

    private $modele;
    private $vue;

    public function __construct()
    {
        $this->modele = new ModeleProfil();
        $this->vue = new VueProfil();
    }
    public function monProfil($login)
    {
        $Profil = $this->modele->getProfil($login);
        var_dump($Profil);
        exit();
        $this->vue->afficherProfil($Profil);
    }
    public function formulaireModif() {
        $this -> vue -> afficherFormulaireModifier();
    }

/*
    public function monProfil2()
    {
        $Profil = $this->modele->getProfil2();
        $this->vue->afficherProfil($Profil);
    }


*/
}

