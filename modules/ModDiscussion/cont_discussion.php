<?php
require_once './modules/ModDiscussion/modele_discussion.php';
require_once './Vue/vue_discussion.php';
class ContDiscussion
{
    private $modele;
    private $vue;
    public function __construct()
    {
        $this->modele = new ModeleDiscussion();
        $this->vue = new VueDiscussion();
    }

    public function formulaireDiscussion(){
        $idMatch = $_GET["id"];
        $login = $_SESSION['login'];
        $idUser = $this->modele->getIduser($login);
        $messages = $this->modele->getMessages($idMatch);
        $this->vue->afficherFormulaireDiscussion($idMatch, $messages,$idUser);
    }
    public function envoyerMessage(){
        $login = $_SESSION['login'];
        $contenuMessage = $_POST['contenuMsg'];
        $idMatch = $_GET['id'];
        try {
            $this->modele->envoyerMessage($contenuMessage, $login, $idMatch);
            $idUser = $this->modele->getIduser($login);
            $messages = $this->modele->getMessages($idMatch);
            $this->vue->afficherFormulaireDiscussion($idMatch,$messages,$idUser);

        }catch (Exception $e) {
                echo "Erreur survenue ";
            }
    }
}