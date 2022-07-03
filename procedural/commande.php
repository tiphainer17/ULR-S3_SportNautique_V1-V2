<?php
include ("connexion.php");
$connexion = connexion();
session_start();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Style.css">
    <title>Bravo</title>
</head>
<body>
<?php include("header.php");?>
<?php if(!empty($_SESSION['id_personne']) && isset($_POST['commande'])):?>
<p> Commande passée avec succès!</p>
<?php header('Refresh:3;index.php'); ?>
<?php elseif(isset($_POST['commande'])) :?>
<p>Vous n'etes pas connecté!</p>
<?php header('Refresh:3;login.php'); ?>
<?php else:?>
<?php header('Location:index.php'); ?>
<?php endif; ?>
<?php include("footer.php");?>
</body>
</html>
