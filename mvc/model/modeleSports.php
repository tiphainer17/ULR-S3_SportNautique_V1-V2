<?php
include 'connexion.php';
class modeleSports extends Connexion{//on hérite du modèle qui se connecte la bdd
    
    
        public function pageAccueil(){
            $bdd = $this->connexion();//appel la fonction de connexion a la bdd
            $cookieCat=$_COOKIE['CategorieCookie'];
            if(isset($cookieCat) && $cookieCat != "all"){
                    $requete="SELECT * FROM sport WHERE id_categorie=$cookieCat ORDER BY RAND() LIMIT 3";
                    $resultat=$bdd->prepare($requete);
                    $resultat->execute();
                return $resultat;
            } else {
                $requete = "SELECT * FROM sport ORDER BY RAND() LIMIT 3";
                $resultat=$bdd->prepare($requete);
                $resultat->execute();
                return $resultat;
            }
            
        }

        public function numSport(){
            $numSport=$_GET['sport'];
            return $numSport;
        }

        public function unSport(){
            $size="SELECT count(*) FROM sport";
            $numSport=$this->numSport();
            $bdd = $this->connexion();

            if($numSport > $size){
                header('Location:index.php');
            } else if (!empty($_GET['sport'])){
                $sql="SELECT * FROM sport WHERE id_sport=$numSport";
                $unSport=$bdd->prepare($sql);
                $unSport->execute();
                return $unSport;

            } else {
                    header('Location:index.php');
            } // + si sport=    pareil
        }



}
