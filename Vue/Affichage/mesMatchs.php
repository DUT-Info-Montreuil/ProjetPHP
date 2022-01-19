
<?php
$liste = $data["liste"];
if (!empty($liste)): ?>
    <div class="container">
        <div class="row-fluid ">
            <?php foreach ( $liste as $elements) : ?>
                <div id="idCard" >
                    <div class="card-columns-fluid " >
                        <div class="card  bg-light " >
                            <div id="imageMatch">
                                <img  src="./Vue/Affichage/Images/<?= $elements['Image'] ?>"  alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h5><b><?php echo $elements['nomMatch']?></b></h5>
                                <p><?php echo $elements['lieu'] ?></b></p>
                                <p><?php echo $date = date('d-m-Y', strtotime($elements['dateMatch']));?></b></p>
                                <p><?php echo $elements['heure'] ?></b>h</p>
                                <div id="buttonsMatch">
                                    <button type="submit" class="btn btn-info "><a id="consulterMatch" href='?module=ModMatchs&action=ConsulterMatch&id=<?= $elements['idMatch']?>'>Consulter</a></button>
                                    <button type="submit" class="btn btn-primary "><a id="discuterMatch" href='?module=ModDiscussion&action=DiscuterMatch&id=<?= $elements['idMatch']?>'>Discuter</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">Vous ne participez à aucun match pour le moment
        <a href="index.php?module=ModMatchs&action=PageMatchs" type="button" class="btn-close" role="button"</a>
    </div>
<?php endif; ?>
