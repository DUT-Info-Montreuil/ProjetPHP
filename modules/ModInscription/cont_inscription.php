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

        $passwordsize=strlen(trim($password));

        if(!(preg_match('/^(?=.\d)(?=.[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$password)) && ($passwordsize<=7)) {
            $message="Le mot de passe doit contenir au moins 1 majuscule, 1 chiffre et doit faire 8 caractères minimum.</br>Veuillez réessayer votre <a href='index.php?module=ModInscription' class='alert-link'>inscription</a>";
            $this->vue->alerte_message($message,"danger","index.php?module=ModInscription");
        }

         else {
             $password=password_hash($password,PASSWORD_DEFAULT);
             $prenom=$_POST['prenom'];
             $nom=$_POST['nom'];
             $age=$_POST['age'];
             $ville=$_POST['ville'];
             $sexe=$_POST['civilite'];
             $poste=$_POST['poste'];

             try {
                 $this->modele->inscription($prenom,$nom,$age,$sexe,$ville,$poste,$login,$password);
                 $this->vue->alerte_message("Votre compte a été crée avec succès</br>Veuillez vous <a href='index.php?module=ModConnexion' class='alert-link'>connecter</a>","success","index.php?module=ModConnexion");
             }
             catch (Exception $e) {
                 $this->vue->alerte_message("Erreur l'adresse mail : $login est deja associée à un compte</br>Veuillez réessayer votre <a href='index.php?module=ModInscription' class='alert-link'>inscription</a>","danger","index.php?module=ModInscription");
             }
         }



    }

}
?>
