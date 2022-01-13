<?php
require_once './modules/ModAmis/modele_amis.php';
require_once './Vue/vue_amis.php';
class ContAmis
{

    private $modele;
    private $vue;

    public function __construct()
    {
        $this->modele = new ModeleAmis();
        $this->vue = new VueAmis();
    }

    public function listeUtilisateurs($login)
    {
        $utilisateurs = $this->modele->getTousLesUtilisateurs($login);
        $this->vue->afficherLesUtilisateurs($utilisateurs);
    }
    public function EnvoyerDemande($login){
        $idAmi=$_GET["id"];
        $val =0;
        try {
            $this->modele->demanderEtreAmis($login, $idAmi, $val);
            $this->vue->alerte_message("Demande d'amis envoyé avec succès","success","index.php?module=ModProfil&action=Profil");
        }
        catch (Exception $e) {
            $this->vue->alerte_message("Demande d'amis déjà envoyée, en attente d'une réponse de l'utilisateur","warning","index.php?module=ModProfil&action=Profil");
        }

    }
    public function listeDemandesAmis($login){
        $demandesAmi = $this->modele->getDemandesAmis($login);

        $this->vue->afficherLesDemandesAmi($demandesAmi);
    }
    public function accepterDemande($login){
        $idAmi=$_GET["id"];
        $val =1;
        try {
            $this->modele->accepterInvitation($idAmi,$login, $val);
            $this->vue->alerte_message("Demande acceptée avec succès","success","index.php?module=ModProfil&action=TousMesAmis");
        }
        catch (Exception $e) {
            echo "Impossible d'accepter ";
        }
    }
    public function listeAmis($login){
        $listeAmis = $this->modele->getListeAmis($login);
        $this->vue->afficherMesAmis($listeAmis);
    }
    public function retirerAmiDeLaListe($login){
        $idAmi=$_GET["id"];
        try {
            $this->modele->retirerDeListe($idAmi, $login);
            echo "utilisateur est Retirée";
        }
        catch (Exception $e) {
            echo "Impossible de la retirer ";
        }

    }


}