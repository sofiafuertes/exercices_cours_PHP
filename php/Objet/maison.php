<?php

class Maison {
    private string $nom;
    private int $longueur;
    private int $larguer;
    private int $nbrEtage;

    public function __construct(string $nom, int $longueur, int $larguer, $nbrEtage) {
        $this-> nom = $nom;
        $this-> longueur = $longueur;
        $this-> larguer = $larguer;
        $this ->nbrEtage = $nbrEtage;
    }
    public function getLongueur():int{
        return $this -> longueur;
    }
    public function getLargeur():int{
        return $this -> larguer;
    }
    
    public function setLongueur(int $longueur): Maison{
        $this->longueur = $longueur;
        return $this;
    }
    public function setLargeur(int $larguer): Maison{
        $this->larguer= $larguer;
        return $this;
    }

    public function getNbrEtage(): int{
        return $this -> nbrEtage;
    }
    public function setNbrEtage(int $nbrEtage): Maison{
        $this -> nbrEtage = $nbrEtage;
        return $this;
    }
    public function surface(){
        $surface = $this-> longueur * $this-> larguer * ($this -> nbrEtage +1); 
        return "La surface de $this->nom est égale a $surface m²";
    }

}