<?php

class Sasha extends Dresseur{

    //* Methodes
    public function lancerPokemon():void{
        echo $this->getPokemon() . "á toi!";
    }

    public function attaquerDresseur(string $cible):void{
        $pikachu = new Pikachu('pikachu',150);
        
        
    }
}
