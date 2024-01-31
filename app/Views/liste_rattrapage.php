<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des Élèves</title>
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/ListeEtudiant.css" rel="stylesheet" type="text/css">
        <script src="<?=base_url('assets/js/ListeEtudiant.js');?>" type="text/javascript"></script>
    </head>
    <body>
    <div style="display:table;width:100%">
        <div class="bandeau" style="display: table-cell">
            <table class="logos">
                <tbody>
                    <tr>
                        <td class="univ">
                            <img src="./assets/images/logoUniv.gif" alt="Universite du Havre">
                        </td>
                        <td>
                            <div class="titre">
                                <h2 class="violet">Gestion des rattrapages de DS</h2>
                                <h3 class="violet">Liste des rattrapages</h3>
                            </div>                            
                        </td>
                        <td class="di"><img src="./assets/images/diMini2009.gif" alt="Département Informatique"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br/><br/>

    <?php if (!empty($rattrapages) && is_array($rattrapages)): ?>
        <div class="cadre">
            <div class="pager">
                <table class="sortable">
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
                            <td>
                                <button><a href="/modifier/<?=$rattrapage['id_R'];?>">Modifier</a></button>
                                <button><a href="/supprimer/<?=$rattrapage['id_R'];?>">Supprimer</a></button>
                        </tr>
                    <?php endforeach;?>
                </table>
            </div>

            <?php if (session()->get('isLoggedIn')): ?>
                <div class="connexion">
                    <button><a href="/deconnexion">Déconnexion</a></button>
                </div>
            <?php else: ?>
                <div class="connexion">
                    <button><a href="/connexion">Connexion</a></button>
                </div>
            <?php endif; ?>

        </div>
        <?php else: ?>
            <p>Aucun rattrapage.</p>
        <?php endif; ?>

        <?php if (session()->get('isLoggedIn')): ?>

            <div class="connexion">
                <button><a href="/ajout">Ajouter un rattrapage</a></button>
            </div>
        <?php endif; ?>
    </body>
</html>