
<form class ="barreRecherche" action="index.php?module=ModMatchs&action=FiltrerMatchs" method="post">
    <div class="search">
        <input type="text" class="searchTerm" name="filtrerMatchs" placeholder="Dans quelle ville vous-cherchez ">
        <button type="submit" class="searchButton">
            <i class="fa fa-search"></i>
        </button>
    </div>
</form>
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
    <div class="alert alert-danger mt-5">Aucun Matchs n'est encor crée</div>
<?php endif; ?>
