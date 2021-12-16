
<div id="container">
    <form action="index.php?module=ModInscription&action=inscription" method="POST">
        <h1>Inscription</h1>

        <input type="radio" id="choix1" class="civilite" name="civilite" value="monsieur">
        <label for="choix1">Mr</label>

        <input type="radio" id="choix2" class="civilite" name="civilite" value="madame">
        <label for="choix2">Mme</label>

        <label id="LabelPoste">Poste</label>
        <select name="poste">
            <option value="Att">Attaquant</option>
            <option value="Mil">Milieux</option>
            <option value="Def">Défenseur</option>
            <option value="G">Gardien</option>
        </select>


        <label id="prenom">Prénom</label>
        <input type="text"  placeholder="Entrer un prénom" name="prenom" required>

        <label>Nom</label>
        <input type="text" placeholder="Entrer un nom" name="nom" required>

        <label>Age</label>
        <input type="number" placeholder="Entrer l'age" name="age" required>

        <label>Ville</label>
        <input type="text" placeholder="Entrer une ville" name="ville" required>

        <label>Adresse mail</label>
        <input type="email" placeholder="Entrer l'adresse mail" name="login" required>

        <label>Mot de passe</label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>

        <input type="submit" id='submit' value='Inscription' >
        <a href="index.php?module=ModConnexion" id="msgConnexion">Vous avez déjà un compte ? Connexion</a>
    </form>
</div>
