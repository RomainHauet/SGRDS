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
        
        <script>
            console.log('Je rentre dans le script');
            // Récupère les semestres
            const semestres = <?= json_encode($semestres) ?>;

            // Trie les semestres par ordre croissant
            semestres.sort();

            // Récupère semestre sélectionné du formulaire
            const semestre = document.getElementById('semestre');

            // Affiche les ressources correspondantes au semestre sélectionné
            
            semestre.addEventListener('change', () =>
            {
                console.log('Je rentre dans le change');
                // Récupère la ressource sélectionnée selon le semestre
                const ressources = <?= json_encode($ressources) ?>;
                const ressource = document.getElementById('ressource');
                ressource.innerHTML = '';
                for (let i = 0; i < ressources.length; i++)
                {
                    console.log(semestre.value[1], ressources[i][2]);
                    // Je vérifie si la 2ème lettre du semestre correspond à la 2ème lettre du semestre de la ressource
                    if (semestre.value[1] === ressources[i][2])
                    {
                        console.log('Je rentre dans le if');
                        // Si oui, j'ajoute la ressource à la liste
                        const option = document.createElement('option');
                        option.value = ressources[i];
                        option.textContent = ressources[i];
                        ressource.appendChild(option);
                    }
                }
                console.log('Je sors du change');
            });
            console.log('Finished');
        </script>
    </body>

</html>