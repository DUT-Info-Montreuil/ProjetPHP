<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./Vue/Affichage/Css/Style.css" type="text/css" />
    <script src="https://kit.fontawesome.com/6440c9a3af.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $data['titre']?></title>

</head>
<body>

<div id="wrapper2">
<header>

    <nav id="navbar-example3" class="navbar navbar-expand-lg navbar-dark" style="background-color: #130255;" >
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?module=ModAccueil" id="titre">BasicFoot</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                    <?php
                    if(isset($_SESSION['login'])) {
                        echo '<li class="nav-item"><a class="nav-link" href="index.php?module=ModMatchs&action=PageMatchs" id="titreMatch">Matchs</a></li>';
                    }
                    ?>

                </ul>
                <span class="navbar-text">  <li class="nav-item dropdown" style="list-style: none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="Vue/Affichage/Images/compte.png" id="image">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="min-width: 0;">
                        <?php
                        if(empty($_SESSION['login'])) {
                            echo '<li><a class="dropdown-item" href="index.php?module=ModConnexion" style="color: black;">Connexion</a></li>
                               <li><a class="dropdown-item" href="index.php?module=ModInscription"style="color: black;">Inscription</a></li>';
                        }
                        else {
                            echo '<li><a class="dropdown-item" href="index.php?module=ModProfil" style="color: black;">Mon Compte</a></li>
                             <li><a class="dropdown-item" href="index.php?module=ModConnexion&action=deconnexion"style="color: black;">Déconnexion</a></li>';
                        }?>
                    </ul>

                </span>

            </div>
        </div>
    </nav>

</header>




