<?php
include 'connexion.php';
class modelePanier extends Connexion{

    public function panier($val){
        $bdd = $this->connexion();
        $sql="SELECT * FROM sport WHERE id_sport=".$val['id_sport'];
        $infos=$bdd->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $infos;
    }

    public function panierAddLigne($id_sport,$qte_sport){
        $bdd = $this->connexion();
        $reqInsert="INSERT INTO ligne_commande VALUES (null,$id_sport,$qte_sport)";
        $insert=$bdd->exec($reqInsert);
        return $insert;

    }
    public function panierSuppLigne($aSuppr){
        $bdd = $this->connexion();
        $sql="DELETE FROM ligne_commande WHERE id_commande=:aSuppr";
        $resultat=$bdd->prepare($sql);
        $resultat->bindParam(':aSuppr', $aSuppr);
        $exe=$resultat->execute();
        return $exe;
    }

    public function panierValide($id_personne,$date,$total){
        $bdd = $this->connexion();
        $sql = "INSERT INTO commande VALUES(null,$id_personne,'$date',$total)";
        $valide = $bdd->exec($sql);
        return $valide;
    }

}

?>