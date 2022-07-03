<?php
include ("connexion.php");
$connexion = connexion();
session_start();

if(isset($_POST['send'])){
    if(isset($_POST['qte_sport']) && isset($_POST['id_sport'])){

        $qte_sport = $_POST['qte_sport'];
        $id_sport = $_POST['id_sport'];

        if(!isset($_SESSION['panier'])){
            $_SESSION['panier']=[];
        }

        $sport=array(
            "id_sport"=>$id_sport,
            "qte_sport"=>$qte_sport
        );

        $trouve=false;
        foreach($_SESSION['panier'] as $key => $value){
            if($value['id_sport'] == $sport['id_sport']){
                $_SESSION['panier'][$key]['qte_sport']+=$sport['qte_sport'];
                $trouve=true;
            }
        }
        if($trouve == false){
            array_push($_SESSION['panier'], $sport);
        }

        $reqInsert="INSERT INTO ligne_commande VALUES (null,$id_sport,$qte_sport)";
        $insert=$connexion->exec($reqInsert);
    }
}

if(isset($_GET['suppr'])){
    $suppr=$_GET['suppr'];
    foreach($_SESSION['panier'] as $id => $value){
        if($value['id_sport'] == $suppr){
            $aSuppr=$id;
        }

        //$sql="DELETE FROM ligne_commande WHERE id_commande=:aSuppr";
        //$resultat=$connexion->prepare($sql);
        //$resultat->bindParam(':aSuppr', $aSuppr);
        //$exe=$resultat->execute();
    }
    unset($_SESSION['panier'][$aSuppr]);

}

date_default_timezone_set('UTC');

if(!empty($_SESSION['id_personne']) && isset($_POST['commande'])){
    if (isset($_POST['total'])) {
        $total = $_POST['total'];
        $id_personne = $_SESSION['id_personne'];
        $date=date("Y-m-d H:i:s");
        $sql = "INSERT INTO commande VALUES(null,$id_personne,'$date',$total)";;
        $insert = $connexion->exec($sql);
        unset($_SESSION['panier']);
    }
}


?>

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
        <?php include("header.php");?>
        <main>
            <?php if(!empty($_SESSION['panier'])):?>
            <form action="panier.php" method="post">
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
        $sql="SELECT * FROM sport WHERE id_sport=".$val['id_sport'];
        $infos=$connexion->query($sql)->fetch(PDO::FETCH_ASSOC);
    ?>
                    <tr>
                        <td><?=$infos['nom']?></td>
                        <td><?=$val['qte_sport']?></td>
                        <td><?=$infos['prix']*$val['qte_sport']?>€</td>
                        <td><a href="panier.php?suppr=<?=$infos['id_sport']?>"><img alt="suppr" src="img/croix.png"></a></td>
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
            <?php else:?>
            <h2>Panier vide</h2>
            <?php endif;?>
        </main>
        <?php include("footer.php");?>
    </div>
</body>

</html>
