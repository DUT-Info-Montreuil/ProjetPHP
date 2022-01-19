<?php
$liste = $data["liste"];
if (!empty($liste)):
?>
<div class="container mt-5">
    <table class="table table-striped borderStyleTable">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Consulter son profil</th>
            <th scope="col">Demande en ami</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($liste as $value): ?>
            <tr>
                <td><?= $value['nom'] ?> </td>
                <td><?= $value['prenom']?></td>
                <td><a href='?module=ModProfil&action=ConsulterProfil&id=<?= $value['idUtilisateur']?>' class="btn btn-info">Consulter</a></td>
                <td><a href='?module=ModAmis&action=EnvoyerDemande&id=<?= $value['idUtilisateur']?>' class="btn btn-success">Ajouter Ami</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert"> Il y actuellement aucun autre utilisateurs
            <a href="index.php?module=ModProfil" type="button" class="btn-close" role="button"</a>
        </div>
    <?php endif; ?>
</div>