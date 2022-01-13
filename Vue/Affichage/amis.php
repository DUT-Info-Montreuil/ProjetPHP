
<?php
$liste = $data["liste"];
if (!empty($liste)): ?>


<div class="container mt-5">
    <div class="mb-3"> <a class="btn btn-primary" href="index.php?module=ModProfil&action=Profil" role="button">Revenir au profil</a></div>
    <table class="table table-striped borderStyleTable">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Supprimer Ami</th>
            <th scope="col">Message</th>
            <th scope="col">Invitation Match</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($liste as $value): ?>
            <tr>
                <td><?= $value['nom'] ?> </td>
                <td><?= $value['prenom']?></td>
                <td><a href='?module=ModAmis&action=RetirerAmi&id=<?= $value['idUtilisateur']?>' role="button" class="btn btn-danger">Retirer</a></td>
                <td><a href='?module=ModAmis&action=EnvoyerMessage&id=<?= $value['idUtilisateur']?>' role="button" class="btn btn-warning">Messsage</a></td>
                <td><a href='?module=ModAmis&action=InviterMatch&id=<?= $value['idUtilisateur']?>' role="button" class="btn btn-success">Inviter</a></td>
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
