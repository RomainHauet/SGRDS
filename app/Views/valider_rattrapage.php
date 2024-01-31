<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Confirmer un rattrapage</title>
    </head>
    <body>
        <?php if(isset($rattrapage)): ?>
            <h1> Confirmer un rattrapage</h1>
        <?php else: ?>
            <h1>modifier un rattrapage</h1>
        <?php endif; ?>
        
        <form action="<?php echo isset($rattrapage) ? '/valider/'.$rattrapage['id_R'] : '/ajout'; ?>" method="post">
            <br>
            <label for="date_Rattrapage">Date</label>
            <input type="date" name="date_Rattrapage" id="date_Rattrapage" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['date_Rattrapage'].'"'; ?> required>
            <br>
            <label for="heure">Horaire</label>
            <input type="number" name="heure" id="heure" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['heure'].'"'; ?> required>
            <br>
            <label for="type_Rattrapage">Type</label>
            <input type="text" name="type_Rattrapage" id="type_Rattrapage" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['type_Rattrapage'].'"'; ?> required>
            <br>
            <label for="salle">Salle</label>
            <input type="number" name="salle" id="salle" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['salle'].'"'; ?> required>
            <br>
            <input type="submit" value="Ajouter">
        </form>

        <?php if(isset($validation)): ?>
            <div>
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <a href="/">Retour</a>
    </body>
</html>