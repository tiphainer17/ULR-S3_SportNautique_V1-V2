<?php
class controllerPanier{
    private function objet(){
        require 'model/modelePanier.php';
        $pan = new modelePanier();
        return $pan;
    }

    public function panier(){
        $pan = $this->objet();
        require 'vue/panier.php';
    }

    public function panierAddLigne(){
        $pan = $this->objet();
        if(isset($_POST['send'])) {
            if (isset($_POST['qte_sport']) && isset($_POST['id_sport'])) {

                $qte_sport = $_POST['qte_sport'];
                $id_sport = $_POST['id_sport'];

                if (!isset($_SESSION['panier'])) {
                    $_SESSION['panier'] = [];
                }

                $sport = array(
                    "id_sport" => $id_sport,
                    "qte_sport" => $qte_sport
                );

                $trouve = false;
                foreach ($_SESSION['panier'] as $key => $value) {
                    if ($value['id_sport'] == $sport['id_sport']) {
                        $_SESSION['panier'][$key]['qte_sport'] += $sport['qte_sport'];
                        $trouve = true;
                    }
                }
                if ($trouve == false) {
                    array_push($_SESSION['panier'], $sport);
                }

                $reponse = $pan->panierAddLigne($id_sport, $qte_sport);
                header('location:index.php?panier=monPanier');

            }
        }
    }

    public function panierSuppLigne(){
        $pan = $this->objet();
        if(isset($_GET['suppr'])){
            $suppr=$_GET['suppr'];
            foreach($_SESSION['panier'] as $id => $value){
                if($value['id_sport'] == $suppr){
                    $aSuppr=$id;
                }

                $reponse = $pan->panierSuppLigne($aSuppr);
            }
            unset($_SESSION['panier'][$aSuppr]);
            header('location:index.php?panier=monPanier');

        }
        require 'vue/panier.php';
    }

    public function panierValide(){
        $pan = $this->objet();
        date_default_timezone_set('UTC');
        if(!empty($_SESSION['id_personne']) && isset($_POST['commande'])){
            if (isset($_POST['total'])) {
                $total = $_POST['total'];
                $id_personne = $_SESSION['id_personne'];
                $date=date("Y-m-d H:i:s");
                $reponse = $pan->panierValide($id_personne,$date,$total);
                unset($_SESSION['panier']);
            }
        }
        require 'vue/panier.php';
    }


}
?>