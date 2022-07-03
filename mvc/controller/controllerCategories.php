<?php

class controllerCategories
{
    private function objet()
    {//Fonction privé qui appel le modele et crée un nouvel objet
        require 'model/modeleCategories.php';
        $categorie = new modeleCategories();
        return $categorie;
    }

    public function categorie1()
    {//On appel la bonne fonction et on require la vue souhaitée
        $categorie = $this->objet();
        $rep = $categorie->categorie1();
        $res = $categorie->nomCategorie(1);
        require 'vue/categories.php';
    }

    public function categorie2()
    {//On appel la bonne fonction et on require la vue souhaitée
        $categorie = $this->objet();
        $rep = $categorie->categorie2();
        $res = $categorie->nomCategorie(2);
        require 'vue/categories.php';
    }

    public function categorie3()
    {//On appel la bonne fonction et on require la vue souhaitée
        $categorie = $this->objet();
        $rep = $categorie->categorie3();
        $res = $categorie->nomCategorie(3);
        require 'vue/categories.php';
    }

    public function categorie4()
    {//On appel la bonne fonction et on require la vue souhaitée
        $categorie = $this->objet();
        $rep = $categorie->categorie4();
        $res = $categorie->nomCategorie(4);
        require 'vue/categories.php';
    }

    public function categorieAll()
    {//On appel la bonne fonction et on require la vue souhaitée
        $categorie = $this->objet();
        $rep = $categorie->categorieAll();
        require 'vue/categories.php';
    }
}
