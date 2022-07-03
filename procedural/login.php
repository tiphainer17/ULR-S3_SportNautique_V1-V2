<?php
include ("connexion.php");
$connexion = connexion();
session_start();

    if (isset($_POST['send'])) {
        if (isset($_POST['mail']) && isset($_POST['mdp'])) {
            $mail = htmlspecialchars($_POST['mail']);
            $mdp = hash('sha256', $_POST['mdp']);

            $req = "SELECT mot_de_passe FROM personne WHERE email='$mail'";
            $res = $connexion->query($req);
            $verif = $res->fetch(PDO::FETCH_ASSOC);

            if ($verif['mot_de_passe'] == $mdp) {
                $requete = "SELECT * FROM personne WHERE email='$mail'";
                $reponse = $connexion->query($requete);
                $infos = $reponse->fetchAll(PDO::FETCH_ASSOC);

                foreach ($infos as $nom => $info) {
                    $id=$info['id_personne'];
                    $civilite = $info['civilite'];
                    $nom = $info['nom'];
                    $prenom = $info['prenom'];
                    $id = $info['id_personne'];
                    $adresse = $info['adresse'];
                    $cp = $info['code_postal'];
                    $ville = $info['ville'];
                    $pays = $info['pays'];
                    $tel = $info['telephone'];
                    $admin = $info['admin'];
                }

                $_SESSION['id_personne']=$id;
                $_SESSION['civilite'] = $civilite;
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['id'] = $id;
                $_SESSION['mail'] = $mail;
                $_SESSION['adresse'] = $adresse;
                $_SESSION['code_postal'] = $cp;
                $_SESSION['ville'] = $ville;
                $_SESSION['pays'] = $pays;
                $_SESSION['telephone'] = $tel;
                $_SESSION['admin'] = $admin;
                header('location:mon_compte.php');
            } else {
                $message = 'Mot de passe ou mail incorrect';
            }
        } else {
            $message = "Vous n'avez pas rempli tous les champs";
        }
    }

?>

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
<?php include("header.php");?>
    <main>
        <h1 class="h1Compte">Identification : </h1>
        <form action="login.php" method="post" id="login">
            <fieldset>

                    <label>E-mail</label>
                    <input class="formulaire" type="mail" name="mail" required />

                    <label>Mot de passe</label>
                    <input class="formulaire" type="password" name="mdp" required />

                    <input type="submit" name="send" value="Valider" />
            </fieldset>
        </form>
<a href="creer_compte.php" id="noCompte">Pas encore de compte ? Clic ici</a>
    </main>
<?php include("footer.php");?>
</div>
</body>
</html>
