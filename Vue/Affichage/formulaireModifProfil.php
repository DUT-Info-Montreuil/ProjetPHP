<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<!-- Styles -->
        <link rel="stylesheet" href="./Vue/Affichage/Css/StyleModification.css" type="text/css" />
        <title>Modification Profil</title>

</head>
	<body>
		<main>
		<!-- /Section modification profil -->
		<section>
				<div id="topModification">
				<h2>Modification Profil</h2>
			</div>
            <form action="index.php?module=ModProfil&action=ModificationProfil" method="post">
					<div>
					<!--partie à gauche avec nom, civilite, prenom -->
						<div id="formLeft2">
							<div id="civiliteNom">
								<label id="civilite" for="civil" name ="civilite" >Civilité</label>
								<label for="nom">Nom</label>
							</div>
							<div>
								<select name="civiliteNv" size="1" id="civil">
                                    <option value="monsieur" label="M"></option>
									<option value="madame" label="Mme"></option>
								</select>
								<input id="nom" type="text" name="nomNv" size="30"/>
							</div>
							<label id="prenomlabel" for="prenom">Prenom</label> 
							<input id="prenom" type="text" name="prenomNv" size="49"/>
							<label id="posteMatchLabel" for="posteMatch">Poste Préféré</label>
							<div>
								<input type="radio" id="attaquant" name="posteNv" value="attaquant" checked>
								<label for="attaquant">attaquant</label>
							</div>
							<div>
								<input type="radio" id="defendeur" name="posteNv" value="defendeur">
								<label for="defendeur">defendeur</label>
							</div>
							<div>
								<input type="radio" id="gardien" name="posteNv" value="gardien">
								<label for="gardien">gardien</label>
							</div>
						</div>
						<!--Form à droite avec email, mot de passe ... -->
						<div id="formRight2">
							<label for="age">Age</label> 	
							<input id="age" type="text" name="ageNv" size="47"/>
                            <label for="ville">ville</label>
                            <input id="ville" type="ville" name="villeNv" size="47"/>
							<label for="email">E-mail</label> 	
							<input id="email" type="email" name="emailNv" class="" size="47"/>
                            <button id="buttonValidAcc" name="FormModifProfil" type="submit">Je valide mes modifications</button>
							<button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModProfil&action=Profil" >
								Annuler Modification</a></button>
						</div>

					</div>		
				</form>
			</main>	
		</section>

