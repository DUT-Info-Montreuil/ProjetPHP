<?php

require_once "./modules/ModAccueil/VueAccueil.php";

class ContAccueil
{
    private $vue;

    function __construct()
    {
        $this->vue = new VueAccueil();
    }

    function afficherPageAccueil()
    {
        $this->vue->pageAccueil();

    }
}