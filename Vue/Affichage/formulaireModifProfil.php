<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>Modification Profil</title>
		<!-- Styles -->
    <link rel="stylesheet" href="./Vue/Affichage/Css/StyleModification.css" type="text/css" />

</head>
	<body>
		<main>
		<!-- /Section modification profil -->
		<section>
				<div id="topModification">
				<h2>Modification Profil</h2>
			</div>					
			<form>
					<!-- Div du milieu -->
					<div>
					<!--partie à gauche avec nom, civilite, prenom -->
						<div id="formLeft2">
							<div id="civiliteNom">
								<label id="civilite" for="civil" name ="civiliteNv">Civilité</label>
								<label for="nom">Nom</label>
							</div>
							<div>
								<select name="civilite" size="1" id="civil">
									<option value="1" label=""></option>
									<option value="2" label="M"></option>
									<option value="3" label="Mme"></option>
									<option value="4" label="Mlle"></option>
								</select>
								<input id="nom" type="text" name="nom" size="30" pattern="[A-Z][a-z]*"/>
							</div>
							<label id="prenomlabel" for="prenom">Prenom</label> 
							<input id="prenom" type="text" name="prenom" size="49" pattern="[A-Z][a-z]*"/>
							<label id="posteMatchLabel" for="posteMatch">Poste Préféré</label> 
							<div>
								<input type="radio" id="attaquant" name="poste" value="attaquant" checked>
								<label for="attaquant">attaquant</label>
							</div>
							<div>
								<input type="radio" id="defendeur" name="poste" value="defendeur">
								<label for="defendeur">defendeur</label>
							</div>
							<div>
								<input type="radio" id="gardien" name="poste" value="gardien">
								<label for="gardien">gardien</label>
							</div>
						</div>
						<!--Form à droite avec email, nom utilisateur, mot de passe-->
						<div id="formRight2">
							<label for="age">Age</label> 	
							<input id="age" type="text" name="age" size="47"/>
							<label for="email">E-mail</label> 	
							<input id="email" type="email" name="email" class="" size="47"/>
							<label for="passwd">Mot de passe</label> 	
							<input id="passwd" type="password" name="passwd" size="47"/>
							<button id="buttonValidAcc" name="connect" type="button">Je valide mes modifications</button>
							<button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModProfil&action=Profil" >
								Annuler Modification</a></button>
						</div>

					</div>		
				</form>
			</main>	
		</section>
	</body>
</html>