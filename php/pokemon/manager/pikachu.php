<?php

class Pikachu extends Pokemon{

    //*Methodes
    public function attaquerEclair(string $cible){
        $pointDegats = $this->attaquer($cible);
        echo $this->getNom(). " lance Attaque Eclair.";
        echo "<br>";
        echo "Cette attaque fait $pointDegats points de dégats";
    }
    
    public function action(string $cible){
        $this->attaquerEclair( $cible);
    }
}