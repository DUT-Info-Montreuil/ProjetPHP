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
        $sommeLikes = $this->modele->getSommeMesLikes($login);
        $sommesDeslikes = $this->modele->getSommeMesDislikes($login);
        $this->vue->afficherPageMatchs($profil,$datesMatchs,$sommeLikes,$sommesDeslikes);

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
        $notif = "Nouveau match à : ";
        $img_name = $_FILES['imageMatch']['name'];
        $img_size = $_FILES['imageMatch']['size'];
        $tmp_name = $_FILES['imageMatch']['tmp_name'];
        $error = $_FILES['imageMatch']['error'];
        try {
            if ($error === 0) {
                if ($img_size > 125000) {
                    $this->vue->alerte_message("Désolé, votre fichier est trop grand","danger","index.php?module=ModMatchs&action=FormulaireCreationMatch");
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
                            $this->vue->alerte_message("Le match a été créé avec succès","success","index.php?module=ModMatchs&action=PageMatchs");
                        }
                    } else {
                        $this->vue->alerte_message("Désolé, vous ne pouvez pas mettre ce type de fichier","danger","index.php?module=ModMatchs&action=FormulaireCreationMatch");
                    }
                }
            } else {
                $this->vue->alerte_message("Désolé, une erreur est survenue","danger","index.php?module=ModMatchs&action=FormulaireCreationMatch");
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

    public function filtrerMatchs()
    {
        $adresseMatch = (String)trim($_GET['adresseMatch']);
        if (isset($_GET['adresseMatch'])){
        $matchsTrouve = $this->modele->getTousLesMatchsParFiltre($adresseMatch);
        $this->vue->afficherLesMatchsRechercher($matchsTrouve);

    }
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
                $this->vue->alerte_message("Bien joué, Vous faites maintenant partie des participants","success","index.php?module=ModMatchs&action=PageMatchs");
            } catch (Exception $e) {
                $this->vue->alerte_message("Vous faites déjà parties des participants","danger","index.php?module=ModMatchs&action=PageMatchs");
            }
        } else {
            $this->vue->alerte_message("Désolé, la liste des participants est pleine","danger","index.php?module=ModMatchs&action=PageMatchs");
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
            $this->vue->alerte_message("Vous venez d'annuler votre participation","success","index.php?module=ModMatchs&action=PageMatchs");
        } catch (Exception $e) {
            $this->vue->alerte_message("Désolé, une erreur est survenue","danger","index.php?module=ModMatchs&action=PageMatchs");
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
                    $this->vue->alerte_message("Désolé, la taille de votre image est trop grande","danger","index.php?module=ModMatchs&action=PageMatchs");
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
                            $this->vue->alerte_message("La photo n'a pas pu être ajoutée","danger","index.php?module=ModMatchs&action=PageMatchs");
                        }
                    } else {
                        $this->vue->alerte_message("Vous ne pouvez pas mettre ce type de fichiers","danger","index.php?module=ModMatchs&action=PageMatchs");
                    }
                }
            } else {
                $this->vue->alerte_message("Désolé, une erreur est survenue lors de l'ajout de la photo","danger","index.php?module=ModMatchs&action=PageMatchs");
            }
        } catch (Exception $e) {
            $this->vue->alerte_message("Désolé, une erreur est survenue","danger","index.php?module=ModMatchs&action=PageMatchs");
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