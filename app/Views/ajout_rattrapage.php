<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajout d'un rattrapage</title>
    </head>
    <body>
        <h1>Ajout d'un rattrapage</h1>
        <form action="/ajout" method="post">
            <label for="ressource">Ressource</label>
            <input type="text" name="ressource" id="ressource" required>
            <br>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" required>
            <br>
            <label for="duree">Durée</label>
            <input type="number" name="duree" id="duree" required>
            <br>
            <label for="enseignant">Enseignant</label>
            <input type="text" name="enseignant" id="enseignant" required>
            <br>
            <input type="submit" value="Ajouter">
        </form>

        <?php if(isset($validation)): ?>
            <div>
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <a href="/">Retour à la liste des rattrapages</a>
    </body>
</html>