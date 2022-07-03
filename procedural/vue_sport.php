<?php
include ("connexion.php");
$connexion = connexion();

session_start();

$size="SELECT count(*) FROM sport";
$numSport=$_GET['sport'];

if($numSport > $size){
    header('Location:index.php');
} else if (!empty($_GET['sport'])){
    $sql="SELECT * FROM sport WHERE id_sport=$numSport";
    $resultat=$connexion->query($sql);
    $sport=$resultat->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location:index.php');
} // + si sport=    pareil

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Style.css">
    <title>Réserver</title>
</head>

<body>
    <?php include("header.php");?>

    <article>
        <section id="vue_sport">
            <article>
                <p class="nom"><?=$sport['nom']?></p>
                <div class="orga">
                    <div class="orga2">
                        <p class="des2"><?=$sport['description']?></p>
                        <p id="lieux">Lieu : <?=$sport['lieu']?></p>
                       
                            <form id="nb" action="panier.php" method="post">

                                <input type="hidden" name="id_sport" value="<?=$numSport?>" />
                                <label id="nb_pers" for="qte_sport"> Nombres de personnes : </label>
                                <select class="formulaire" name="qte_sport">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <input id="reserve" type="submit" name="send"  value="Reserver" />
                            </form>
                        
                    </div>
                    <figure>
                        <img src="<?=$sport['img']?>" alt="<?=$sport['nom']?>" class="photo">
                        <figcaption class="prix"><strong><?=$sport['prix']?> € / personne</strong></figcaption>
                    </figure>
                </div>
            </article>
        </section>
    </article>


    <?php include("footer.php");?>
</body>

</html>
