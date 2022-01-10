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
                $adresseMatch = htmlspecialchars($_POST['filtrerMatchs']);
                $this->controleur->filtrerMatchs($adresseMatch);
                break;
            case 'Participer' :
                $this->controleur->participer();
                break;
            case 'MesMatchs' :
                $this->controleur->mesMatchs();
                break;
            case 'RetirerParticipation':
                $this->controleur->retirerParticipation();
                break;
            case 'FormAjouterPhotosMatchs' :
                $this->controleur->formAfficherMatchs();
                break;
            case 'DiscuterMatch' :
                $this->controleur->formulaireDiscussion();
                break;
            case 'ConsulterMatchAmis' :
                $this->controleur->consulterMatchAmis();
                break;
        }
    }
}