<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des Élèves</title>
    </head>
    <body>
        <h1>Liste des Élèves</h1>
        <?php if (!empty($rattrapages)) : ?>
        <table border="1">
            <tr>
                <th>Ressource</th>
                <th>Date</th>
                <th>Durée</th>
                <th>Enseignant</th>
                <th>État</th>
            </tr>
            <?php foreach ($rattrapages as $rattrapage) : ?>
                <tr>
                    <td><?= $rattrapage['ressource']; ?></td>
                    <td><?= $rattrapage['date']; ?></td>
                    <td><?= $rattrapage['duree']; ?></td>
                    <td><?= $rattrapage['enseignant']; ?></td>
                    <td><?= $rattrapage['etat']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php else : ?>
            <p>Aucun rattrapage.</p>
        <?php endif; ?>
    </body>
</html>