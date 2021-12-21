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
        $profil = $this->modele->getProfil($login);
        $this->vue->afficherProfil($profil);
    }

    public function formulaireModif() {
        $this -> vue -> afficherFormulaireModifier();
    }

    public function ProfilModification($nomNv,$prenomNv,$ageNv,$sexeNv,$posteNv,$emailNv,$villeNv,$login){
        $this->modele->modifierProfil($nomNv,$prenomNv,$ageNv,$sexeNv,$posteNv,$emailNv,$villeNv,$login);
    }

    public function supprimerProfil($login){
        $SupprimerProfil = $this->modele->supprimerLeProfil($login);
        $this->vue->afficherMessageAlerte();
    }

}

