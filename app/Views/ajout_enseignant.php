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
                                    <h2 class="violet">Gestion des enseignants</h2>
                                    <h3 class="violet">Liste des enseignants</h3>
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
                <?php if (!empty($enseignants) && is_array($enseignants)): ?>
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
                        <?php foreach ($enseignants as $enseignant): ?>
                            <tr>
                                <td><?=$enseignant['nom'];?></td>
                                <td><?=$enseignant['prenom'];?></td>
                                <td><?=$enseignant['email'];?></td>
                                <td>
                                    <button onclick="window.location.href='/supprimerEnseignant/<?=$enseignant['id_Ens'];?>';">Supprimer</button>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                <?php else: ?>
                    <p>Aucun Enseignant sur la base de données.</p>
                <?php endif;?>
            </div>
			<div class="connexion">
                    <button onclick="window.location.href='/';">Retour à l'accueil</button>
            </div>
        </div>

		<div class="titre">
			<h3 class="violet">Ajout d'un enseignant</h3>
		</div>

        <br/><br/>

        <div class="cadre">
            <div class="pager">
                <form action='/ajout_enseignant/' " method="post">

					<br/>

                    <div class="titre" style="display:flex">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" required>
                    </div>

                    <br/>

                    <div class="titre" style="display:flex">
                        <label for="prenom">Prenom</label>
                        <input type="text" name="prenom" id="prenom" required>
                    </div>

                    <br/>

                    <div class="titre" style="display:flex">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <br/>

                    <button class="connexion" type="submit">Ajouter</button>
                </form>
            </div>
            <div class="connexion">
                <!--<button onclick="window.location.href='/';">Retour à la liste</button>-->
            </div
        </div>
    </body>
</html>