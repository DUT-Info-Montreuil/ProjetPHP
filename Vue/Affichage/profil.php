
<title>Mon profil</title>
<section>
    <div id="p1">
        <p>Mon Profil </p>
    </div>
    <div id="formLeft2">
        <h2>Nom : <?php echo data['nom']?></h2>
        <h2>Prenom :<?php echo data['prenom']?></h2>
        <h2>Age : <?php echo data['age']?></h2>
    </div>
    <div id="formRight2">
        <h2>Sexe : <?php echo data['sexe']?></h2>
        <h2>ville : <?php echo data['ville']?></h2>
        <h2>Poste Match : <?php echo data['posteMatch']?></h2>
        <button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModProfil&action=FormModifProfil" >
                Modifier informations</a></button>
        <button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModProfil&action=FormModifProfil" >
                Supprimer  Compte</a></button>
    </div>
</section>