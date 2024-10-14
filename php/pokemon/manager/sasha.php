<?php

class Sasha extends Dresseur{

    //* Methodes
    public function lancerPokemon():void{
        $nomPokemon = $this->getPokemon()->getNom();
        echo "$nomPokemon á toi!";
        echo "<br>";
    }

    public function attaquerDresseur(string $cible):void{
        $this->getPokemon()->action($cible);
    }
}
