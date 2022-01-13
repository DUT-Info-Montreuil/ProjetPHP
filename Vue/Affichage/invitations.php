
<?php
$liste = $data["liste"];
if (!empty($liste)): ?>
<div class="container mt-5">
    <table class="table table-striped borderStyleTable">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Confirmation</th>
            <th scope="col">Refusé</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($liste as $value): ?>
            <tr>
                <td><?= $value['nom'] ?> </td>
                <td><?= $value['prenom']?></td>
                <td><a href='?module=ModAmis&action=AccepterDemande&id=<?= $value['idUtilisateur']?>' class="btn btn-success" role="button">Accepter</a></td>
                <td><a href='?module=ModAmis&action=RetirerAmi&id=<?= $value['idUtilisateur']?>' class="btn btn-danger" role="button">Refuser</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="alert alert-danger mt-5" >Aucune demandes d'amis</div>
        <div class="float-end">
            <a class="btn btn-danger" href="index.php?module=ModProfil&action=Profil" role="button">Revenir au profil</a>
        </div>

    <?php endif; ?>

