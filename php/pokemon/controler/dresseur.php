<?php

class Dresseur{
    //*Attributs
    private string $nom;
    private $pokemon;

    //* Constructor
    public function __construct(string $nom, $pokemon)
    {
        $this->nom = $nom;
        $this->pokemon = $pokemon;
    }

    //* Getter et Setter
    public function getNom(): string
    {
        return $this->nom;
    }
    public function getPokemon(): Pokemon
    {
        return $this->pokemon;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }
    public function setPokemon(string $pokemon): self
    {
        $this->nom = $pokemon;
        return $this;
    }

}