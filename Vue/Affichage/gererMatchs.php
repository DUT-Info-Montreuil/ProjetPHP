
<div class="container rounded bg-light mt-3" >
    <div class="row">
        <div class="col-md-4 border-right">

            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <?php
                if ($data['sexe']=='madame'): ?>
                    <img class="rounded-circle mt-5" src="https://bootdey.com/img/Content/avatar/avatar3.png" class="mb-4" alt=""  width="90" />
                <?php else: ?>
                    <img class="rounded-circle mt-5" src="https://bootdey.com/img/Content/avatar/avatar7.png" class="mb-4" alt="" width="90" />
                <?php endif; ?>
                <?= $data['nom'] ?> <?= $data['prenom'] ?><span class="font-weight-bold"></span><span class="text-black-50"><?= $data['login'] ?></span><span><?= $data['ville'] ?></span></div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5 ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mr mb-1"></i>
                        <a href="index.php?module=ModProfil&action=Profil" class="btn btn-info" role="button">Revenir au profil</a>
                    </div>
                </div>
                <div class="mt-3 btn-group-vertical">
                    <button type="submit" class="btn btn-danger "><a id="mesMatchs" href='?module=ModMatchs&action=MesMatchs&id=<?= $data['idUtilisateur']?>'>Mes matchs</a></button>
                    <button type="submit" class="btn btn-success "><a id="rechercherMatchs" href='?module=ModMatchs&action=RechercherTousLesMatchs&id=<?= $data['idUtilisateur']?>'>Rechercher un match</a></button>
                    <button type="submit" class="btn btn-warning "><a id="creerMatch" href='?module=ModMatchs&action=FormulaireCreationMatch'>Creer un match</a></button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Agenda de vos amis</button>

                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Agenda des matchs de vos amis</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php if ((include_once('agenda.php'))==1) :?>
                                    <?php endif; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>