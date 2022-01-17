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
        $idMatch = $_GET['id'];
        $contenuMessage = $_POST['contenuMsg'];
        $img_name = $_FILES['photoDiscussion']['name'];
        $img_size = $_FILES['photoDiscussion']['size'];
        $tmp_name = $_FILES['photoDiscussion']['tmp_name'];
        $error = $_FILES['photoDiscussion']['error'];
        try {
            if ($contenuMessage!=NULL && $img_name ==NULL){
                $this->modele->envoyerMessage($contenuMessage,NULL, $login, $idMatch);
            }
            if ($error === 0) {
                if ($img_size > 125000) {
                    $this->vue->alerte_message("Désolé, la taille de votre image est trop grande","danger","index.php?module=ModMatchs&action=PageMatchs");
                }else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = './Vue/Affichage/Images/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        $this->modele->envoyerMessage($contenuMessage,$new_img_name,$login, $idMatch);

                    }else {
                        $this->vue->alerte_message("Désolé, vous ne pouvez pas mettre ce type de fichier","danger","index.php?module=ModMatchs&action=PageMatchs");

                    }
                }
            }else {
                $this->vue->alerte_message("Désolé, une erreur est survenue lors de l'ajout de votre photo","danger","index.php?module=ModMatchs&action=PageMatchs");

            }
        } catch (Exception $e) {
            $this->vue->alerte_message("Désolé, une erreur est survenue","danger","index.php?module=ModMatchs&action=PageMatchs");
        }
        try {

            $idUser = $this->modele->getIduser($login);
            $messages = $this->modele->getMessages($idMatch);
            $this->vue->afficherFormulaireDiscussion($idMatch,$messages,$idUser);

        }catch (Exception $e) {
            $this->vue->alerte_message("Désolé, une erreur est survenue","danger","index.php?module=ModMatchs&action=PageMatchs");
        }
    }
}