<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="css/Style.css" rel="stylesheet" type="text/css" />
    <title>Admin</title>

</head>

<body>
    <div id="wrap">
        <?php include("includes/header.php");?>
        <main>
            <?php if($_SESSION['admin'] == 1):?>
            <h4 id="titre_admin">Administration du site</h4>
            <?php if (!empty($_GET['sportModif'])):?>
            <h5>Modification d'un article</h5>
            <form action="" enctype="multipart/form-data" method="post">
                <fieldset>
                    <input type="hidden" id="id_sport" name="id_sport" value="<?=$aModif['id_sport']?>" required />

                    <label>Nom : </label>
                    <input class="formulaire" type="text" id="nom" name="nom" value="<?=$aModif['nom']?>" required />

                    <label>Description : </label>
                    <textarea id="description" name="description" required><?=$aModif['description']?></textarea>


                    <label>Catégorie </label>
                    <select class="formulaire" name="categorie">
                        <?php foreach ($categorie as $id => $cat):?>
                        <option value="<?=$cat['id_categorie']?>">
                            <?=$cat['nom']?>
                        </option>
                        <?php endforeach;?>
                    </select>
                    <label>Prix : </label>
                    <input class="formulaire" type="number" id="prix" name="prix" value="<?=$aModif['prix']?>" required />


                    <label>Lieu : </label>
                    <input class="formulaire" type="text" id="lieu" name="lieu" value="<?=$aModif['lieu']?>" required />


                    <label>Image : </label>
                    <input type="file" id="img" name="img" accept="image/jpeg" required />

                    <p id="warning">/!\ PENSEZ A REMETTRE LA BONNE CATEGORIE ET IMAGE</p>
                    <input type="submit" name="update" id="update" value="Modifier" />
                </fieldset>
            </form>


            <?php elseif ($_GET['administrer'] == 'ajouter'): ?>
            <h5>Ajout d'article</h5>
            <form action="" enctype="multipart/form-data" method="post">
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
                <?php else: ?>
                    <?php header('Location:index.php'); ?>
                <?php endif;?>
            <?php else:?>
            <p id="stop"> Vous n'etes pas autorisé a etre ici ! </p>
            <p id="stop">Vous serez redirigé dans 3 secondes.</p>
            <?php header('Refresh:3;index.php'); ?>
            <?php endif;?>
        </main>
        <?php include("includes/footer.php");?>
    </div>
</body>

</html>
