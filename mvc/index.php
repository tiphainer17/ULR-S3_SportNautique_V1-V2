<?php
class routeur {
	function __construct(){
		session_start();
	}

	public function pages (){
        if(isset($_GET['categories'])){
            require 'controller/controllerCategories.php';
            $cat = new controllerCategories();

            if ( $_GET['categories'] == 'categorie1' ) {
                $rep = $cat->categorie1();

            }else if ( $_GET['categories'] == 'categorie2' ) {
                $rep = $cat->categorie2();

            }else if ( $_GET['categories'] == 'categorie3' ){
                $rep = $cat->categorie3();

            }else if ( $_GET['categories'] == 'categorie4'){
                $rep = $cat->categorie4();

            }else if ( $_GET['categories'] == 'categorieAll' ){
                $rep = $cat->categorieAll();
            }
        } else if(isset($_GET['sport'])){
            require 'controller/controllerSports.php';
            $sportC = new controllerSports();

            $unSport = $sportC->unSport();
            $numSport = $sportC->numSport();


        } else if(isset($_GET['personnes'])) {
            require 'controller/controllerPersonne.php';
            $pers = new controllerPersonne();
            if ($_GET['personnes'] == 'creer_compte') {
                $creer = $pers->creer_compte();

            } else if ($_GET['personnes'] == 'login') {
                $login = $pers->login();

            } else if ($_GET['personnes'] == 'logout') {
                $logout = $pers->logout();

            } else if ($_GET['personnes'] == 'mon_compte') {
                $login = $pers->mon_compte();
            }

        } else if(isset($_GET['panier'])){
            require 'controller/controllerPanier.php';
            $pan = new controllerPanier();
            if ($_GET['panier'] == 'monPanier') {
                $gen = $pan->panier();

            } else if ($_GET['panier'] == 'ajout') {
                $add = $pan->panierAddLigne();

            } else if ($_GET['panier'] == 'suppr') {
                $supp = $pan-> panierSuppLigne();

            } else if ($_GET['panier'] == 'valider') {
                $valide = $pan->panierValide();
            }

        } else if(isset($_GET['administrer'])){
            require 'controller/controllerAdmin.php';
            $ad = new controllerAdmin();
            if ($_GET['administrer'] == 'ajouter') {
                $ajouter=$ad->ajouter();

            } else if ($_GET['administrer'] == 'modifier'){
                $modifier=$ad->modifier();

            } else if ($_GET['administrer'] == 'supprimer'){
                $supprimer=$ad->supprimer();
            }

        } else {
            require 'controller/controllerSports.php';
            $post = new controllerSports();
            $resultat = $post->accueil();
        }
	}

}
$appel = new routeur();
$root = $appel->pages();
