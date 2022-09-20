<?php
include ("connexion.php");
$connexion = connexion();
session_start();

$cookieCat=$_COOKIE['CategorieCookie'];
if(isset($cookieCat) && $cookieCat != "all"){
    $requete="SELECT * FROM sport WHERE id_categorie=$cookieCat ORDER BY RAND() LIMIT 3";
    $resultat=$connexion->query($requete);
    $sports3=$resultat->fetchAll(PDO::FETCH_ASSOC);
} else {
    $requete = "SELECT * FROM sport ORDER BY RAND() LIMIT 3";
    $resultat=$connexion->query($requete);
    $sports3=$resultat->fetchAll(PDO::FETCH_ASSOC);
}
$i=0;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sport Nautique</title>
    <link rel="stylesheet" href="css/Style.css">
</head>

<body>
    <div id="wrap">
    
        <?php include("header.php");?>
        <main>
            <section id="titre">
                <img alt="nuage1" src="img/nuage1.png" />
                <h1>Les activités nautiques a La Rochelle</h1>
                <img alt="nuage2" src="img/nuage1.png" />
            </section>

            <div class="slider">
                <img alt="fleche_gauche" src="img/fleche_gauche.png" id="fleche_gauche">
                <section>
                    <?php foreach($sports3 as $sport => $infos): ?>
                                    <?php if ($i<1){
                                        $class = "slide showing";
                                    } else {
                                        $class = "slide";
                                    }?>
                    <article class="<?=$class?>">
                        <?php $i++;?>
                        <p class="nom"><?=$infos['nom']?></p>
                        <div class="orga">
                            <div class="orga2">
                                <p class="des"><?=$infos['description']?></p>
                                <a href="vue_sport.php?sport=<?=$infos['id_sport']?>" class="reservation">Réserver</a>
                            </div>
                            <figure>
                                <img src="<?=$infos['img']?>" alt="<?=$infos['img']?>" class="photo">
                                <figcaption class="prix"><strong><?=$infos['prix']?> € / personne</strong></figcaption>
                            </figure>
                        </div>
                    </article>

                    <?php endforeach;?>
                </section>
                <img alt="fleche_droite" src="img/fleche_droite.png" id="fleche_droite">
            </div>
        </main>
       <?php include("footer.php");?>
        <script src="js/slider.js"></script>
    </div>
</body>

</html>
