<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Style.css">
    <title>Connexion</title>
</head>
<body>
<div id="wrap">
<?php include("includes/header.php");?>
    <main>
        <h1 class="h1Compte">Identification : </h1>
        <form action="" method="post" id="login">
            <fieldset>

                    <label>E-mail</label>
                    <input class="formulaire" type="mail" name="mail" required />

                    <label>Mot de passe</label>
                    <input class="formulaire" type="password" name="mdp" required />

                    <input type="submit" name="send" value="Valider" />
            </fieldset>
        </form>
        <a href="index.php?personnes=creer_compte" id="noCompte">Pas encore de compte ? Clic ici</a>
    </main>
<?php include("includes/footer.php");?>
</div>
</body>
</html>
