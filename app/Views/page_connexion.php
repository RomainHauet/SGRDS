<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
</head>
<body>

    <h2>Connexion</h2>

    <?php echo form_open('connexionForm'); ?>

    <label for="username">Identifiant:</label>
    <input type="text" name="username" required>

    <label for="password">Mot de passe:</label>
    <input type="password" name="password" required>

    <button type="submit">Connexion</button>

    <?php echo form_close(); ?>

</body>
</html>
