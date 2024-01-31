<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>SGRDS - Mot de passe oublié</title>
</head>
<!-- formulaire d'oubli de mot de passe -->
<body>
	<h1>Mot de passe oublié</h1>
	<form action="/oubli" method="post">
		<label for="email">Adresse e-mail</label>
		<input type="email" name="email" id="email">
		<input type="submit" value="Envoyer">
	</form>
</body>