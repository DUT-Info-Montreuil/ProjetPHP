<?php

require_once './modules/ModMatchs/cont_matchs.php';

class ModMatchs
{
    private $controleur;

    public function __construct()
    {
        $this->controleur = new ContMatchs();
        $username = $_SESSION['login'];
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "PageMatchs";
        }
        switch ($action) {
            case 'PageMatchs':
                $this->controleur->pageMatchs($username);
                break;
        }
    }
}