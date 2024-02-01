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
                <?php if (!empty($enseignant) && is_array($enseignant)): ?>
                    <table class="sortable">
                        <thead>
                            <tr>
                                <th aria-sort="ascending">
                                    <button>
                                        Nom
                                        <span aria-hidden="true"></span>
                                    </button>
                                </th>
                                <th>
                                    <button>
                                        Prénom
                                        <span aria-hidden="true"></span>
                                    </button>
                                </th>
                                <th>
                                    <button>
                                        Email
                                        <span aria-hidden="true"></span>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <?php foreach ($rattrapages as $rattrapage): ?>
                            <tr>
                                <td><?=$enseignant['Nom'];?></td>
                                <td><?=$enseignant['Prénom'];?></td>
                                <td><?=$enseignant['Email'];?></td>
                                <td>
                                        <button onclick="window.location.href='/modifier/<?=$rattrapage['id_R'];?>';">Modifier</button>
                                        <button onclick="window.location.href='/supprimer/<?=$rattrapage['id_R'];?>';">Supprimer</button>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                <?php else: ?>
                    <p>Aucun Enseignant sur la base de données.</p>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>