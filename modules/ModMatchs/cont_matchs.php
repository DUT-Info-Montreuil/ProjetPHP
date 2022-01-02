<?php
require_once './modules/ModMatchs/modele_matchs.php';
require_once './Vue/vue_matchs.php';
class ContMatchs
{

    const imageMatch = 'my_image';
    private $modele;
    private $vue;

    public function __construct()
    {
        $this->modele = new ModeleMatchs();
        $this->vue = new VueMatchs();
    }

    public function pageMatchs()
    {
        $login = $_SESSION['login'];
        $profil = $this->modele->getProfil($login);
        $this->vue->afficherPageMatchs($profil);
    }

    public function formulaireMatch()
    {
        $this->vue->afficherFormulaireCreationMatch();
    }

    public function creerMatch()
    {
        $login = $_SESSION['login'];
        $nomMatch = $_POST['nomMatch'];
        $lieuMatch = $_POST['lieuMatch'];
        $NbJoueurs = $_POST['LabelNbJoueurs'];
        $dateMatch = $_POST['dateMatch'];
        $heureMatch = $_POST['heureMatch'];
        $notif = "Nouveau Match a";
        $img_name = $_FILES['imageMatch']['name'];
        $img_size = $_FILES['imageMatch']['size'];
        $tmp_name = $_FILES['imageMatch']['tmp_name'];
        $error = $_FILES['imageMatch']['error'];
        try {
            if ($error === 0) {
                if ($img_size > 125000) {
                    $erreur = "Désolé, votre fichier est trop grand.";
                    echo $erreur;
                }else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = './Vue/Affichage/Images/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        $this->modele->creerMatch($login,$notif , $nomMatch,$lieuMatch,$NbJoueurs,$dateMatch,$heureMatch,$new_img_name);//enlever username et changer methods model
                        echo "match crée";
                    }else {
                        $erreur = "Vous ne pourrez pas mettre ce type de fichier";
                        echo $erreur;
                    }
                }
            }else {
                echo "erreur de création lors de la creation du match ";
            }
        } catch (Exception $e) {
            echo "match non crée";

        }

    }
    public function rechercherMatchs()
    {
        $matchs = $this->modele->getTousLesMatchs();
        $this->vue->afficherLaListeMatch($matchs);
    }
}