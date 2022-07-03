<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Style.css">
    <title>Nos activités</title>
</head>

<body>
    <div id="wrap">
        <?php include("includes/header.php");?>
        <main>
            <?php if($_GET['categories'] == 'categorieAll'): ?>
            <h2>Tout les sports nautiques :</h2>
            <?php else:?>
            <h2> Sport de la catégorie : <?=$res['nom']?></h2>
            <?php endif;?>
            <div class="categorie">
                <?php if($_SESSION['admin']== 1 ):?>
                <a href="index.php?administrer=ajouter"><section id="add"><img id="ajouter" src="img/ajouter.png" alt="image ajouter"></section></a>
            <?php endif;?>
                <?php foreach($rep as $sport => $infos): ?>
                <section>
                    <article>
                        <div id="haut">
                            <p class="nom"><?=$infos['nom']?></p>
                            <?php if($_SESSION['admin']== 1 ):?>
                            <div id="modif_suppr">
                                <a href="index.php?administrer=modifier&sportModif=<?=$infos['id_sport']?>"><img class="boutton" src="img/modifier.png" alt="logo modifier" title="modifier"></a>
                                <a href="index.php?administrer=supprimer&sportSuppr=<?=$infos['id_sport']?>"><img class="boutton" src="img/croix.png" alt="logo supprimer" title="supprimer"></a>
                            </div>

                        <?php endif;?>
                        </div>
                        <div class="orga">
                            <div class="orga2">
                                <p class="des"><?=$infos['description']?></p>
                                <a href="index.php?sport=<?=$infos['id_sport']?>" class="reservation">Réserver</a>
                            </div>
                            <figure>
                                <img src="<?=$infos['img']?>" alt="<?=$infos['nom']?>" class="photo">
                                <figcaption class="prix"><strong><?=$infos['prix']?> € / personne</strong></figcaption>
                            </figure>
                        </div>
                    </article>
                </section>
                <?php endforeach;?>
            </div>
        </main>
        <?php include("includes/footer.php");?>
    </div>
</body>

</html>
