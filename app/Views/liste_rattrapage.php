<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des Élèves</title>
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/liste.css" rel="stylesheet" type="text/css">
        <script src="<?=base_url('assets/js/liste.js');?>" type="text/javascript"></script>
    </head>
    <body>
        <div style="display:table;width:100%">
            <div class="bandeau">
                <table class="logos">
                    <tbody>
                        <tr>
                            <td class="univ">
                                <img src="/assets/images/logoUniv.gif" alt="Universite du Havre">
                            </td>
                            <td>
                                <div class="titre">
                                    <h2 class="violet">Gestion des rattrapages de DS</h2>
                                    <h3 class="violet">Liste des rattrapages</h3>
                                </div>                            
                            </td>
                            <td class="di"><img src="/assets/images/diMini2009.gif" alt="Département Informatique"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br/><br/>

        <div class="cadre">
            <div class="pager">
                <?php if (!empty($rattrapages) && is_array($rattrapages)): ?>
                    <table class="sortable">
                        <thead>
                            <tr>
                                <th aria-sort="ascending">
                                    <button>
                                        Semestre
                                        <span aria-hidden="true"></span>
                                    </button>
                                </th>
                                <th>
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
                                        Type DS
                                        <span aria-hidden="true"></span>
                                    </button>
                                </th>
                                <th>
                                    <button>
                                        Type Rattrapage
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
                                        Salle
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
                        <tbody>
                        <?php foreach ($rattrapages as $rattrapage): ?>
                            <tr>
                                <td><?=$rattrapage['semestre'];?></td>
                                <td><?=$rattrapage['ressource'];?></td>
                                <td><?=$rattrapage['date_DS'];?></td>
                                <td><?=$rattrapage['type_DS'];?></td>
                                <td><?=$rattrapage['type_Rattrapage'];?></td>
                                <td><?=$rattrapage['duree'] . ' h';?></td>
                                <td><?=$enseignants[ 'id_Ens' == $rattrapage['enseignant'] ]['prenom'] . ' ' . $enseignants[ 'id_Ens' == $rattrapage['enseignant'] ]['nom'];?></td>
                                <td><?=$rattrapage['salle'];?></td>
                                <td><?=$rattrapage['etat'];?></td>
                                <td>
                                    <?php if (session()->get('isLoggedIn')): ?>
                                        <button onclick="window.location.href='/modifier/<?=$rattrapage['id_R'];?>';">Modifier</button>
                                        <button onclick="window.location.href='/supprimer/<?=$rattrapage['id_R'];?>';">Supprimer</button>
                                    <?php else: ?>
                                        <button onclick="window.location.href='/valider/<?=$rattrapage['id_R'];?>';">Valider</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Aucun rattrapage.</p>
                <?php endif; ?>
            </div>

            <?php if (session()->get('isLoggedIn')): ?>
                <div class="connexion">
                    <button onclick="window.location.href='/deconnexion';">Déconnexion</button>
                </div>
            <?php else: ?>
                <div class="connexion">
                    <button onclick="window.location.href='/connexion';">Connexion chef de département</button>
                </div>
            <?php endif; ?>
        </div>

        <?php if (session()->get('isLoggedIn')): ?>
            <div class="cadre">
                <div class="pager">
                    <button class="connexion" style="height: 50px;" onclick="window.location.href='/ajout';">Ajouter un rattrapage</button>
                    <button class="connexion" style="height: 50px;" onclick="window.location.href='/ajout_enseignant';">Gérer les enseignants</button>
                </div>
                <div style="width:20%;padding:10px"></div>
            </div>
        <?php endif;?>
    </body>
</html>