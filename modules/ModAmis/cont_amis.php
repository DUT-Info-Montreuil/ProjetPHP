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
            echo "demande envoyer";
        }
        catch (Exception $e) {
            echo "deja vous avez envoyée l'invitation ";
        }

    }
    public function listeDemandesAmis($login){
        $demandesAmi = $this->modele->getDemandesAmis($login);
        $this->vue->afficherLesDemandesAmi($demandesAmi);
    }
    public function accepterDemande(){
        $idAmi=$_GET["id"];
        $val =1;
        try {
            $this->modele->accepterInvitation($idAmi, $val);
            echo "demande est Acceptée";
        }
        catch (Exception $e) {
            echo "Impossible d'accepter ";
        }
    }
    public function listeAmis($login){
        $listeAmis = $this->modele->getListeAmis($login);
        $this->vue->afficherMesAmis($listeAmis);
    }

}