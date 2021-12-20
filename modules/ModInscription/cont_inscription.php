<?php

require_once "./Vue/vue_inscription.php";
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
        $password=password_hash($password,PASSWORD_DEFAULT);
        $prenom=$_POST['prenom'];
        $nom=$_POST['nom'];
        $age=$_POST['age'];
        $ville=$_POST['ville'];
        $sexe=$_POST['civilite'];
        $poste=$_POST['poste'];

        try {
            $this->modele->inscription($prenom,$nom,$age,$sexe,$ville,$poste,$login,$password);
            $this->vue->form_script_reussi();
            $this->vue->form_connexion();
        }
        catch (Exception $e) {
            $this->vue->form_script_loginExistant($login);
            $this->vue->form_inscription();
        }
    }

}
?>
