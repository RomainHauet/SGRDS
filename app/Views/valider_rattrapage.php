<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Confirmer un rattrapage</title>
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
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
                                    <?php if(isset($rattrapage)): ?>
                                        <h3 class="violet"> Confirmer un rattrapage</h3>
                                    <?php else: ?>
                                        <h3 class="violet">Modifier un rattrapage</h3>
                                    <?php endif; ?>
								</div>                            
							</td>
							<td class="di"><img src="/assets/images/diMini2009.gif" alt="Département Informatique"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
        
        <div class="cadre">
            <div class="pager">
                <form action="<?php echo isset($rattrapage) ? '/valider/'.$rattrapage['id_R'] : '/ajout'; ?>" method="post">
                    <div class="titre" style="display:flex">
                        <label for="date_Rattrapage">Date</label>
                        <input type="date" name="date_Rattrapage" id="date_Rattrapage" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['date_Rattrapage'].'"'; ?> required>
                    </div>

                    <br/>

                    <div class="titre" style="display:flex">
                        <label for="heure">Horaire</label>            
                        <input type="time" name="heure" id="heure" min="8:00" max="19:00"  <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['heure'].'"'; ?> required>
                    </div>

                    <br/>

                    <div class="titre" style="display:flex">
                        <label for="type_Rattrapage">Type</label>
                        <select name="type_Rattrapage" id="type_Rattrapage" required>
                            <option value="Devoir sur table" <?php if(isset($rattrapage) && $rattrapage['type_Rattrapage'] == 'Devoir sur table') echo 'selected'; ?>>Devoir sur table</option>
                            <option value="Devoir machine" <?php if(isset($rattrapage) && $rattrapage['type_Rattrapage'] == 'Devoir machine') echo 'selected'; ?>>Devoir machine</option>
                        </select>
                    </div>

                    <br/>

                    <div class="titre" style="display:flex">
                        <label for="salle">Salle</label>
                        <input type="number" name="salle" id="salle" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['salle'].'"'; ?> required>
                    </div>

                    <div class="titre" style="display:flex">
                        <label for="commentaire">Commentaire (si non rattrapage)</label>
                        <textarea name="commentaire" id="commentaire" rows="5" cols="33" maxlength="255"></textarea>
                    </div>
                    <br/>

                    <button class="connexion" type="button" onclick="window.location.href='/non_rattrapage/<?php echo $rattrapage['id_R']; ?>';"> Je ne veux pas faire de rattrapage</button>                    
                    <button class="connexion" type="submit">Valider rattrapage</button>
                </form>
            </div>
            <div class="connexion">
                <button onclick="window.location.href='/';">Retour à la liste</button>
            </div>
        </div>
    </body>
</html>