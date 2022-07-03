<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Style.css">
    <title>Panier</title>
</head>

<body>
    <div id="wrap">
        <?php include("includes/header.php");?>
        <main>
            <?php if(!empty($_SESSION['panier'])):?>
            <form action="index.php?panier=valider" method="post">
                <?php if(empty($_SESSION['id_personne'])) :?>
                    <h2>Attention ! Vous n'etes pas connecté!</h2>
                <?php endif;?>
                <h2>Votre panier :</h2>
                <table>
                    <tr>
                        <th>Designation</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th></th>
                    </tr>
                    <?php $total=0;
                    foreach($_SESSION['panier'] as $key => $val):
                        $infos = $pan->panier($val);
                    ?>
                    <tr>
                        <td><?=$infos['nom']?></td>
                        <td><?=$val['qte_sport']?></td>
                        <td><?=$infos['prix']*$val['qte_sport']?>€</td>
                        <td><a href="index.php?panier=suppr&suppr=<?=$infos['id_sport']?>"><img alt="suppr" src="img/croix.png"></a></td>
                    </tr>
                    <?php $total += $infos['prix']*$val['qte_sport'];
                    endforeach;
                    ?>
                </table>
                <p id="total">total : <?=$total?>€</p>

                <input type="hidden" name="total" value="<?=$total?>">
                <input id="commander" type="submit" name="commande" value="Commander">
            </form>

            <?php elseif(!empty($_SESSION['id_personne']) && isset($_POST['commande'])):?>
            <h2>Commande passé avec succes !</h2>
                <?php header('Refresh:3;index.php?'); ?>
            <?php else:?>
            <h2>Panier vide</h2>
            <?php endif;?>
        </main>
        <?php include("includes/footer.php");?>
    </div>
</body>

</html>
