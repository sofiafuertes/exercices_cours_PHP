<?php

class Pikachu extends Pokemon{

    //*Methodes
    public function attaquerEclair(string $cible){
        $pointDegats = $this->attaquer($cible);
        echo $this->getNom(). "lance Attaque Eclair.";
        echo "Cette attaque fait $pointDegats points de dégats";
    }
    
    public function action($cible){
        $this->attaquerEclair($cible);
    }
}