<?php
$liste = $data["liste"];


if (!empty($liste)): ?>


<div class="container mt-5">
    <h1 class="titrePageAmis">Mes amis</h1>
    <div class="mb-3"> <a class="btn btn-primary" href="index.php?module=ModProfil&action=Profil" role="button">Revenir au profil</a></div>
    <table class="table table-striped borderStyleTable">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Consulter le profil</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($liste as $value): ?>
            <tr>
                <td><?= $value['nom'] ?> </td>
                <td><?= $value['prenom']?></td>
                <td><a href='?module=ModProfil&action=ConsulterProfil&id=<?= $value['idUtilisateur']?>' role="button" class="btn btn-warning">Consulter</a></td>
                <td><a href='?module=ModAmis&action=RetirerAmi&id=<?= $value['idUtilisateur']?>' role="button" class="btn btn-danger">Retirer</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-danger mt-5">Vous n'avez aucun amis</div>
        <div class="float-end">
            <a class="btn btn-danger" href="index.php?module=ModProfil&action=Profil" role="button">Revenir au profil</a>
        </div>
    <?php endif; ?>

</div>