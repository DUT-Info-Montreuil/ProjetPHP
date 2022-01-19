<div class="container">
    <div id="content" class="content p-0">
        <div class="match-header">
            <div class="match-header-cover"></div>
            <div class="match-header-content">
                <div class="match-header-img mb-4">
                        <img   src="./Vue/Affichage/Images/<?= $data[0]['Image'] ?>"   class="mb-4" alt="" />
                </div>
                <div class="match-header-info">
                    <h4 class="m-t-sm"><?=  $data[0]['nomMatch'] ?></h4>
                    <a href="index.php?module=ModMatchs&action=PageMatchs" class="btn btn-primary">Retour aux matchs</a>
                </div>
            </div>
            <ul class="match-header-tab nav nav-tabs">
                <li class="nav-item"><a href="#match" class="nav-link" name="matchInformations" data-toggle="tab"id="titreInformationMatch">Information</a></li>
                <li class="nav-item"><a href="?module=ModMatchs&action=PhotosMatchs&id=<?= $data[0]['idMatch']?>" class="nav-link " data-toggle="tab">Photos</a></li>
                <li class="nav-item"><a href="?module=ModAmis&action=TousMesAmisAInviter&id=<?= $data[0]['idMatch']?>" class="nav-link " data-toggle="tab">Inviter amis</a></li>

            </ul>
        </div>
        <div class="tab-pane fade active show" id="match"></div>
        <div class="card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0 mr-30">Nom  : </p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?= $data[0]['nomMatch']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Date: </p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?=  $data[0]['dateMatch']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Heure :</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?=  $data[0]['heure'] ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Lieu : </p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?=  $data[0]['lieu']  ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nombre de joueurs :</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?=  $data[0]['nbrJoueur']  ?></p>
                    </div>
                </div>
                <hr>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right;">
                    Retirer participation
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Voulez-vous vraiment retirer votre participation ?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <a href='?module=ModMatchs&action=RetirerParticipation&id=<?= $data[0]['idMatch']?>' class="btn btn-primary">Oui</a></button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


