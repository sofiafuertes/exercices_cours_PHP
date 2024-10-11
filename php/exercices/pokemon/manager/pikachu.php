<?php

class Pikachu extends Pokemon{

    //*Methodes
    public function attaquerEclair(string $cible){
        $this->attaquer($cible);
        echo $this->getNom(). "lance Attaque Eclair";
        return "Cette attaque fait". $this->attaquer($cible)." points de dégats";
    }
    
    public function action($cible){
        $this->attaquerEclair($cible);
    }
}