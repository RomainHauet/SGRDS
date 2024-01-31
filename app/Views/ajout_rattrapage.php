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

            <label for="semestre">Semestre</label>
            <select name="semestre" id="semestre" required>
                <?php 
                    foreach($semestres as $semestre): ?>
                        <option value="<?= $semestre ?>"><?= $semestre ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="ressource">Ressource</label>
            <select name="ressource" id="ressource" required>
                
            </select>

            <br>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" required>
            <br>
            <label for="duree">Durée</label>
            <input type="number" name="duree" id="duree" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['duree'].'"'; ?> required>
            <br>
            <label for="enseignant">Enseignant</label>
            <input type="text" name="enseignant" id="enseignant" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['enseignant'].'"'; ?> required>
            <br>
            <input type="submit" value="Ajouter">
        </form>

        <?php if(isset($validation)): ?>
            <div>
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <a href="/">Retour à la liste des rattrapages</a>
        
        <script>
            // Au changement de valeur du semestre
            semestre.addEventListener('change', () =>
            {
                // Je récupère la valeur du semestre sélectionné
                const semestre = document.getElementById('semestre').value;

                // Je récupère la liste des ressources
                const ressources = <?php echo json_encode($ressources); ?>;

                // Je récupère le select des ressources
                const ressource = document.getElementById('ressource');
                ressource.innerHTML = '';

                // Je parcours la liste des ressources
                for(let i = 0; i < ressources.length; i++)
                {
                    // Si la ressource correspond au semestre sélectionné
                    if(ressources[i].split(',')[0] === semestre)
                    {
                        // Je crée une option avec le nom de la ressource
                        const option = document.createElement('option');
                        option.value = ressources[i].id_R;
                        option.innerHTML = ressources[i].nom;
                        // J'ajoute l'option au select
                        ressource.appendChild(option);
                    }
                }
            });
        </script>
    </body>
</html>