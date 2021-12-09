<?php

require_once "./modules/ModInscription/vue_inscription.php";
require_once "./modules/ModInscription/modele_inscription.php";

class ContInscription {
    private $modele;
    private $vue;

    function __construct () {
        $this->vue = new VueInscription();
        $this->modele = new ModeleInscription();
    }

    function form_inscription () {
        $this->vue->form_inscription();
    }

    function inscription() {
        $login=$_POST['login'];
        $password=$_POST['password'];

        try {
            $this->modele->inscription($login,$password);
            echo "Votre compte est maintenant cree";
        }
        catch (Exception $e) {
            echo "Impossible, le login $login existe deja";
            $this->vue->form_inscription();
        }
    }

}
?>
