<?php 
include 'connexion.php';
class modeleCategories extends Connexion{//on hérite du modèle qui se connecte la bdd
    
    
        public function categorie1(){
            $bdd = $this->connexion();//appel la fonction de connexion a la bdd
            $cookieCat=setcookie("CategorieCookie",1);
            $requete = "SELECT * FROM sport WHERE id_categorie=1";
            $rep = $bdd->prepare($requete);
            $rep->execute();
            return $rep;
        }

        public function categorie2(){
            $bdd = $this->connexion();//appel la fonction de connexion a la bdd
            $cookieCat=setcookie("CategorieCookie",2);
            $requete = "SELECT * FROM sport WHERE id_categorie=2";
            $rep = $bdd->prepare($requete);
            $rep->execute();
            return $rep;
        }
        public function categorie3(){
            $bdd = $this->connexion();//appel la fonction de connexion a la bdd
            $cookieCat=setcookie("CategorieCookie",3);
            $requete = "SELECT * FROM sport WHERE id_categorie=3";
            $rep = $bdd->prepare($requete);
            $rep->execute();
            return $rep;
        }
        public function categorie4(){
            $bdd = $this->connexion();//appel la fonction de connexion a la bdd
            $cookieCat=setcookie("CategorieCookie",4);
            $requete = "SELECT * FROM sport WHERE id_categorie=4";
            $rep = $bdd->prepare($requete);
            $rep->execute();
            return $rep;
        }
        public function categorieAll(){
            $bdd = $this->connexion();//appel la fonction de connexion a la bdd
            $cookieCat=setcookie("CategorieCookie","all");
            $requete = "SELECT * FROM sport";
            $rep = $bdd->prepare($requete);
            $rep->execute();
            return $rep;
        }

        public function nomCategorie($cat){
            $bdd = $this->connexion();
            $req ="SELECT nom FROM categorie WHERE id_categorie=$cat";
            $rep=$bdd->query($req);
            $res=$rep->fetch(PDO::FETCH_ASSOC);
            return $res;
        }

}
