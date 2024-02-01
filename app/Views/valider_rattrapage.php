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
            <input type="time" name="heure" id="heure" min="8:00" max="19:00"  <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['heure'].'"'; ?> required>
            <br>
            <label for="type_Rattrapage">Type</label>
            <select name="type_Rattrapage" id="type_Rattrapage" required>
                <option value="Devoir sur table" <?php if(isset($rattrapage) && $rattrapage['type_Rattrapage'] == 'Devoir sur table') echo 'selected'; ?>>Devoir sur table</option>
                <option value="Devoir machine" <?php if(isset($rattrapage) && $rattrapage['type_Rattrapage'] == 'Devoir machine') echo 'selected'; ?>>Devoir machine</option>
            </select>
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