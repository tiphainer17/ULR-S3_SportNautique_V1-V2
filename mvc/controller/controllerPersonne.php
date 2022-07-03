<?php
class controllerPersonne{
    private function objet(){
        require 'model/modelePersonne.php';
        $personne = new modelePersonne();
        return $personne;
    }

    public function creer_compte(){
        $personne = $this->objet();
        if(isset($_POST['send'])) {
            if (isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['civilite']) &&
                isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) &&
                isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['pays']) && isset($_POST['telephone'])) {

                $mail = htmlspecialchars($_POST['mail']);
                $mdp = hash('sha256', $_POST['mdp']);
                $civilite = htmlspecialchars($_POST['civilite']);
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $adresse = htmlspecialchars($_POST['adresse']);
                $codePostal = $_POST['codePostal'];
                $ville = htmlspecialchars($_POST['ville']);
                $pays = htmlspecialchars($_POST['pays']);
                $telephone = $_POST['telephone'];

                $reponse = $personne->login($mail);
                $resultat = $reponse->fetch();
                if($resultat){
                    echo "Cette adresse e-mail est déjà lié a un compte";
                } else {
                    $req=$personne->creer_compte($mail,$mdp,$civilite,$nom,$prenom,$adresse,$codePostal,$ville,$pays,$telephone);
                    header('Location:index.php?personnes=login');
                }
            }
        }
        require 'vue/creer_compte.php';
    }

    public function login(){
        $personne = $this->objet();
        if (isset($_POST['send'])) {
            if (isset($_POST['mail']) && isset($_POST['mdp'])) {
                $mail = htmlspecialchars($_POST['mail']);
                $mdp = hash('sha256', $_POST['mdp']);
            }
            $reponse = $personne->login($mail);
            $resultat=$reponse->fetch();
            $bonPass=$resultat['mot_de_passe'];
            if(!$resultat){
                echo 'Mauvais identifiant !';
            } else {
                if ($mdp == $bonPass) {
                    $_SESSION['id_personne'] = $resultat['id_personne'];
                    $_SESSION['civilite'] = $resultat['civilite'];
                    $_SESSION['nom'] = $resultat['nom'];
                    $_SESSION['prenom'] = $resultat['prenom'];
                    $_SESSION['mail'] = $mail;
                    $_SESSION['adresse'] = $resultat['adresse'];
                    $_SESSION['code_postal'] = $resultat['code_postal'];
                    $_SESSION['ville'] = $resultat['ville'];
                    $_SESSION['pays'] = $resultat['pays'];
                    $_SESSION['telephone'] = $resultat['telephone'];
                    $_SESSION['admin'] = $resultat['admin'];
                    header('location:index.php?personnes=mon_compte');
                } else {
                    echo 'Mauvais mot de passe !';
                }
            }
        }
        require 'vue/login.php';
    }
    public function logout(){
        session_unset();
        session_destroy();
        header('location:index.php');
    }

    public function mon_compte(){
        $personne = $this->objet();
        require 'vue/mon_compte.php';
    }

}
?>