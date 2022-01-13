<?php

require_once './modules/ModAmis/cont_amis.php';

class ModAmis
{
    private $controleur;

    public function __construct()
    {

        $this->controleur = new ContAmis();
        $username = $_SESSION['login'];
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "TousLesUtilisateurs";
        }


        switch ($action) {
            case 'TousLesUtilisateurs':
                $this->controleur->listeUtilisateurs($username);
                break;
            case 'EnvoyerDemande' :
                $this->controleur->EnvoyerDemande($username);
                break;
            case 'TousLesDemandesAmis':
                $this->controleur->listeDemandesAmis($username);
                break;
            case 'AccepterDemande':
                $this->controleur->accepterDemande($username);
                break;
            case 'TousMesAmis':
                $this->controleur->listeAmis($username);
                break;
            case 'RetirerAmi':
                $this->controleur->retirerAmiDeLaListe($username);
                break;
            case 'RechercherAmis':
                $this->controleur->rechercherUtilisateur($username);
                break;
        }

    }

}