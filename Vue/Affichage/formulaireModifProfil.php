
		<main>
		<!-- /Section modification profil -->
		<section class="profilSection">
				<div id="topModification">
				<h2>Modification Profil</h2>
			</div>
            <form action="index.php?module=ModProfil&action=ModificationProfil" method="post">
					<div>
					<!--partie à gauche avec nom, civilite, prenom -->
						<div id="formLeft2">
                            <input type="radio" id="choix1" class="civilite" name="civilite" value="monsieur" required>
                            <label for="choix1">Mr</label>

                            <input type="radio" id="choix2" class="civilite" name="civilite" value="madame" required>
                            <label for="choix2">Mme</label>

                            <input id="nom" type="text" name="nomNv" size="30"/>
                            <label for="nom">Nom</label>

							<input id="prenom" type="text" name="prenomNv" size="49"/>
							<label id="prenomlabel" for="prenom">Prenom</label>

                            <label id="LabelPoste">Poste</label>
                            <select name="poste" required>
                                <option value="Att">Attaquant</option>
                                <option value="Mil">Milieux</option>
                                <option value="Def">Défenseur</option>
                                <option value="G">Gardien</option>
                            </select>
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
							<button id="buttonStyle" type="button"><a id="txt" href="index.php?module=ModProfil&action=Profil">Annuler Modification</a></button>
						</div>

					</div>		
				</form>
			</main>	
		</section>

