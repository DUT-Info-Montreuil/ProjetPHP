<?php
$liste = $data["matchsExpired"];
if (!empty($liste)): ?>
<div class="container mt-5">
    <table class="table table-striped borderStyleTable">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Lieu </th>
            <th scope="col">Suppresion</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($liste as $value): ?>
            <tr>
                <td><?= $value['nomMatch'] ?> </td>
                <td><?= $value['lieu'] ?> </td>
                <td><a href='?module=ModAdmin&action=SupprimerMatchExpired&id=<?= $value['idMatch']?>' class="btn btn-danger" role="button">Retirer</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="alert alert-danger mt-5" >Aucune matchs expirés</div>
        <div class="float-end">
            <a class="btn btn-danger" href="index.php?module=ModProfil&action=Profil" role="button">Revenir au profil</a>
        </div>

    <?php endif; ?>
