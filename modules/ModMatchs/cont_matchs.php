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
        $datesMatchs = $this->modele->getDatesMatchsAmis($login);
        $this->vue->afficherPageMatchs($profil, $datesMatchs);
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
        $notif = "Nouveau Match Ville : ";
        $img_name = $_FILES['imageMatch']['name'];
        $img_size = $_FILES['imageMatch']['size'];
        $tmp_name = $_FILES['imageMatch']['tmp_name'];
        $error = $_FILES['imageMatch']['error'];
        try {
            if ($error === 0) {
                if ($img_size > 125000) {
                    $erreur = "Désolé, votre fichier est trop grand.";
                    echo $erreur;
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                        $img_upload_path = './Vue/Affichage/Images/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        if (isset($_POST['CreerMatch'])) {

                            $this->modele->creerMatch($login, $notif, $nomMatch, $lieuMatch, $NbJoueurs, $dateMatch, $heureMatch, $new_img_name);
                            echo "Match créé avec votre participation";

                        } else {
                            $this->modele->creerMatchSansParticipation($login, $notif, $nomMatch, $lieuMatch, $NbJoueurs, $dateMatch, $heureMatch, $new_img_name);
                            echo "Match créé sans votre participation";
                        }
                    } else {
                        $erreur = "Vous ne pouvez pas mettre ce type de fichier ";
                        echo $erreur;
                    }
                }
            } else {
                echo "erreur lors de la creation du match ";
            }
        } catch (Exception $e) {
            var_dump($e);
            exit();

        }

    }

    public function rechercherTousLesMatchs()
    {
        $matchs = $this->modele->getTousLesMatchs();
        $this->vue->afficherLaListeMatch($matchs);
    }

    public function filtrerMatchs($adresseMatch)
    {
        $matchs = $this->modele->getTousLesMatchsParFiltre($adresseMatch);
        $this->vue->afficherLaListeMatch($matchs);
    }

    public function participer()
    {
        $idMatch = $_GET["id"];
        $username = $_SESSION['login'];
        $nombreParticipants = $this->modele->verifierNombresParticipants($idMatch);
        $nombreParticipantsValable = $this->modele->getNombreParticipantsValable($idMatch);
        $int_value_nb_ParticipantsValable = intval($nombreParticipantsValable);

        if ($nombreParticipants < $int_value_nb_ParticipantsValable) {
            try {
                $this->modele->participerMatch($username, $idMatch);
                echo "vous etes parmi les participants";
            } catch (Exception $e) {
                echo "deja vous avez participé ";
            }
        } else {
            echo "Le nombre de participants est atteint";

        }
    }

    public function mesMatchs()
    {
        $username = $_GET["id"];
        $mesMatchs = $this->modele->getMesMatchs($username);
        $this->vue->afficherMesMatchs($mesMatchs);

    }

    public function retirerParticipation()
    {
        $idMatch = $_GET["id"];
        $username = $_SESSION['login'];
        try {
            $this->modele->retirerParticipation($idMatch, $username);
            echo "Vous avez annulé votre participation";
        } catch (Exception $e) {
            echo "Erreur survenue ";
        }

    }

    public function FormAjouterPhotos()
    {
        $this->vue->afficherFormAjouterPhotos();

    }

    public function ajouterPhotos()
    {
        $idMatch = $_GET["id"];
        $img_name = $_FILES['photoMatch']['name'];
        $img_size = $_FILES['photoMatch']['size'];
        $tmp_name = $_FILES['photoMatch']['tmp_name'];
        $error = $_FILES['photoMatch']['error'];
        try {
            if ($error === 0) {
                if ($img_size > 125000) {
                    $erreur = "Désolé, votre image est trop grand.";
                    echo $erreur;
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                        $img_upload_path = './Vue/Affichage/Images/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        if (isset($_POST['AjouterPhotosMatchs'])) {
                            $this->modele->ajouterPhotos($idMatch, $new_img_name);
                            $this->photosMatch();
                        } else {
                            echo "photo n'est pas ajoutée";
                        }
                    } else {
                        $erreur = "Vous ne pouvez pas mettre ce type de fichier ";
                        echo $erreur;
                    }
                }
            } else {
                echo "erreur lors d'ajout de la photo";
            }
        } catch (Exception $e) {
            var_dump($e);
            exit();

        }
    }

    public function consulterMatchAmis()
    {
        $username = $_SESSION['login'];
        $dateMatch = $_POST["dateMatchAmis"];
        $matchsAmis = $this->modele->getMatchsAmis($username, $dateMatch);
        $AmisParticipants = $this->modele->getAmisParticipants($username, $dateMatch);
        $this->vue->afficherMatchsAmis($matchsAmis, $AmisParticipants);
    }

    public function photosMatch()
    {
        $idMatch = $_GET["id"];
        $photoMatchsDiscussion = $this->modele->getPhotosMatchsDiscussion($idMatch);
        $photosGalerry = $this->modele->getPhotosMatchs($idMatch);
        $this->vue->afficherPhotosMatchs($photoMatchsDiscussion, $photosGalerry);
    }

    public function notifications()
    {
            $login = $_SESSION['login'];
            $notifications = $this->modele->getNotifications($login);
            $this->vue->afficherNotifications($notifications);
    }
    public function lireNotifications()
    {
        $login = $_SESSION['login'];
        $this->modele->lireNotifications($login);
    }
    public function getNombreNotifications(){
        $login = $_SESSION['login'];
        $nombreNotifications = $this->modele->compterNombreDeNotifications($login);
        $this->vue->afficherNombreNotifications($nombreNotifications);

    }


}