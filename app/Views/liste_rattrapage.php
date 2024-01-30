<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des Élèves</title>
        <link href="/assets/css/ListeEtudiant.css" rel="stylesheet" type="text/css">
        <script src="<?=base_url('assets/js/ListeEtudiant.js');?>" type="text/javascript"></script>
    </head>
    <body>
        <button><a href="/connexion">Connexion</a></button>
        <?php if (!empty($rattrapages) && is_array($rattrapages)): ?>
        <h1>Liste des rattrapages</h1>
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
                    <td><?=$rattrapage['date_DS'];?></td>
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

        <?php if(!empty($session) && $session->get('isLoggedIn') == true): ?>
            <button><a href="/ajout_rattrapage">Ajouter un rattrapage</a></button>
        <?php endif; ?>

    </body>
</html>