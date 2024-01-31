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
                <input type="text" name="identifiant" required>
            </div>

            <?php if(session()->getFlashdata('utilisateurError')): ?>
                <div class="alert alert-danger"><?=session()->getFlashdata('utilisateurError') ?></div>
            <?php endif; ?>

            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" name="motDePasse" required>
            </div>
            <?php if(session()->getFlashdata('mdpError')): ?>
                <div class="alert alert-danger"><?=session()->getFlashdata('mdpError') ?></div>
            <?php endif; ?>

            <button type="submit">Connexion</button>
        </div>
    </form>

</body>
</html>
