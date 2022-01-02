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

    public function formulaireModif($login) {
        $profil = $this->modele->getProfil($login);
        $this -> vue -> afficherFormulaireModifier($profil);
    }

    public function ProfilModification($nomNv,$prenomNv,$ageNv,$sexeNv,$posteNv,$emailNv,$villeNv,$passwordNv,$login){
        $this->modele->modifierProfil($nomNv,$prenomNv,$ageNv,$sexeNv,$posteNv,$emailNv,$villeNv,$passwordNv,$login);
    }

    public function supprimerProfil($login){
        $SupprimerProfil = $this->modele->supprimerLeProfil($login);
        $this->vue->afficherMessageAlerte();
    }
    public function profilUtilisateur(){
        $idUtilisateur=$_GET["id"];
        $ProfilUtilisateur= $this->modele->getUtilisateur($idUtilisateur);
        $this->vue->afficherProfilUtilisateur($ProfilUtilisateur);
    }

}

