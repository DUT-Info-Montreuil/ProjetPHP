<div class="container">
    <div id="content" class="content p-0">
        <div class="profile-header">
            <div class="profile-header-cover"></div>
            <div class="profile-header-content">
                <div class="profile-header-img mb-4">
                    <?php
                    if ($data['sexe']=='Madame'): ?>
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="mb-4" alt="" />
                    <?php else: ?>
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="mb-4" alt="" />
                    <?php endif; ?>
                </div>
                <div class="profile-header-info">
                    <h4 class="m-t-sm"><?= $data['prenom'] ?></h4>
                    <a href="index.php?module=ModProfil&action=FormModifProfil" class="btn btn-xs btn-primary mb-2">Modifier mon profil</a>
                </div>
            </div>
            <ul class="profile-header-tab nav nav-tabs">
                <li class="nav-item"><a href="#profile" class="nav-link" name="profil" data-toggle="tab">Information</a></li>
                <li class="nav-item"><a href="index.php?module=ModAmis&action=TousMesAmis" class="nav-link " data-toggle="tab">Supprimer Matchs</a></li>
                <li class="nav-item"><a href="index.php?module=ModAmis&action=TousLesUtilisateurs" class="nav-link " data-toggle="tab">Supprimer Utilisateurs</a>
            </ul>
        </div>
        <div class="tab-pane fade active show" id="profile"></div>
        <div class="card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0 mr-30">Civilité : </p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?= $data['sexe'] ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nom : </p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?= $data['nom']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Prénom :</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?= $data['prenom']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Age : </p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?= $data['age']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Poste Match :</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?=  $data['posteMatch']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Ville :</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?=  $data['ville']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email :</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="mb-0"><?=  $data['login']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

