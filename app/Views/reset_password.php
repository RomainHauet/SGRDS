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

	<form action="" method="post">
		<label for="password">Nouveau mot de passe</label>
		<input type="password" name="password" id="password">
		<label for="confirm_password">Confirmer le mot de passe</label>
		<input type="password" name="confirm_password" id="confirm_password">
		<input type="hidden" name="token" value="<?=$token?>">
		<input type="submit" value="Envoyer">
	</form>
</body>


		