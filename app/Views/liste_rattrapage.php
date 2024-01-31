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
                                    <button onclick="window.location.href='/modifier/<?=$rattrapage['id_R'];?>';">Modifier</button>
                                    <button onclick="window.location.href='/supprimer/<?=$rattrapage['id_R'];?>';">Supprimer</button>
                                </td>
                            </tr>
                        <?php endforeach;?>
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
                </div>
                <div style="width:20%;padding:10px"></div>
            </div>
        <?php endif;?>
    </body>
</html>