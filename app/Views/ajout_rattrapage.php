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
                                <!-- Selectionne si il y a un isset($rattrapage) et que le semestre est égal au semestre du rattrapage -->
                                <option value="<?= $semestre ?>" <?php if(isset($rattrapage) && $rattrapage['semestre'] == $semestre) echo 'selected'; ?>><?= $semestre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <br/>
                    
                    <div class="titre" style="display:flex">
                        <label for="ressource">Ressource</label>
                        <select name="ressource" id="ressource" required>
                            <!-- affiche les ressources en fonction du semestre
                            <?php foreach($ressources as $ressource): ?>
                                <option value="<?= $ressource ?>"><?= $ressource ?></option>
                            <?php endforeach; ?>-->
                            <option value="R1.01" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R1.01') echo 'selected'; ?>>R1.01   Initiation au développement</option>
                            <option value="R1.02" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R1.02') echo 'selected'; ?>>R1.02   Initiation à l'algorithmique</option>
                            <option value="R1.03" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R1.03') echo 'selected'; ?>>R1.03   Initiation aux systèmes d'exploitation</option>
                            <option value="R1.04" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R1.04') echo 'selected'; ?>>R1.04   Initiation aux réseaux</option>
                            <option value="R1.05" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R1.05') echo 'selected'; ?>>R1.05   Introduction Base de données</option>
                            <option value="R1.06" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R1.06') echo 'selected'; ?>>R1.06   Mathématiques discrètes</option>
                            <option value="R1.07" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R1.07') echo 'selected'; ?>>R1.07   Outils mathématiques fondamentaux</option>
                            <option value="R1.08" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R1.08') echo 'selected'; ?>>R1.08   Gestion de projet et des organisations</option>
                            <option value="R1.09" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R1.09') echo 'selected'; ?>>R1.09   Économie durable et numérique</option>
                            <option value="R1.10" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R1.10') echo 'selected'; ?>>R1.10   Anglais Technique</option>
                            <option value="R1.11" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R1.11') echo 'selected'; ?>>R1.11   Bases de la communication</option>
                            <option value="R1.12" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R1.12') echo 'selected'; ?>>R1.12   Projet Professionnel et Personnel</option>
                            <option value="P1.01" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'P1.01') echo 'selected'; ?>>P1.01   Portfolio</option>
                            <option value="R2.01" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.01') echo 'selected'; ?>>R2.01   Développement orienté objets</option>
                            <option value="R2.02" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.02') echo 'selected'; ?>>R2.02   Développement d'applications avec IHM</option>
                            <option value="R2.03" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.03') echo 'selected'; ?>>R2.03   Qualité de développement</option>
                            <option value="R2.04" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.04') echo 'selected'; ?>>R2.04   Communication et fonctionnement bas niveau</option>
                            <option value="R2.05" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.05') echo 'selected'; ?>>R2.05   Introduction aux services réseaux</option>
                            <option value="R2.06" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.06') echo 'selected'; ?>>R2.06   Exploitation d'une base de données</option>
                            <option value="R2.07" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.07') echo 'selected'; ?>>R2.07   Graphes</option>
                            <option value="R2.08" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.08') echo 'selected'; ?>>R2.08   Outils numériques pour les statistiques</option>
                            <option value="R2.09" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.09') echo 'selected'; ?>>R2.09   Méthodes Numériques</option>
                            <option value="R2.10" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.10') echo 'selected'; ?>>R2.10   Gestion de projet et des organisations</option>
                            <option value="R2.11" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.11') echo 'selected'; ?>>R2.11   Droit</option>
                            <option value="R2.12" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.12') echo 'selected'; ?>>R2.12   Anglais d'entreprise</option>
                            <option value="R2.13" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.13') echo 'selected'; ?>>R2.13   Communication Technique</option>
                            <option value="R2.14" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R2.14') echo 'selected'; ?>>R2.14   Projet Professionnel et Personnel</option>
                            <option value="P2.01" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'P2.01') echo 'selected'; ?>>P2.01   Portfolio</option>
                            <option value="R3.01" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.01') echo 'selected'; ?>>R3.01   Développement WEB</option>
                            <option value="R3.02" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.02') echo 'selected'; ?>>R3.02   Développement Efficace</option>
                            <option value="R3.03" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.03') echo 'selected'; ?>>R3.03   Analyse</option>
                            <option value="R3.04" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.04') echo 'selected'; ?>>R3.04   Qualité de développement 3</option>
                            <option value="R3.05" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.05') echo 'selected'; ?>>R3.05   Programmation Système</option>
                            <option value="R3.06" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.06') echo 'selected'; ?>>R3.06   Architecture des réseaux</option>
                            <option value="R3.07" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.07') echo 'selected'; ?>>R3.07   SQL dans un langage de programmation</option>
                            <option value="R3.08" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.08') echo 'selected'; ?>>R3.08   Probabilités</option>
                            <option value="R3.09" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.09') echo 'selected'; ?>>R3.09   Cryptographie et sécurité</option>
                            <option value="R3.10" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.10') echo 'selected'; ?>>R3.10   Management des systèmes d'information</option>
                            <option value="R3.11" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.11') echo 'selected'; ?>>R3.11   Droits des contrats et du numérique</option>
                            <option value="R3.12" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.12') echo 'selected'; ?>>R3.12   Anglais 3</option>
                            <option value="R3.13" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.13') echo 'selected'; ?>>R3.13   Communication professionnelle</option>
                            <option value="R3.14" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R3.14') echo 'selected'; ?>>R3.14   PPP 3</option>
                            <option value="P3.01" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'P3.01') echo 'selected'; ?>>P3.01   Portfolio</option>
                            <option value="R4.01" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R4.01') echo 'selected'; ?>>R4.01   Architecture logicielle</option>
                            <option value="R4.02" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R4.02') echo 'selected'; ?>>R4.02   Qualité de développement 4</option>
                            <option value="R4.03" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R4.03') echo 'selected'; ?>>R4.03   Qualité et au delà du relationnel</option>
                            <option value="R4.04" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R4.04') echo 'selected'; ?>>R4.04   Méthodes d'optimisation</option>
                            <option value="R4.05" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R4.05') echo 'selected'; ?>>R4.05   Anglais 4</option>
                            <option value="R4.06" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R4.06') echo 'selected'; ?>>R4.06   Communication interne</option>
                            <option value="R4.07" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R4.07') echo 'selected'; ?>>R4.07   PPP 4</option>
                            <option value="R4.08" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R4.08') echo 'selected'; ?>>R4.08   Virtualisation</option>
                            <option value="R4.09" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R4.09') echo 'selected'; ?>>R4.09   Management avancé des Systèmes d'information</option>
                            <option value="R4.10" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R4.10') echo 'selected'; ?>>R4.10   Complément web</option>
                            <option value="R4.11" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R4.11') echo 'selected'; ?>>R4.11   Développement mobile</option>
                            <option value="R4.12" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R4.12') echo 'selected'; ?>>R4.12   Automates</option>
                            <option value="S4.ST" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'S4.ST') echo 'selected'; ?>>S4.ST   Stages</option>
                            <option value="P4.01" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'P4.01') echo 'selected'; ?>>P4.01   Portfolio</option>
                            <option value="R5.01" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.01') echo 'selected'; ?>>R5.01   Initiation au management d’une équipe de projet informatique</option>
                            <option value="R5.02" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.02') echo 'selected'; ?>>R5.02   Projet Personnel et Professionnel</option>
                            <option value="R5.03" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.03') echo 'selected'; ?>>R5.03   Politique de communication</option>
                            <option value="R5.04" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.04') echo 'selected'; ?>>R5.04   Qualité algorithmique</option>
                            <option value="R5.05" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.05') echo 'selected'; ?>>R5.05   Programmation avancée</option>
                            <option value="R5.06" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.06') echo 'selected'; ?>>R5.06   Programmation multimédia</option>
                            <option value="R5.07" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.07') echo 'selected'; ?>>R5.07   Automatisation de la chaîne de production</option>
                            <option value="R5.08" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.08') echo 'selected'; ?>>R5.08   Qualité de développement</option>
                            <option value="R5.09" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.09') echo 'selected'; ?>>R5.09   Virtualisation avancée</option>
                            <option value="R5.10" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.10') echo 'selected'; ?>>R5.10   Nouveaux paradigmes de base de données</option>
                            <option value="R5.11" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.11') echo 'selected'; ?>>R5.11   Méthodes d’optimisation pour l’aide à la décision</option>
                            <option value="R5.12" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.12') echo 'selected'; ?>>R5.12   Modélisations mathématiques</option>
                            <option value="R5.13" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.13') echo 'selected'; ?>>R5.13   Économie durable et numérique</option>
                            <option value="R5.14" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R5.14') echo 'selected'; ?>>R5.14   Anglais</option>
                            <option value="P5.01" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'P5.01') echo 'selected'; ?>>P5.01   Portfolio</option>
                            <option value="R6.01" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R6.01') echo 'selected'; ?>>R6.01   Initiation à l’entrepreneuriat</option>
                            <option value="R6.02" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R6.02') echo 'selected'; ?>>R6.02   Droit du numérique et de la propriété intellectuelle</option>
                            <option value="R6.03" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R6.03') echo 'selected'; ?>>R6.03   Communication : organisation et diffusion de l’information</option>
                            <option value="R6.04" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R6.04') echo 'selected'; ?>>R6.04   Projet Personnel et Professionnel</option>
                            <option value="R6.05" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R6.05') echo 'selected'; ?>>R6.05   Développement avancé</option>
                            <option value="R6.06" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R6.06') echo 'selected'; ?>>R6.06   Maintenance applicative</option>
                            <option value="R6.ST" <?php if(isset($rattrapage) && $rattrapage['ressource'] == 'R6.ST') echo 'selected'; ?>>R6.01   Stage</option>
                        </select>
                    </div>

                    <br/>
        
                    <div class="titre" style="display:flex">
                        <label for="type_DS">Type de DS</label>
                        <select name="type_DS" id="type_DS" required>
                            <option value="Devoir sur table" <?php if(isset($rattrapage) && $rattrapage['type_DS'] == 'Devoir sur table') echo 'selected'; ?>>Devoir sur table</option>
                            <option value="Devoir machine" <?php if(isset($rattrapage) && $rattrapage['type_DS'] == 'Devoir machine') echo 'selected'; ?>>Devoir machine</option>
                        </select>
                    </div>

                    <br/>

                    <div class="titre" style="display:flex">
                        <label for="date_DS">Date</label>
                        <input type="date" name="date_DS" id="date_DS" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['date_DS'].'"'; ?> required>
                    </div>

                    <br/>

                    <div class="titre" style="display:flex">
                        <label for="duree">Durée</label>
                        <input type="number" name="duree" id="duree" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['duree'].'"'; ?> min="1" required>
                    </div>

                    <br/>

                    <div class="titre" style="display:flex">
                        <label for="enseignant">Enseignant</label>
                        <select name="enseignant" id="enseignant" required>
                            <?php foreach($enseignants as $enseignant): ?>
                                <?php if(isset($rattrapage) && $rattrapage['enseignant'] == $enseignant['id_Ens']): ?>
                                    <option value="<?= $enseignant['id_Ens'] ?>" selected><?= $enseignant['nom'].' '.$enseignant['prenom'] ?></option>
                                <?php else: ?>
                                    <option value="<?= $enseignant['id_Ens'] ?>"><?= $enseignant['nom'].' '.$enseignant['prenom'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <br/>
                    
                    <!-- Affiche une table qui liste touts les etudiants avec à côté 2 boutton radio (justifié ou non) -->
                    <h3 class="violet" style="text-align:center">Liste des étudiants</h3>
                    <table class="eleves" style="width:80%; margin-left:10%; text-align:center">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Justifié</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($etudiants as $etudiant): ?>
                                <tr>
                                    <td><?= $etudiant['nom'] ?></td>
                                    <td><?= $etudiant['prenom'] ?></td>
                                    <td>
                                        <input style="width:100%" type="checkbox" name="etudiants[]" value="<?= $etudiant['id_Edt'] ?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    <button class="connexion" type="submit">Ajouter</button>
                </form>
            </div>
        
            <div class="connexion">
                <button onclick="window.location.href='/';">Retour à la liste</button>
            </div>
        </div>
    </body>
</html>