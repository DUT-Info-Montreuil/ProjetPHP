<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body id="body">
<div class="container">
    <div id="content" class="content p-0">
        <div class="profile-header">
            <div class="profile-header-cover"></div>
            <div class="profile-header-content">
                <div class="profile-header-img mb-4">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="mb-4" alt="" />
                </div>
                <div class="profile-header-info">
                    <h4 class="m-t-sm"><?= $data['nom'] ?></h4>
                    <a href="index.php?module=ModProfil&action=FormModifProfil" class="btn btn-xs btn-primary mb-2">Modifier Profile</a>
                </div>
            </div>
            <ul class="profile-header-tab nav nav-tabs">
                <li class="nav-item"><a href="#profile" class="nav-link" name="profil" data-toggle="tab">Information</a></li>
                <li class="nav-item"><a href="#profile-matchs" class="nav-link " data-toggle="tab">Mes matchs</a></li>
                <li class="nav-item"><a href="index.php?module=ModAmis&action=TousMesAmis" class="nav-link " data-toggle="tab">Mes Amis</a></li>
                <li class="nav-item"><a href="index.php?module=ModAmis&action=TousLesDemandesAmis" class="nav-link " data-toggle="tab">Mes invitations d'amis</a></li>
                <li class="nav-item"><a href="index.php?module=ModAmis&action=TousLesUtilisateurs" class="nav-link " data-toggle="tab">Tous les users</a></li>
            </ul>
        </div>
        <div class="profile-container">
            <div class="row row-space-20">
                <div class="col-md-8">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade active show" id="profile">
                        </div>
                        <section class="profilSection">
                            <div id="formLeft3">
                                <p>Nom : <?= $data['nom'] ?></p>
                                <p>Prenom :<?= $data['prenom']?></p>
                                <p>Age : <?= $data['age']?></p>
                            </div>
                            <div id="formRight4">
                                <p>Sexe : <?= $data['sexe']?></p>
                                <p>ville : <?=  $data['ville']?></p>
                                <p>Poste Match : <?= $data['posteMatch']?></p>
                                <p>Adresse Email : <?= $data['login']?></p>
                                <button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModProfil&action=FormSuppProfil" >Supprimer  Compte</a></button>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>