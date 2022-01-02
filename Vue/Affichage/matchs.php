<head>
    <script src="https://kit.fontawesome.com/6440c9a3af.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body id="body">
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
                        <a href="index.php?module=ModProfil&action=Profil" class="btn btn-info" role="button">Revenir Au profil</a>
                    </div>
                </div>
                <div class="mt-3 btn-group-vertical">
                    <button type="submit" class="btn btn-danger "><a id="mesMatchs" href='?module=ModMatchs&action=MesMatchs&id=<?= $data['idUtilisateur']?>'>Mes Matchs</a></button>
                    <button type="submit" class="btn btn-success "><a id="rechercherMatchs" href='?module=ModMatchs&action=RechercherMatchs&id=<?= $data['idUtilisateur']?>'>Rechercher Matchs</a></button>
                    <button type="submit" class="btn btn-warning "><a id="creerMatch" href='?module=ModMatchs&action=FormulaireCreationMatch'>Creer Un Match</a></button>
                </div>
            </div>
        </div>
    </div>
</div>