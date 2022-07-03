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
    <?php include("includes/header.php");?>

    <article>
        <section id="vue_sport">
            <?php foreach($unSport as $sport => $infos): ?>
            <article>
                <p class="nom"><?=$infos['nom']?></p>
                <div class="orga">
                    <div class="orga2">
                        <p class="des2"><?=$infos['description']?></p>
                        <p id="lieux">Lieu : <?=$infos['lieu']?></p>
                       
                            <form id="nb" action="index.php?panier=ajout" method="post">

                                <input type="hidden" name="id_sport" value="<?=$infos['id_sport']?>" />
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
                        <img src="<?=$infos['img']?>" alt="<?=$infos['nom']?>" class="photo">
                        <figcaption class="prix"><strong><?=$infos['prix']?> € / personne</strong></figcaption>
                    </figure>
                </div>
            </article>
            <?php endforeach; ?>
        </section>
    </article>


    <?php include("includes/footer.php");?>
</body>

</html>
