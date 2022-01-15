<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./Vue/Affichage/Css/Style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://kit.fontawesome.com/6440c9a3af.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                    <?php if(isset($_SESSION['login'])):?>
                        <li class="nav-item"><a class="nav-link" href="index.php?module=ModMatchs&action=PageMatchs" id="titreMatch"><i class="fas fa-futbol"></i></a></li>';
                        <div class="notificationNav">
                        <ul>
                        <li>
                            <a href="#" id="notifications">
                                <label for="check">
                                    <i class="fa fa-bell-o fa-2x" aria-hidden="true"></i>
                                    <span class="count"><div id="result-comptage"></div></span>
                                </label>
                            </a>
                            <input type="checkbox" class="dropdown-check" id="check" />
                            <ul class="dropdown">
                                <div id="result-search2"></div>
                            </ul>
                            </li>
                        </ul>
                        </div>
                    <?php endif; ?>
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



