<?php
include 'connexion.php';
class modelePersonne extends Connexion{

    public function creer_compte($mail,$mdp,$civilite,$nom,$prenom,$adresse,$codePostal,$ville,$pays,$telephone){
        $bdd = $this->connexion();
        $req = $bdd->prepare("INSERT INTO personne VALUES (null,:mail,:mdp,:civilite,:nom,:prenom,:adresse,:codePostal,:ville,:pays,:telephone,0)");
        $req->execute(array(
            'mail'=>$mail,
            'mdp'=>$mdp,
            'civilite'=>$civilite,
            'nom'=>$nom,
            'prenom'=>$prenom,
            'adresse'=>$adresse,
            'codePostal'=>$codePostal,
            'ville'=>$ville,
            'pays'=>$pays,
            'telephone'=>$telephone
        ));

    }

    public function login($mail){
        $bdd = $this->connexion();
        $reponse = $bdd->prepare('SELECT * FROM personne WHERE email=:mail');
        $reponse->execute(array(
            'mail'=>$mail
        ));
        return $reponse;

    }


}

?>