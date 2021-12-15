<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./Vue/Affichage/Css/Style.css" type="text/css" />
        <title>Connexion</title>
    </head>
    <body>
        <div id="container">
            <form action="index.php?module=ModConnexion&action=connexion" method="POST">
                <h1>Se connecter</h1>

                <label>Adresse mail</label>
                <input type="email" placeholder="Entrer l'adresse mail" name="login" required>

                <label>Mot de passe</label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='Connexion' >
                <a href="index.php?module=ModInscription" id="msgInscription">Vous n'avez pas de compte ? Inscription</a>
            </form>
        </div>
    </body>
</html>