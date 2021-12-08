<?php

require_once './modules/ModAccueil/ControleurAccueil.php';

class ModAccueil {
    private $controleur;

    public function __construct()
    {
        $this->controleur = new ContAccueil();
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "PageAccueil";
        }
        switch ($action) {
            case 'PageAccueil':
                $this->controleur->afficherPageAccueil();
                break;
        }

    }
}

?>