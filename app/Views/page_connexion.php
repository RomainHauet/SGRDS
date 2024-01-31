<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
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
                                <h3 class="violet">Connexion du chef de département</h3>
                            </div>
                        </td>
                        <td class="di"><img src="/assets/images/diMini2009.gif" alt="Département Informatique"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br/>
    <br/>

    <div class="formulaire">
        <form action="/connexion" method="post">
            <div id="cent">
                <div class="titre" style="display:flex">
                    <label for="username">Identifiant:</label>
                    <input type="text" name="identifiant" required>
                </div>

                <?php if(session()->getFlashdata('utilisateurError')): ?>
                    <div class="alert alert-danger"><?=session()->getFlashdata('utilisateurError') ?></div>
                <?php endif; ?>

                <br/>

                <div class="titre" style="display:flex">
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="motDePasse" required>
                </div>
                <?php if(session()->getFlashdata('mdpError')): ?>
                    <div class="alert alert-danger"><?=session()->getFlashdata('mdpError') ?></div>
                <?php endif; ?>

                <br/>

                <button class="connexion" type="submit">Connexion</button>

                <br/>

                <div class="titre">
                    <a href="/oubli"><h4>Mot de passe oublié ?</h4></a>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
