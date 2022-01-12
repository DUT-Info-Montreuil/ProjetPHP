
<body id="body">
<div class="container">
    <div id="content" class="content p-0">
        <div class="profile-header">
            <div class="profile-header-cover"></div>
            <div class="profile-header-content">
                <div class="profile-header-img mb-4">
                    <?php
                    if ($data['sexe']=='madame'): ?>
                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="mb-4" alt="" />
                    <?php else: ?>
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="mb-4" alt="" />
                    <?php endif; ?>
                </div>
                <div class="profile-header-info">
                    <h4 class="m-t-sm"><?= $data['nom'] ?></h4>
                </div>
            </div>
            <ul class="profile-header-tab nav nav-tabs">
                <li class="nav-item"><a href="#profile" class="nav-link" name="profil" data-toggle="tab">Information</a></li>
            </ul>
        </div>
        <div class="card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0 mr-30">Civilite : </p>
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
                        <p class="mb-0">Prenom :</p>
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
                <button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModAmis&action=TousLesUtilisateurs" >Revenir Au Liste</a></button>
                <button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModAmis&action=NoterUtilisateur" >Noter </a></button>
                </div>
        </div>
    </div>
</div>

</body>