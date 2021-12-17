<?php

class VueProfil {

    public function __construct(){

    }
    function afficherProfil($Profil)
    {
?>
        <link rel="stylesheet" href="./modules/Affichage/Css/profil.css" type="text/css" />
        <title>Mon profil</title>
        <section>
        <div id="p1">
        <p>Mon Profil </p>
        </div>
        <div id="formLeft2">
        <h2>Nom : <?php echo $Profil['nom']?></h2>
        <h2>Prenom :<?php echo $Profil['prenom']?></h2>
        <h2>Age : <?php echo $Profil['age']?></h2>
        </div>
        <div id="formRight2">
        <h2>Sexe : <?php echo $Profil['sexe']?></h2>
        <h2>ville : <?php echo $Profil['ville']?></h2>
        <h2>Poste Match : <?php echo $Profil['posteMatch']?></h2>
        <button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModProfil&action=FormModifProfil" >
        Modifier informations</a></button>
        <button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModProfil&action=FormModifProfil" >
        Supprimer  Compte</a></button>
        </div>
        </section>
<?php
    }
        function afficherFormulaireModifier(){
        require_once './modules/Affichage/formulaireModifProfil.html';
?>

<?php
     }
}
?>