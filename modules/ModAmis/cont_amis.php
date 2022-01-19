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
        if($this->modele->estDejaAmi($login,$idAmi)==1) {
            $this->vue->alerte_message("L'utilisateur fait déjà partie de vos amis","warning","index.php?module=ModAmis&action=TousMesAmis");
        }
        else {
            try {
                $this->modele->demanderEtreAmis($login, $idAmi, $val);
                $this->vue->alerte_message("Demande d'amis envoyé avec succès","success","index.php?module=ModProfil&action=Profil");
            }
            catch (Exception $e) {
                $this->vue->alerte_message("Demande d'amis déjà envoyée, en attente d'une réponse de l'utilisateur","warning","index.php?module=ModProfil&action=Profil");
            }
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
            $this->vue->alerte_message("Demande acceptée avec succès","success","index.php?module=ModAmis&action=TousMesAmis");
        }
        catch (Exception $e) {
            $this->vue->alerte_message("Une erreur est survenue merci de réessayer","danger","module=ModAmis&action=TousLesDemandesAmis");
        }
    }
    public function listeAmis($login){
        $listeAmis = $this->modele->getListeAmis($login);
        $this->vue->afficherMesAmis($listeAmis);
    }
    public function listeAmisAInviter($login){
        $listeAmis = $this->modele->getListeAmis($login);
        $this->vue->afficherAmisAInviter($listeAmis);
    }

    public function enregistrerInvitation($login){
        $idMatch=$_GET["idMatch"];
        $idAmi = $_GET["id"];
        $verifierInvitation = $this->modele->verifierInvitation($idMatch,$login,$idAmi);
        if ($verifierInvitation ==0) {
            try {
                $this->modele->enregistrerInvitation($idMatch, $login, $idAmi);
                $this->vue->alerte_message("L'utilisateur a bien été invité ", "success", "index.php?module=ModMatchs&action=MesMatchs");
            } catch (Exception $e) {
                $this->vue->alerte_message("Une erreur est survenue", "danger", "index.php?module=ModMatchs&action=MesMatchs");
            }
        }else{
            $this->vue->alerte_message("L'utilisateur a déjà été invité", "danger", "index.php?module=ModMatchs&action=MesMatchs");

        }
    }



    public function retirerAmiDeLaListe($login){
        $idAmi=$_GET["id"];
        try {
            $this->modele->retirerDeListe($idAmi, $login);
            $this->vue->alerte_message("L'utilisateur a bien été retiré de vos amis","success","index.php?module=ModAmis&action=TousMesAmis");
        }
        catch (Exception $e) {
            $this->vue->alerte_message("Une erreur est survenue merci de réessayer","danger","index.php?module=ModAmis&action=TousMesAmis");
        }

    }
    public function rechercherUtilisateur($login){

        $user = (String)trim($_GET['user']);
        if (isset($_GET['user'])){
            $userTrouve = $this->modele->rechercherUtilisateur($user,$login);
            $this->vue->afficherUsersRechercher($userTrouve);
        }
    }
    public function ajouterDeslike($login){
        $idUtilisateur = $_GET['id'];
        $this->modele->ajouterDeslike($login, $idUtilisateur);
    }
    public function ajouterLike($login){
        $idUtilisateur = $_GET['id'];
        $this->modele->ajouterLike($login, $idUtilisateur);
    }
    public function getNombreLikesUser(){
        $idUtilisateur = $_GET['id'];
        $nbLikes = $this->modele->getNombreLikesUser($idUtilisateur);
        $this->vue->afficherNombreLikes($nbLikes);
    }
    public function getNombreDeslikesUser(){
        $idUtilisateur = $_GET['id'];
        $nbDesLikes = $this->modele->getNombreDesLikesUser($idUtilisateur);
        $this->vue->afficherNombreDesLikes($nbDesLikes);
    }




}