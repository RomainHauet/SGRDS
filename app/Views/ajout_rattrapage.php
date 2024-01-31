<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajout d'un rattrapage</title>
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
                                        <h3 class="violet">Modification d'un rattrapage</h3>
                                    <?php else: ?>
                                        <h3 class="violet">Ajout d'un rattrapage</h3>
                                    <?php endif; ?>
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
                <form action="<?php echo isset($rattrapage) ? '/modifier/'.$rattrapage['id_R'] : '/ajout'; ?>" method="post">

                    <div class="titre" style="display:flex">
                        <label for="semestre">Semestre</label>
                        <select name="semestre" id="semestre" required>
                            <?php foreach($semestres as $semestre): ?>
                                <option value="<?= $semestre ?>"><?= $semestre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <br/>
                    
                    <div class="titre" style="display:flex">
                        <label for="ressource">Ressource</label>
                        <select name="ressource" id="ressource" required>
                            <!-- affiche les ressources en fonction du semestre -->
                            <?php foreach($ressources as $ressource): ?>
                                <option value="<?= $ressource ?>"><?= $ressource ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <br/>
        
                    <div class="titre" style="display:flex">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" required>
                    </div>

                    <br/>

                    <div class="titre" style="display:flex">
                        <label for="duree">Durée</label>
                        <input type="number" name="duree" id="duree" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['duree'].'"'; ?> required>
                    </div>

                    <br/>

                    <div class="titre" style="display:flex">
                        <label for="enseignant">Enseignant</label>
                        <input type="text" name="enseignant" id="enseignant" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['enseignant'].'"'; ?> required>
                    </div>

                    <br/>
                    
                    <button class="connexion" type="submit">Ajouter</button>
                </form>
            </div>
            <div class="connexion">
                <button onclick="window.location.href='/';">Retour à la liste</button>
            </div>
        </div>
    </body>
</html>