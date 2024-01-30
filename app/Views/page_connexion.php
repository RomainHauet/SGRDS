<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link href="/assets/css/connexion.css" rel="stylesheet" type="text/css">
</head>
<body>

    <h2>Connexion</h2>

    <form action="/connexionForm" method="post">
        <div id="cent">
            <div>
                <label for="username">Identifiant:</label>
                <input type="text" name="username" required>
            </div>

            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Connexion</button>
        </div>
    </form>

</body>
</html>
