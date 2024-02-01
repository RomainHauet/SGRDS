<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>SGRDS - Mot de passe oublié</title>
		<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<!-- formulaire de réinitialisation de mot de passe -->
	<body>
		<div style="display:table;width:100%">
			<div class="bandeau">
				<table class="logos">
					<tbody>
						<tr>
							<td class="univ">
								<img src="/assets/images/logoUniv.gif" alt="Universite du Havre">
							</td>
							<td>
								<div class="titre">
									<h2 class="violet">Gestion des rattrapages de DS</h2>
									<h3 class="violet">Changement de mot de passe</h3>
								</div>                            
							</td>
							<td class="di"><img src="/assets/images/diMini2009.gif" alt="Département Informatique"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<br/><br/>

		<div class="formulaire">
			<form action="" method="post">
				<div class="titre" style="display:flex">
					<label for="password">Nouveau mot de passe</label>
					<input type="password" name="password" id="password" required>
				</div>

				<br/>

				<div class="titre" style="display:flex">
					<label for="confirm_password">Confirmer le mot de passe</label>
					<input type="password" name="confirm_password" id="confirm_password" required>
				</div>

				<br/>
				
				<div class="titre" style="display:flex">
					<label class="erreur" style="color:<?php echo $couleur?>"><?php echo $message?></label>
				</div>

				<br/>

				<div class="titre" style="display:flex">
					<button class="connexion" type="submit">Envoyer</button>
				</div>

				<input type="hidden" name="token" value="<?=$token?>">
			</form>
		</div>
	</body>
</html>