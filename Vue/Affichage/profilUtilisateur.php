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
                                <button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModAmis&action=TousLesUtilisateurs" >Revenir Au Liste</a></button>
                                <button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModAmis&action=NoterUtilisateur" >Noter </a></button>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>