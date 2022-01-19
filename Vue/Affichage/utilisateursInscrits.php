<?php
$liste = $data["utilisateursInscrits"];
if (!empty($liste)):
?>
<div class="container mt-5">
    <table class="table table-striped borderStyleTable">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($liste as $value): ?>
            <tr>
                <td><?= $value['nom'] ?> </td>
                <td><?= $value['prenom']?></td>
                <td><a href='?module=ModAdmin&action=SupprimerUtilisateur&id=<?= $value['idUtilisateur']?>' class="btn btn-success">Supprimer</a></></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="alert alert-danger mt-5">Aucun utilisateurs</div>
    <?php endif; ?>
</div>