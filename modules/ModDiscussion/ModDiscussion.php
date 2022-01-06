<?php

require_once './modules/ModDiscussion/cont_discussion.php';

class ModDiscussion
{
    private $controleur;

    public function __construct()
    {
        $this->controleur = new ContDiscussion();

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "DiscuterMatch";
        }
        switch ($action) {
            case 'DiscuterMatch' :
                $this->controleur->formulaireDiscussion();
                break;
            case 'EnvoyerMessage':
                $this->controleur->envoyerMessage();
                break;
        }
    }
}