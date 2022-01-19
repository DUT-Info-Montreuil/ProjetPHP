<?php

require_once './modules/ModMatchs/cont_matchs.php';

class ModMatchs
{
    private $controleur;

    public function __construct()
    {
        $this->controleur = new ContMatchs();

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "PageMatchs";
        }
        switch ($action) {
            case 'PageMatchs':
                $this->controleur->pageMatchs();
                break;
            case 'FormulaireCreationMatch':
                $this->controleur->formulaireMatch();
                break;
            case 'CreerMatch':
                $this->controleur->creerMatch();
                break;
            case 'RechercherTousLesMatchs' :
                $this->controleur->rechercherTousLesMatchs();
                break;
            case 'FiltrerMatchs' :
                $this->controleur->filtrerMatchs();
                break;
            case 'Participer' :
                $this->controleur->participer();
                break;
            case 'TousLesParticipants':
                $this->controleur->getListeParticipants();
                break;
            case 'MesMatchs' :
                $this->controleur->mesMatchs();
                break;
            case 'RetirerParticipation':
                $this->controleur->retirerParticipation();
                break;
            case 'FormAjouterPhotosMatchs' :
                $this->controleur->FormAjouterPhotos();
                break;
            case 'AjouterPhotosMatchs' :
                $this->controleur->ajouterPhotos();
                break;
            case 'PhotosMatchs' :
                $this->controleur->photosMatch();
                break;
            case 'DiscuterMatch' :
                $this->controleur->formulaireDiscussion();
                break;
            case 'ConsulterMatch' :
                $this->controleur->consulterMatch();
                break;
            case 'ConsulterMatchAmis' :
                $this->controleur->consulterMatchAmis();
                break;
            case 'ConsulterMatchsInviter' :
                $this->controleur->consulterMatchsInviter();
                break;
            case 'Notifications';
                $this->controleur->notifications();
                break;
            case 'lireNotifications' :
                $this->controleur ->lireNotifications();
                break;
            case 'NombreNotifications':
                $this->controleur->getNombreNotifications();
                break;
        }
    }
}