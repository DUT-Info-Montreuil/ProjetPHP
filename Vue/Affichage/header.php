<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./Vue/Affichage/Css/Style.css" type="text/css" />
    <title><?= $data['titre']?></title>
</head>
<body>
<header id="navbar" class="nav">
    <a href="index.php?module=ModAccueil" id="titre">BasicFoot</a>
    <div class="deroulant">
        <button id="buttonImage"><img src="Vue/Affichage/Images/compte.png" id="image"></button>
        <button id="buttonSimple">Mon compte</button>
        <div class="content">
            <?php
                if(empty($_SESSION['login'])) {
                    echo '<a href="index.php?module=ModConnexion">Connexion</a>
                    <a href="index.php?module=ModInscription">Inscription</a>';
                }
                else {
                    echo '<a href="index.php?module=ModProfil">Mon compte</a>
                        <a href="index.php?module=ModConnexion&action=deconnexion">Deconnexion</a>';
                }?>

        </div>
    </div>

    <a class="icon" onclick="myFunction()">&#9776</a>
</header>

<script>
    function myFunction() {
        var x = document.getElementById("navbar");
        if (x.className === "nav") {
            x.className += " responsive";
        } else {
            x.className = "nav";
        }
    }
</script>


<!-- https://www.pierre-giraud.com/html-css-apprendre-coder-cours/creation-menu-deroulant/-->
