<?php
//MODEL POUR LA TABLE JOUEURS
class Model_joueurs
{

    //*Attributs     private int $id;
    private ?int $id;
    private ?string $pseudo;
    private ?string $email;
    private ?int $score;
    private PDO $bdd;
    
    //*Constructor
    public function __construct(?string $email, ?string $pseudo){
        $this->email = $email;
        $this->pseudo = $pseudo;
    }

    //*Getters and Setters
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }
    public function getPseudo(){
        return $this->pseudo;
    }
    public function setPseudo(?string $pseudo): self{
        $this->pseudo = $pseudo;
        return $this;
    }
    public function getEmail(): string{
        return $this->email;
    }
    public function setEmail(?string $email): self{
        $this->email = $email;
        return $this;
    }
    public function getScore(): int {
        return $this->score;
    }
    public function setScore(?int $score): self{
        $this->score = $score;
        return $this;
    }
    public function getBdd(): PDO{
        return $this->bdd;
    }

    public function setBdd(PDO $bdd): self{
        $this->bdd = $bdd;
        return $this;
    }

}
