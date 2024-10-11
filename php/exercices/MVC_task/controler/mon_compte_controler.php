<?php 

$class ="";
    $classNav= "displayNone";
class ControlerCompte{
    private string $login;
    private string $name;
    private string $firstName; 

    public function __construct(){
        $this->login = "";
        $this->name = "";
        $this->firstName = "";
        
    }


   //* Getter
    public function getLogin(): string {
    return $this->login;
}
public function getName(): string {
    return $this->name;
}
public function getFirstName(): string {
    return $this->firstName;
}

//*Setter

    public function setLogin(string $login): self {
        $this->login = $login;
        return $this;
    } 
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }
    public function setFirstName(string $firstName): self {
        $this->firstName = $firstName;
        return $this;
    }

//* Si les $_SESSION login et psw existe on va las stocker en las variables correspondantes
public function displayUserAccount() { 
if(isset($_SESSION['loginCo'])){
    $this->setLogin($_SESSION['loginCo']);
    $this->setName($_SESSION['name']);
    $this->setFirstName($_SESSION['first_name']);
}}
}








