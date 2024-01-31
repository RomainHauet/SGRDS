<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>SGRDS - Mot de passe oublié</title>
</head>
<!-- formulaire de réinitialisation de mot de passe -->
<body>
	<h1>Réinitialisation de mot de passe</h1>
	<form action="/reset-password/done" method="post">
		<label for="password">Nouveau mot de passe</label>
		<input type="password" name="password" id="password">
		<label for="confirm_password">Confirmer le mot de passe</label>
		<input type="password" name="confirm_password" id="confirm_password">
		<input type="hidden" name="token" value="<?=$token?>">
		<input type="submit" value="Envoyer">
	</form>
</body>


		