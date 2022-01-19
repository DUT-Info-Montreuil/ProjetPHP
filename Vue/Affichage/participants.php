<?php
$liste = $data["participants"];
if (!empty($liste)): ?>


<div class="container mt-5">
    <div class="mb-3"> <a class="btn btn-primary" href="index.php?module=ModMatchs&action=ConsulterMatch&id=<?= $_GET["id"]?>" role="button">Revenir au match</a></div>
    <table class="table table-striped borderStyleTable">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Consulter le profil</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($liste as $value): ?>
            <tr>
                <td><?= $value['nom'] ?> </td>
                <td><?= $value['prenom']?></td>
                <td><a href='?module=ModProfil&action=ConsulterProfil&id=<?= $value['idUtilisateur']?>' role="button" class="btn btn-warning">Consulter</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="alert alert-danger mt-5">Aucun participants</div>
        <div class="float-end">
            <a class="btn btn-danger" href="index.php?module=ModProfil&action=Profil" role="button">Revenir au profil</a>
        </div>
    <?php endif; ?>

</div>