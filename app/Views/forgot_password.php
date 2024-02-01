<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>SGRDS - Mot de passe oublié</title>
	<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<!-- formulaire d'oubli de mot de passe -->
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
								<h3 class="violet">Mot de passe oublié</h3>
							</div>                            
						</td>
						<td class="di"><img src="/assets/images/diMini2009.gif" alt="Département Informatique"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<br/><br/>

	<div class="cadre">
		<div class="pager">
			<form action="" method="post">
				<div class="titre" style="display:flex">
					<label for="email">Adresse e-mail</label>
					<input type="email" name="email" id="email" required>
				</div>

				<br/>

				<div class="titre" style="display:flex">
					<label class="erreur" style="color:<?php echo $couleur?>"><?php echo $message?></label>
				</div>

				<br/>

				<button class="connexion" type="submit">Envoyer</button>
			</form>
		</div>
		<div class="connexion">
			<button onclick="window.location.href='/connexion';">Retour à la connexion</button>
		</div>
	</div>
</body>