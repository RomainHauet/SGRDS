<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajout d'un rattrapage</title>
    </head>
    <body>
        <h1>Ajout d'un rattrapage</h1>
        <form action="/ajout" method="post">

            <label for="semestre">Semestre</label>
            <select name="semestre" id="semestre" required>
                <?php foreach($semestres as $semestre): ?>
                    <option value="<?= $semestre ?>"><?= $semestre ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="ressource">Ressource</label>
            <select name="ressource" id="ressource" required>
                <!-- affiche les ressources en fonction du semestre -->
                <?php foreach($ressources as $ressource): ?>
                    <option value="<?= $ressource ?>"><?= $ressource ?></option>
                <?php endforeach; ?>
            </select>

            <br>
            <label for="date_DS">Date</label>
            <input type="date" name="date_DS" id="date_DS" required>
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