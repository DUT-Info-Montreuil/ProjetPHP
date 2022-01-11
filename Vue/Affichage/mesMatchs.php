<head>
    <script src="https://kit.fontawesome.com/6440c9a3af.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script></head>
</head>
<body id="body">
<?php
$liste = $data["liste"];

if (!empty($liste)): ?>
    <div class="container">
        <div class="row-fluid ">
            <?php foreach ( $liste as $elements) : ?>

                <div id="idCard" >
                    <div class="card-columns-fluid" >
                        <div class="card  bg-light" >
                            <div id="imageMatch">
                                <img  src="./Vue/Affichage/Images/<?= $elements['Image'] ?>"  alt="Card image cap">
                            </div>
                            <div class="card-body">

                                <h5><b><?php echo $elements['nomMatch']?></b></h5>

                                <p><?php echo $elements['lieu'] ?></b></p>
                                <p><?php echo $elements['dateMatch'] ?></b></p>
                                <p><?php echo $elements['heure'] ?></b>h</p>
                                <div id="buttonsMatch">
                                    <button type="submit" class="btn btn-info "><a id="consulterMatch" href='?module=ModMatchs&action=ConsulterMatch&id=<?= $elements['idMatch']?>'>Consulter</a></button>
                                    <button type="submit" class="btn btn-primary "><a id="discuterMatch" href='?module=ModDiscussion&action=DiscuterMatch&id=<?= $elements['idMatch']?>'>Discuter</a></button>
                                    <button id="buttonRetirer" type="submit" class="btn btn-danger "><a id="retirerMatch" href='?module=ModMatchs&action=RetirerParticipation&id=<?= $elements['idMatch']?>'>Retirer</a></button>
                                    <button type="submit" id="buttonAjouterPhotos" class="btn btn-warning "><a id="ajouterPhotos" href='?module=ModMatchs&action=FormAjouterPhotosMatchs&id=<?= $elements['idMatch']?>'>Ajouter Photo</a></button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-danger mt-5">Vous avez participé a aucun match !</div>
<?php endif; ?>
</body>