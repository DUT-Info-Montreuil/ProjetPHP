<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./Vue/Affichage/Css/Style.css" type="text/css" />
    <title><?= $data['titre']?></title>
</head>
<body>
<nav>
    <a href="index.php?module=ModAccueil" id="titre">BasicFoot</a>

    <!-- https://www.pierre-giraud.com/html-css-apprendre-coder-cours/creation-menu-deroulant/-->
    <?php
    if(empty($_SESSION['login'])) {
        echo '<ul class="containerListe">
            <li class="deroulant"><img src="./Vue/Affichage/Images/compte.png" id="image"><a href="#"></a>
                <ul class="sous">
                    <li><a href="index.php?module=ModConnexion">Connexion</a></li>
                    <li><a href="index.php?module=ModInscription">Inscription</a></li>
                </ul>
            </li>
        </ul>';
    }
    else {
        echo '<ul class="containerListe">
            <li class="deroulant"><img src="Images/agenda.png"><a href="#"></a>
                <ul class="sous">
                    <li><a href="index.php?module=ModProfil">Mon compte</a></li>
                    <li><a href="index.php?module=ModConnexion&action=deconnexion">Deconnexion</a></li>
                </ul>
            </li>
        </ul>';
    }?>

</nav>
