<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creer compte</title>
    <link rel="stylesheet" href="css/Style.css">
</head>

<body>
    <div id="wrap">

        <?php require ("includes/header.php"); ?>
        <main>
            <section>
                <h1 class="h1Compte">Créer compte</h1>
                <form action="" method="post">
                    <fieldset>

                        <label>E-mail :</label>
                        <input class="formulaire" type="mail" name="mail" required />


                        <label>Mot de passe</label>
                        <input class="formulaire" type="password" name="mdp" required />


                        <label>Civilité :</label>
                        <select class="formulaire" name="civilite">
                            <option value="Mme">Mme.</option>
                            <option value="M">M.</option>
                        </select>


                        <label>Nom :</label>
                        <input class="formulaire" type="text" name="nom" required />


                        <label>Prenom :</label>
                        <input class="formulaire" type="text" name="prenom" required />


                        <label>Adresse :</label>
                        <input class="formulaire" type="text" name="adresse" required />


                        <label>Code postal :</label>
                        <input class="formulaire" type="number" name="codePostal" required />


                        <label>Ville :</label>
                        <input class="formulaire" type="text" name="ville" required />


                        <label>Pays :</label>
                        <input class="formulaire" type="text" name="pays" required />


                        <label>Téléphone :</label>
                        <input class="formulaire" type="number" name="telephone" required />


                        <input type="submit" name="send" value="Envoyer" />

                    </fieldset>
                </form>
            </section>
        </main>
        <?php require("includes/footer.php") ?>
    </div>
</body>

</html>
