
<?php
$listeMatchs = $data["Matchs"];
$listeAmis = $data["AmisInvitants"];
$var =0;


if (!empty($listeMatchs)): ?>
<div class="container mt-5">
    <h1 class="titrePageAmis">Mes demandes de matchs</h1>
    <a class="btn btn-primary" href="index.php?module=ModProfil&action=Profil" role="button" style="margin-bottom: 20px;">Revenir au profil</a>
    <table class="table table-striped borderStyleTable">
        <thead>
        <tr>
            <th scope="col">Amis</th>
            <th scope="col">Nom</th>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Lieu</th>
            <th scope="col">Consulter</th>
            <th scope="col">Participer</th>
            <th scope="col">Refuser</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($listeMatchs as $value): ?>
            <tr>
                <td><?= $listeAmis[$var][0] ?></td>
                <?= $var++;?>
                <td><?= $value['nomMatch'] ?> </td>
                <td><?= $value['dateMatch']?></td>
                <td><?= $value['heure']?></td>
                <td><?= $value['lieu']?></td>
                <td><a href='?module=ModMatchs&action=ConsulterMatch&id=<?= $value['idMatch']?>'class="btn btn-primary ">Consulter</a></td>
                <td><a href='?module=ModMatchs&action=Participer&id=<?= $value['idMatch']?>'class="btn btn-success ">Participer</a></td>
                <td><a href='?module=ModMatchs&action=SupprimerInvitation&id=<?= $value['idMatch']?>'class="btn btn-danger ">Refuser</a></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="alert alert-danger mt-5">Vous êtes invité à aucun match pour le moment</div>
        <div class="float-end">
            <a class="btn btn-danger" href="index.php?module=ModProfil&action=Profil" role="button">Revenir au profil</a>
        </div>
    <?php endif; ?>
