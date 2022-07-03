<?php
class controllerAdmin{
    private function objet(){
        require 'model/modeleAdmin.php';
        $admin = new modeleAdmin();
        return $admin;
    }

    public function ajouter(){
        $admin = $this->objet();
        $categorie = $admin->adminCat();
        if ($_SESSION['admin'] == 1) {
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

                    $insertSport = $admin->ajouter($categorie, $nom, $description, $lieu, $prix, $image);

                    header('Location:index.php?categories=categorieAll');
                }
            }
        }
        require 'vue/admin.php';
    }

    public function modifier(){
        $admin = $this->objet();
        $categorie = $admin->adminCat();

        if(isset($_GET['sportModif'])){
            $leSport=$_GET['sportModif'];
            $aModif=$admin->aModif($leSport);
        }

        if ($_SESSION['admin'] == 1) {
            if (isset($_POST["update"])) {
                if (!empty($_POST["id_sport"]) && !empty($_POST["nom"]) && !empty($_POST["description"]) &&
                    !empty($_POST["categorie"]) && !empty($_POST["prix"]) && !empty($_POST["lieu"])) {

                    $nom = htmlspecialchars($_POST["nom"]);
                    $description = htmlspecialchars($_POST["description"]);
                    $categorie = $_POST["categorie"];
                    $prix = $_POST["prix"];
                    $lieu = htmlspecialchars($_POST["lieu"]);
                    $numModif = $_POST['id_sport'];

                    move_uploaded_file($_FILES["img"]["tmp_name"], "img/act/" . $_FILES["img"]["name"]);
                    $image = "img/act/" . $_FILES["img"]['name'];

                    $modif = $admin->modifier($categorie, $nom, $description, $lieu, $prix, $image, $numModif);

                    header('Location:index.php?categories=categorieAll');
                }
            }
        }
        require 'vue/admin.php';
    }

    public function supprimer(){
        $admin = $this->objet();
        if ($_SESSION['admin'] == 1) {
            if (!empty($_GET['sportSuppr'])) {
                $suppr=$admin->supprimer($_GET['sportSuppr']);

                header('Location:index.php?categories=categorieAll');
            }
        }
    }

}
?>