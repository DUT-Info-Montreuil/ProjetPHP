<?php
require_once './modules/ModAdmin/modele_admin.php';
require_once './Vue/vue_admin.php';
class ContAdmin
{

    private $modele;
    private $vue;

    public function __construct()
    {
        $this->modele = new ModeleAdmin();
        $this->vue = new VueAdmin();
    }

    public function getmatchsExpired()
    {
        $matchsExpired= $this->modele->getMatchsExpired();
        $this->vue->afficherMatchsExpired($matchsExpired);

    }
    public function supprimerMatch(){
        $idMatch = $_GET["id"];
         try {
             $this->modele->supprimerMatch($idMatch);
             $this->vue->alerte_message("matchs supprimé","success","index.php?module=ModProfil");
         } catch (Exception $e) {
             $this->vue->alerte_message("impossible de le supprimer","danger","index.php?module=ModProfil");
         }
    }
    public function getUtilisateursInscrits(){
        $login = $_SESSION['login'];
        try {
            $utilisateurs = $this->modele->getUtilisateursInscrits($login);
            $this->vue->afficherUtilisateursInscrits($utilisateurs);
        } catch (Exception $e) {
            $this->vue->alerte_message("Aucun Utilisateurs","danger","index.php?module=ModProfil");
        }
    }
    public function supprimerUtilisateurInscrit(){
        $idUser = $_GET["id"];
        try {
            $utilisateurs = $this->modele->supprimerUtilisateurInscrit($idUser);
            $this->vue->alerte_message("utilisateur supprimé","success","index.php?module=ModProfil");

        } catch (Exception $e) {
            $this->vue->alerte_message("Impossible de le supprimer","danger","index.php?module=ModProfil");
        }
    }



}