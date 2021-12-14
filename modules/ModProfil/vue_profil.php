<?php

class VueProfil {

    public function __construct(){

    }
    function afficherProfil($Profil)
    {
    ?>

        <link rel="stylesheet" href="./modules/Affichage/Css/Style.css" type="text/css" />
        <title>Mon profil</title>
        <section class="profil">
        <div id="p1">
            <p>Mes informations </p>
        </div>
        <div id="info">
        <h2>Nom : <?php echo $Profil['nom']?></h2>
        <h2>Prenom : <?php echo $Profil['prenom']?></h2>
        <h2>Age : <?php echo $Profil['age']?></h2>
        <!--
        <h2>Sexe : <?php echo $Profil['sexe']?></h2>
        <h2>ville : <?php echo $Profil['ville']?></h2>
        <h2>Poste Match : <?php echo $Profil['posteMatch']?></h2>
        !-->
        </div>
        <button id="buttonStyle" type="button"><a href="index.php?module=ModProfil&action=ModifierProfil" >
        Modifier Mes informations</a></button>
        </section>


        <?php
    }
}
?>