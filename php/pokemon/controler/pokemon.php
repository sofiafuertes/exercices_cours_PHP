<?php 

class Pokemon{
    //*Attributs
    private ?string $nom;
    private ?int $puissance;

    //*Constructor
    public function __construct(?string $nom, ?int $puissance){
        $this->nom = $nom;
        $this->puissance = $puissance;
    }

    
 //* Getter et Setter
    public function getNom(): string {
        return $this->nom;
    }
    public function setPuissance(int $puissance): self {
        $this->puissance = $puissance;
        return $this;
    }
    public function setNom(string $nom): self {
        $this->nom = $nom;
        return $this;
    }
    public function getPuissance(): int {
        return $this->puissance;
    }

    //*Methodes
    public function attaquer(string $cible){
        echo "$this->nom attaque $cible";
        echo "<br>";
        return $this->getPuissance(); 
    }
    
}