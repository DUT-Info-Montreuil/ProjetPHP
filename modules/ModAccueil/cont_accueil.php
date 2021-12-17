<?php

require_once "Vue/vue_accueil.php";

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