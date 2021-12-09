<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./modules/Affichage/Css/Style.css" type="text/css" />
    <title>Inscription</title>
</head>
<body>
<div id="container">
    <form action="index.php?module=ModInscription&action=inscription" method="POST">
        <h1>Inscription</h1>

        <label>Adresse mail</label>
        <input type="text" placeholder="Entrer l'adresse mail" name="login" required>

        <label>Mot de passe</label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>

        <input type="submit" id='submit' value='Inscription' >
        <a href="index.php?module=ModConnexion" id="msgConnexion">Vous avez déjà un compte ? Connexion</a>
    </form>
</div>
</body>
</html>