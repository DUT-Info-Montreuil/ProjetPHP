<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./Vue/Affichage/Css/Style.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $data['titre']?></title>
</head>
<body>
<!--<header id="navbar" class="nav">
    <a href="index.php?module=ModAccueil" id="titre">BasicFoot</a>
    <div class="deroulant">
        <button id="buttonImage"><img src="Vue/Affichage/Images/compte.png" id="image"></button>
        <button id="buttonSimple">Mon compte</button>
        <div class="content">
            <?php
/*                if(empty($_SESSION['login'])) {
                    echo '<a href="index.php?module=ModConnexion">Connexion</a>
                    <a href="index.php?module=ModInscription">Inscription</a>';
                }
                else {
                    echo '<a href="index.php?module=ModProfil">Mon compte</a>
                        <a href="index.php?module=ModConnexion&action=deconnexion">Deconnexion</a>';
                }*/?>

        </div>
    </div>-->

<header >
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #130255;" >
        <div class="container-fluid" >
            <a class="navbar-brand" href="index.php?module=ModAccueil" id="titre">BasicFoot</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav" >
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="Vue/Affichage/Images/compte.png" id="image" class="position-absolute bottom-0 end-0">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <?php
                                 if(empty($_SESSION['login'])) {
                                        echo '<li><a class="dropdown-item" href="index.php?module=ModConnexion">Connexion</a></li>
                                        <li><a class="dropdown-item" href="index.php?module=ModInscription">Inscription</a></li>';
                                 }
                                 else {
                                     echo '<li><a class="dropdown-item" href="index.php?module=ModProfil">Mon Compte</a></li>
                                      <li><a class="dropdown-item" href="index.php?module=ModConnexion&action=deconnexion">Déconnexion</a></li>';
                                 }?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


