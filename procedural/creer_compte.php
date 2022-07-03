<?php
include ("connexion.php");
$connexion=connexion();
session_start();

if(isset($_POST['send'])) {
    if (isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['civilite']) &&
        isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) &&
        isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['pays']) && isset($_POST['telephone'])) {

        $mail=htmlspecialchars($_POST['mail']);
        $mdp=hash('sha256',$_POST['mdp']);
        $civilite=htmlspecialchars($_POST['civilite']);
        $nom=htmlspecialchars($_POST['nom']);
        $prenom=htmlspecialchars($_POST['prenom']);
        $adresse=htmlspecialchars($_POST['adresse']);
        $codePostal=$_POST['codePostal'];
        $ville=htmlspecialchars($_POST['ville']);
        $pays=htmlspecialchars($_POST['pays']);
        $telephone=$_POST['telephone'];

        $verifExist="SELECT * FROM personne WHERE email='$mail'";
        $clientExist=$connexion->query($verifExist);
        if($clientExist->rowCount()==0){
            $reqInsert="INSERT INTO personne VALUES (null,'$mail','$mdp','$civilite','$nom','$prenom','$adresse',$codePostal,'$ville','$pays',$telephone,0)";
            $insert=$connexion->exec($reqInsert);
            //$message="Bravo votre compte à été créer";
            //mail('$mail','Bravo',$message);
            header("Location:login.php");
        } else {
            $retour="Votre compte existe déjà";
        }
    }
}

?>
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

        <?php require ("header.php"); ?>
        <main>
            <section>
                <h3>Créer compte</h3>
                <form action="creer_compte.php" method="post">
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
            <p><?=$retour?></p>
        </main>
        <?php require("footer.php") ?>
    </div>
</body>

</html>
