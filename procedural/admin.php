<?php
include ('connexion.php');
$connexion=connexion();
session_start();

//SUPPRIMER
if ($_SESSION['admin'] == 1) {
if (!empty($_GET['sportsuppr'])){
    $sql="DELETE FROM sport WHERE id_sport=:id_sport";
    $resultat=$connexion->prepare($sql);
    $resultat->bindParam(':id_sport', $_GET['sportsuppr']);
    $exe=$resultat->execute();

    header('Location:categorie.php?cat=all');
}

//MODIF ET AJOUT
$requete="SELECT * FROM categorie";
$reponse=$connexion->query($requete);
$categorie=$reponse->fetchAll(PDO::FETCH_ASSOC);

//AJOUT

    if (isset($_POST["add"])) {
        if (!empty($_POST["nom"]) && !empty($_POST["description"]) &&
            !empty($_POST["categorie"]) && !empty($_POST["prix"]) && !empty($_POST["lieu"]) &&
            !empty($_FILES["img"])) {

            $nom = htmlspecialchars($_POST["nom"]);
            $description = htmlspecialchars($_POST["description"]);
            $categorie = $_POST["categorie"];
            $prix = $_POST["prix"];
            $lieu = htmlspecialchars($_POST["lieu"]);
            move_uploaded_file($_FILES["img"]["tmp_name"], "img/act/" . $_FILES["img"]["name"]);
            $image = "img/act/" . $_FILES["img"]['name'];

            $sql="INSERT INTO sport VALUES(null,:id_categorie,:nom,:description,:lieu,:prix,:img)";
            $res=$connexion->prepare($sql);
            $res->bindParam(':id_categorie', $categorie);
            $res->bindParam(':nom', $nom);
            $res->bindParam(':description', $description);
            $res->bindParam(':lieu', $lieu);
            $res->bindParam(':prix', $prix);
            $res->bindParam(':img', $image);

            $exe=$res->execute();


            header('Location:categorie.php?cat=all');
        }
    }


//MODIF
if(isset($_GET['sportmodif'])){
    $req="SELECT * FROM sport WHERE id_sport=".$_GET['sportmodif'];
    $rep=$connexion->query($req);
    $sportAModif=$rep->fetch(PDO::FETCH_ASSOC);
}

    if (isset($_POST["update"])) {
        if (!empty($_POST["id_sport"]) && !empty($_POST["nom"]) && !empty($_POST["description"]) &&
            !empty($_POST["categorie"]) && !empty($_POST["prix"]) && !empty($_POST["lieu"])) {

            $nom = htmlspecialchars($_POST["nom"]);
            $description = htmlspecialchars($_POST["description"]);
            $categorie = $_POST["categorie"];
            $prix = $_POST["prix"];
            $lieu = htmlspecialchars($_POST["lieu"]);
            $numModif = $_POST['id_sport'];

           // if (empty($_FILES['img'])) {
           //     $sql = "UPDATE sport SET id_categorie=:id_categorie,nom=:nom,description=:description,lieu=:lieu,prix=:prix WHERE id_sport=:numModif";
           // } else {
                move_uploaded_file($_FILES["img"]["tmp_name"], "img/act/" . $_FILES["img"]["name"]);
                $image = "img/act/" . $_FILES["img"]['name'];
                $sql = "UPDATE sport SET id_categorie=:id_categorie,nom=:nom,description=:description,lieu=:lieu,prix=:prix,img=:img WHERE id_sport=:numModif";
            //}
            $res=$connexion->prepare($sql);
            $res->bindParam(':id_categorie', $categorie);
            $res->bindParam(':nom', $nom);
            $res->bindParam(':description', $description);
            $res->bindParam(':lieu', $lieu);
            $res->bindParam(':prix', $prix);
            //if (!empty($_FILES['img'])) {
                $res->bindParam(':img', $image);
            //}
            $res->bindParam(':numModif', $numModif);
            $exe=$res->execute();

            header('Location:categorie.php?cat=all');
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="css/Style.css" rel="stylesheet" type="text/css" />
    <title>Admin</title>

</head>

<body>
    <div id="wrap">
        <?php include("header.php");?>
        <main>
            <?php if($_SESSION['admin'] == 1):?>
            <h4 id="titre_admin">Administration du site</h4>
            <?php if (!empty($_GET['sportmodif'])):?>
            <h5>Modification d'un article</h5>
            <form action="admin.php" enctype="multipart/form-data" method="post">
                <fieldset>
                    <input type="hidden" id="id_sport" name="id_sport" value="<?=$sportAModif['id_sport']?>" required />

                    <label>Nom : </label>
                    <input class="formulaire" type="text" id="nom" name="nom" value="<?=$sportAModif['nom']?>" required />

                    <label>Description : </label>
                    <textarea id="description" name="description" required><?=$sportAModif['description']?></textarea>


                    <label>Catégorie </label>
                    <select class="formulaire" name="categorie">
                        <?php foreach ($categorie as $id => $cat):?>
                        <option value="<?=$cat['id_categorie']?>">
                            <?=$cat['nom']?>
                        </option>
                        <?php endforeach;?>
                    </select>
                    <label>Prix : </label>
                    <input class="formulaire" type="number" id="prix" name="prix" value="<?=$sportAModif['prix']?>" required />


                    <label>Lieu : </label>
                    <input class="formulaire" type="text" id="lieu" name="lieu" value="<?=$sportAModif['lieu']?>" required />


                    <label>Image : </label>
                    <input type="file" id="img" name="img" accept="image/jpeg" required />

                    <p id="warning">/!\ PENSEZ A REMETTRE LA BONNE CATEGORIE ET IMAGE</p>
                    <input type="submit" name="update" id="update" value="Modifier" />
                </fieldset>
            </form>


            <?php else : ?>
            <h5>Ajout d'article</h5>
            <form action="admin.php" enctype="multipart/form-data" method="post">
                <fieldset>

                    <label>Nom : </label>
                    <input class="formulaire" type="text" id="nom" name="nom" required />

                    <label>Description : </label>
                    <textarea id="description" name="description" required></textarea>


                    <label>Catégorie </label>
                    <select class="formulaire" name="categorie">
                        <?php foreach ($categorie as $id => $cat):?>
                        <option value="<?=$cat['id_categorie']?>">
                            <?=$cat['nom']?>
                        </option>
                        <?php endforeach;?>
                    </select>

                    <label>Prix : </label>
                    <input class="formulaire" type="number" id="prix" name="prix" required />

                    <label>Lieu : </label>
                    <input class="formulaire" type="text" id="lieu" name="lieu" required />

                    <label>Image : </label>
                    <input type="file" id="img" name="img" accept="image/jpeg" required />
                    <input type="submit" name="add" id="add" value="Ajouter" />
                </fieldset>
            </form>
            <?php endif;?>
            <?php else:?>
            <p id="stop"> Vous n'etes pas autorisé a etre ici ! </p>
            <p id="stop">Vous serez redirigé dans 3 secondes.</p>
            <?php header('Refresh:3;index.php'); ?>
            <?php endif;?>
        </main>
        <?php include("footer.php");?>
    </div>
</body>

</html>
