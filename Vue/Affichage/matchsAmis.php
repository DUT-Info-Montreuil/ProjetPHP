
<?php
$listeMatchs = $data["liste"];
$listeAmis = $data["AmisParticipants"];
$var =0;

if (!empty($listeMatchs)): ?>
<div class="container mt-5">
    <table class="table table-striped borderStyleTable">
        <thead>
        <tr>
            <th scope="col">Nom ami</th>
            <th scope="col">Match</th>
            <th scope="col">dateMatch</th>
            <th scope="col">lieu</th>
            <th scope="col">Image Match</th>
            <th scope="col">participer</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($listeMatchs as $value): ?>
        <tr>
            <td><?= $listeAmis[$var][0] ?></td>
            <?= $var++;?>
            <td><?= $value['nomMatch'] ?> </td>
                <td><?= $value['dateMatch']?></td>
                <td><?= $value['lieu']?></td>
                <td>   <div id="imageMatchAmis">
                        <img  src="./Vue/Affichage/Images/<?= $value['Image'] ?>"  alt="Card image cap">
                    </div></td>
                <td><button type="submit" class="btn btn-success "><a id="participerMatch" href='?module=ModMatchs&action=Participer&id=<?= $value['idMatch']?>'>Participer</a></button></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
        <div class="alert alert-danger mt-5">Pas de match</div>
<?php endif; ?>

