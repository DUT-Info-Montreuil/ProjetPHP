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
            case 'RechercherMatchs' :
                $this->controleur->rechercherMatchs();
                break;
        }
    }
}