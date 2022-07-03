<?php
include 'connexion.php';
class modeleAdmin extends Connexion{

    public function adminCat(){
        $bdd = $this->connexion();
        $requete="SELECT * FROM categorie";
        $reponse=$bdd->query($requete);
        $categorie=$reponse->fetchAll(PDO::FETCH_ASSOC);

        return $categorie;
    }

    public function ajouter($categorie,$nom,$description,$lieu,$prix,$image){
        $bdd = $this->connexion();

                $sql="INSERT INTO sport VALUES(null,:id_categorie,:nom,:description,:lieu,:prix,:img)";
                $res=$bdd->prepare($sql);
                $res->bindParam(':id_categorie', $categorie);
                $res->bindParam(':nom', $nom);
                $res->bindParam(':description', $description);
                $res->bindParam(':lieu', $lieu);
                $res->bindParam(':prix', $prix);
                $res->bindParam(':img', $image);

                $insertSport=$res->execute();

    }

    public function aModif($leSport){
        $bdd = $this->connexion();
        $req="SELECT * FROM sport WHERE id_sport=$leSport";
        $rep=$bdd->query($req);
        $aModif=$rep->fetch(PDO::FETCH_ASSOC);
        return $aModif;
    }

    public function modifier($categorie,$nom,$description,$lieu,$prix,$image,$numModif){
        $bdd = $this->connexion();
        $sql = "UPDATE sport SET id_categorie=:id_categorie,nom=:nom,description=:description,lieu=:lieu,prix=:prix,img=:img WHERE id_sport=:numModif";
        $res=$bdd->prepare($sql);
        $res->bindParam(':id_categorie', $categorie);
        $res->bindParam(':nom', $nom);
        $res->bindParam(':description', $description);
        $res->bindParam(':lieu', $lieu);
        $res->bindParam(':prix', $prix);
        $res->bindParam(':img', $image);
        $res->bindParam(':numModif', $numModif);
        $modif=$res->execute();

    }
    public function supprimer($numSuppr){
        $bdd = $this->connexion();
        $sql = "DELETE FROM sport WHERE id_sport=:id_sport";
        $resultat = $bdd->prepare($sql);
        $resultat->bindParam(':id_sport', $numSuppr);
        $suppr = $resultat->execute();
    }





}
