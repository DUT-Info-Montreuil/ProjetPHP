<?php

require_once "./modules/ModInscription/cont_inscription.php";

class ModInscription {
    private $controleur;

    function __construct () {
    
        $this->controleur=new ContInscription();

        if(isset($_GET['action'])) {
            $action=$_GET['action'];
        }
        else {
            $action="formulaire";
        }

        switch ($action) {
            case 'formulaire' :
                $this->controleur->form_inscription();
                break;
            case 'inscription' :
                $this->controleur->inscription();
                break;
            default:
                $this->controleur->form_inscription();
                break;
        }
    }
}

?>
