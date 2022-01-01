<head>
    <script src="https://kit.fontawesome.com/6440c9a3af.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<?php
$liste = $data["liste"];
if (!empty($liste)): ?>
     <div class="container mt-5">
        <table class="table table-striped borderStyleTable">
            <tr>
                <th scope="col">Photo Match</th>
                <th scope="col">Nom Match</th>
                <th scope="col">lieu Match</th>
                <th scope="col">Consulter Match </th>
                <th scope="col">Participation</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($liste as $value): ?>
                <tr>
                    <td id="tdImage"><img id="imageMatch" src="./Vue/Affichage/Images/<?= $value['Image'] ?>" </td>
                    <td><?= $value['nomMatch']?></td>
                    <td><?= $value['lieu']?></td>
                    <td><button type="submit" class="btn btn-info "><a id="consulterMatch" href='?module=ModMatchs&action=ConsulterMatch&id=<?= $value['idMatch']?>'>Consulter Match</a></button></td>
                    <td><button type="submit" class="btn btn-success "><a id="participerMatch" href='?module=ModMatchs&action=Participer&id=<?= $value['idMatch']?>'>Participer</a></button></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>



    </div>
<?php else: ?>
    <div class="alert alert-danger mt-5">Aucun Matchs n'est encor crée</div>
<?php endif; ?>
