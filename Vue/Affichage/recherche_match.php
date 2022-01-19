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
                                <p><?php echo $elements['heure'] ?></b> H</p>
                                <div id="buttonsMatch">
                                    <button type="submit" class="btn btn-info "><a id="consulterMatch" href='?module=ModMatchs&action=ConsulterMatch&id=<?= $elements['idMatch']?>'>Consulter</a></button>
                                    <button type="submit" class="btn btn-success "><a id="participerMatch" href='?module=ModMatchs&action=Participer&id=<?= $elements['idMatch']?>'>Participer</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">Aucun matchs de ce nom n'a été créé pour le moment
        <a href="index.php?module=ModMatchs&action=PageMatchs" class="btn-close" role="button"></a>
    </div>
<?php endif; ?>
