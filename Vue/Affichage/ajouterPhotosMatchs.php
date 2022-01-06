<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body id="body">
<?php
$liste = $data["liste"];
if (!empty($liste)): ?>
<div class="container mt-5">
    <table class="table table-striped borderStyleTable">
        <tr>
            <th scope="col">Nom Match</th>
            <th scope="col">lieu</th>
            <th scope="col">date</th>
            <th scope="col">Ajouter Photos</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($liste as $value): ?>
            <tr>
                <td><?= $value['nomMatch'] ?> </td>
                <td><?= $value['lieu']?></td>
                <td><?= $value['dateMatch']?></td>
                <td>
                    <form  action="index.php?module=ModMatch&action=AjouterPhotos" method="post" enctype="multipart/form-data">
                    <div id="InputImageMatch">
                    <input type="file" name="imageMatch">
                    <button type="submit" class="btn btn-info "><a>Ajouter</a></button>
                    </div>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php else: ?>
        <div class="alert alert-danger mt-5">Aucun utilisateurs</div>
    <?php endif; ?>
</body>