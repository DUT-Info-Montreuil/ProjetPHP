<?php

require_once "./modules/ModAccueil/vue_accueil.php";

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