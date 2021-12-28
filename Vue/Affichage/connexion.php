
<div id="container">
    <form id="formulaire" action="index.php?module=ModConnexion&action=connexion" method="POST">
        <h1>Se connecter</h1>

        <label>Adresse mail</label>
        <input type="email" value="<?php if (isset($_COOKIE['login'])) echo $_COOKIE['login'];?>" placeholder="Entrer l'adresse mail" name="login" required>

        <label>Mot de passe</label>
        <input type="password" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password'];?>"placeholder="Entrer le mot de passe" name="password" required>
        <input  type="checkbox" name="check" id="check">
        <label for="check">Rester connecté(e)</label>
        <input type="submit" id='submit' value='Connexion' >

        <a href="index.php?module=ModInscription" id="msgInscription">Vous n'avez pas de compte ? Inscription</a>
    </form>
</div>
