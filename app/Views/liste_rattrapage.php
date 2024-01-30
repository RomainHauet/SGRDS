<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des Élèves</title>
        <link href="/assets/css/ListeEtudiant.css" rel="stylesheet" type="text/css">
        <script src="<?=base_url('assets/js/ListeEtudiant.js');?>" type="text/javascript"></script>
    </head>
    <body>
        <h1>Liste des Élèves</h1>
        <button><a href="/connexion">Connexion</a></button>
        <div class="pager">
        <table border="1" class="sortable">
            <thead>
                <tr>
                    <th aria-sort="ascending">
                        <button>
                            Ressource
                            <span aria-hidden="true"></span>
                        </button>
                    </th>
                    <th>
                        <button>
                            Date
                            <span aria-hidden="true"></span>
                        </button>
                    </th>
                    <th>
                        <button>
                            Durée
                            <span aria-hidden="true"></span>
                        </button>
                    </th>
                    <th>
                        <button>
                            Enseignant
                            <span aria-hidden="true"></span>
                        </button>
                    </th>
                    <th>
                        <button>
                            Etat
                            <span aria-hidden="true"></span>
                        </button>
                    </th>
                </tr>
            </thead>
            <?php foreach ($rattrapages as $rattrapage): ?>
                <tr>
                    <td><?=$rattrapage['ressource'];?></td>
                    <td><?=$rattrapage['date'];?></td>
                    <td><?=$rattrapage['duree'];?></td>
                    <td><?=$rattrapage['enseignant'];?></td>
                    <td><?=$rattrapage['etat'];?></td>
                </tr>
            <?php endforeach;?>
        </table>
        </div>
        <?php else: ?>
            <p>Aucun rattrapage.</p>
        <?php endif; ?>
    </body>
</html>