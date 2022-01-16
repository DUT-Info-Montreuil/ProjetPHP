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
    public function accepterDemande($login){
        $idAmi=$_GET["id"];
        $val =1;
        try {
            $this->modele->accepterInvitation($idAmi,$login, $val);
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