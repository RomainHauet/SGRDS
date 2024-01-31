<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajout d'un rattrapage</title>
    </head>
    <body>
        <?php if(isset($rattrapage)): ?>
            <h1>Modification d'un rattrapage</h1>
        <?php else: ?>
            <h1>Ajout d'un rattrapage</h1>
        <?php endif; ?>
        
        <form action="<?php echo isset($rattrapage) ? '/modifier/'.$rattrapage['id_R'] : '/ajout'; ?>" method="post">
            <br>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" required>
            <br>
            <label for="horaire">Horaire</label>
            <input type="number" name="horaire" id="horaire" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['horaire'].'"'; ?> required>
            <br>
            <label for="type">Type</label>
            <input type="text" name="type" id="type" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['type'].'"'; ?> required>
            <br>
            <label for="salle">Salle</label>
            <input type="text" name="salle" id="salle" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['salle'].'"'; ?> required>

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