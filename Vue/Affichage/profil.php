<section>
    <div id="p1">
        <p>Mon Profil </p>
    </div>
    <div id="formLeft2">
        <h2>Nom : <?= $data['nom'] ?></h2>
        <h2>Prenom :<?= $data['prenom']?></h2>
        <h2>Age : <?= $data['age']?></h2>
    </div>
    <div id="formRight2">
        <h2>Sexe : <?= $data['sexe']?></h2>
        <h2>ville : <?=  $data['ville']?></h2>
        <h2>Poste Match : <?= $data['posteMatch']?></h2>
        <button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModProfil&action=FormModifProfil" >
                Modifier informations</a></button>
        <button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModProfil&action=FormModifProfil" >
                Supprimer  Compte</a></button>
    </div>
</section>