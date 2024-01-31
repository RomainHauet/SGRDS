<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajout d'un rattrapage</title>
    </head>
    <body>
        <?php if(isset($rattrapage)): ?>
            <h1>Modification d'un rattrapage</h1>
        <?php else: ?>
            <h1>Ajout d'un rattrapage</h1>
        <?php endif; ?>
        
        <form action="<?php echo isset($rattrapage) ? '/modifier/'.$rattrapage['id_R'] : '/ajout'; ?>" method="post">

            <label for="semestre">Semestre</label>
            <select name="semestre" id="semestre" required>
                <?php foreach($semestres as $semestre): ?>
                    <option value="<?= $semestre ?>"><?= $semestre ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="ressource">Ressource</label>
            <select name="ressource" id="ressource" required>
                <option value="R1.01">R1.01   Initiation au développement</option>
                <option value="R1.02">R1.02   Développement interfaces Web</option>
                <option value="R1.03">R1.03   Introduction Architecture</option>
                <option value="R1.04">R1.04   Introduction Système</option>
                <option value="R1.05">R1.05   Introduction Base de données</option>
                <option value="R1.06">R1.06   Mathématiques discrètes</option>
                <option value="R1.07">R1.07   Outils mathématiques fondamentaux</option>
                <option value="R1.08">R1.08   Gestion de projet et des organisations</option>
                <option value="R1.09">R1.09   Économie durable et numérique</option>
                <option value="R1.10">R1.10   Anglais Technique</option>
                <option value="R1.11">R1.11   Bases de la communication</option>
                <option value="R1.12">R1.12   Projet Professionnel et Personnel</option>
                <option value="P1.01">P1.01   Portfolio</option>
                <option value="R2.01">R2.01   Développement orienté objets</option>
                <option value="R2.02">R2.02   Développement d'applications avec IHM</option>
                <option value="R2.03">R2.03   Qualité de développement</option>
                <option value="R2.04">R2.04   Communication et fonctionnement bas niveau</option>
                <option value="R2.05">R2.05   Introduction aux services réseaux</option>
                <option value="R2.06">R2.06   Exploitation d'une base de données</option>
                <option value="R2.07">R2.07   Graphes</option>
                <option value="R2.08">R2.08   Outils numériques pour les statistiques</option>
                <option value="R2.09">R2.09   Méthodes Numériques</option>
                <option value="R2.10">R2.10   Gestion de projet et des organisations</option>
                <option value="R2.11">R2.11   Droit</option>
                <option value="R2.12">R2.12   Anglais d'entreprise</option>
                <option value="R2.13">R2.13   Communication Technique</option>
                <option value="R2.14">R2.14   Projet Professionnel et Personnel</option>
                <option value="P2.01">P2.01   Portfolio</option>
                <option value="R3.01">R3.01   Développement WEB</option>
                <option value="R3.02">R3.02   Développement Efficace</option>
                <option value="R3.03">R3.03   Analyse</option>
                <option value="R3.04">R3.04   Qualité de développement 3</option>
                <option value="R3.05">R3.05   Programmation Système</option>
                <option value="R3.06">R3.06   Architecture des réseaux</option>
                <option value="R3.07">R3.07   SQL dans un langage de programmation</option>
                <option value="R3.08">R3.08   Probabilités</option>
                <option value="R3.09">R3.09   Cryptographie et sécurité</option>
                <option value="R3.10">R3.10   Management des systèmes d'information</option>
                <option value="R3.11">R3.11   Droits des contrats et du numérique</option>
                <option value="R3.12">R3.12   Anglais 3</option>
                <option value="R3.13">R3.13   Communication professionnelle</option>
                <option value="R3.14">R3.14   PPP 3</option>
                <option value="P3.01">P3.01   Portfolio</option>
                <option value="R4.01">R4.01   Architecture logicielle</option>
                <option value="R4.02">R4.02   Qualité de développement 4</option>
                <option value="R4.03">R4.03   Qualité et au delà du relationnel</option>
                <option value="R4.04">R4.04   Méthodes d'optimisation</option>
                <option value="R4.05">R4.05   Anglais 4</option>
                <option value="R4.06">R4.06   Communication interne</option>
                <option value="R4.07">R4.07   PPP 4</option>
                <option value="R4.08">R4.08   Virtualisation</option>
                <option value="R4.09">R4.09   Management avancé des Systèmes d'information</option>
                <option value="R4.10">R4.10   Complément web</option>
                <option value="R4.11">R4.11   Développement mobile</option>
                <option value="R4.12">R4.12   Automates</option>
                <option value="S4.ST">S4.ST   Stages</option>
                <option value="P4.01">P4.01   Portfolio</option>
                <option value="R5.01">R5.01   Initiation au management d’une équipe de projet informatique</option>
                <option value="R5.02">R5.02   Projet Personnel et Professionnel</option>
                <option value="R5.03">R5.03   Politique de communication</option>
                <option value="R5.04">R5.04   Qualité algorithmique</option>
                <option value="R5.05">R5.05   Programmation avancée</option>
                <option value="R5.06">R5.06   Programmation multimédia</option>
                <option value="R5.07">R5.07   Automatisation de la chaîne de production</option>
                <option value="R5.08">R5.08   Qualité de développement</option>
                <option value="R5.09">R5.09   Virtualisation avancée</option>
                <option value="R5.10">R5.10   Nouveaux paradigmes de base de données</option>
                <option value="R5.11">R5.11   Méthodes d’optimisation pour l’aide à la décision</option>
                <option value="R5.12">R5.12   Modélisations mathématiques</option>
                <option value="R5.13">R5.13   Économie durable et numérique</option>
                <option value="R5.14">R5.14   Anglais</option>
                <option value="P5.01">P5.01   Portfolio</option>
                <option value="R6.01">R6.01   Initiation à l’entrepreneuriat</option>
                <option value="R6.02">R6.02   Droit du numérique et de la propriété intellectuelle</option>
                <option value="R6.03">R6.03   Communication : organisation et diffusion de l’information</option>
                <option value="R6.04">R6.04   Projet Personnel et Professionnel</option>
                <option value="R6.05">R6.05   Développement avancé</option>
                <option value="R6.06">R6.06   Maintenance applicative</option>
                <option value="R6.01">R6.01   Stage</option>  
                <option value="P6.01">P6.01   Portfolio</option>



            </select>

            <br>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" required>
            <br>
            <label for="duree">Durée</label>
            <input type="number" name="duree" id="duree" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['duree'].'"'; ?> required>
            <br>
            <label for="enseignant">Enseignant</label>
            <input type="text" name="enseignant" id="enseignant" <?php if(isset($rattrapage)) echo 'value="'.$rattrapage['enseignant'].'"'; ?> required>
            <br>
            <input type="submit" value="Ajouter">
        </form>

        <?php if(isset($validation)): ?>
            <div>
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <a href="/">Retour à la liste des rattrapages</a>
    </body>
</html>