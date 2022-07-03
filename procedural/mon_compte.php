<?php
session_start();

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Style.css">
    <title>Mon compte</title>
</head>

<body>
<div id="wrap">
    <?php include("header.php");?>
    <main>
    <h1 class="h1Compte">Mes informations : </h1>
    <div id="info">
        <p><?=$_SESSION['civilite']?>. <?=$_SESSION['nom']?> <?=$_SESSION['prenom']?></p>
        <p><?=$_SESSION['mail']?></p>
        <p><?=$_SESSION['adresse']?> <?=$_SESSION['code_postal']?> <?=$_SESSION['ville']?></p>
        <p><?=$_SESSION['pays']?></p>
        <p>0<?=$_SESSION['telephone']?></p>
    </div>
    <a href="logout.php" id="deco">Déconnexion</a>
    </main>

    <?php include("footer.php");?>
</div>
</body>

</html>
