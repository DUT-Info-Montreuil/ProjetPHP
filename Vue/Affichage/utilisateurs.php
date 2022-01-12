<?php
    $liste = $data["liste"];
    if (!empty($liste)): ?>
<div class="container mt-5">
        <table class="table table-striped borderStyleTable">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Consuler Profil</th>
            <th scope="col">Demande Ami</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($liste as $value): ?>
                <tr>
                    <td><?= $value['nom'] ?> </td>
                    <td><?= $value['prenom']?></td>
                    <td><button type="submit" class="btn btn-info "><a id="consulterProfil" href='?module=ModProfil&action=ConsulterProfil&id=<?= $value['idUtilisateur']?>'>Consulter</a></button></td>
                    <td><button type="submit" class="btn btn-success "><a id="ajouterAmis" href='?module=ModAmis&action=EnvoyerDemande&id=<?= $value['idUtilisateur']?>'>Ajouter Ami</a></button></td>
                </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    <?php else: ?>
            <div class="alert alert-danger mt-5">Aucun utilisateurs</div>
    <?php endif; ?>
</div>