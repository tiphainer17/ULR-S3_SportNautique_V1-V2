<?php

class controllerSports{
    private function objet(){
        require 'model/modeleSports.php';
        $sport = new modeleSports();
        return $sport;
    }
    public function accueil(){
        $sport = $this->objet();
        $resultat=$sport->pageAccueil();
        require 'vue/accueil.php';
    }

    public function numSport(){
        $sport = $this->objet();
        $numSport=$sport->numSport();
        //require 'vue/vue_sport.php';
    }

    public function unSport(){
        $sport = $this->objet();
        $unSport=$sport->unSport();
        require 'vue/vue_sport.php';
    }
}