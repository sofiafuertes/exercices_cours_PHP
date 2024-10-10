<?php 

//* Activation de la SESSION
session_start();

class ControlerCompte{
    private string $login;
    private string $name;
    private string $firstName; 
    private string $class;
    private string $classNav;

    public function __construct(){
        $this->login = "";
        $this->name = "";
        $this->firstName = "";
        $this->class ="";
        $this->classNav= "displayNone";
    }


   //* Getter
    public function getClassNav(): string {
        return $this->classNav;
    }
    public function getClass(): string {
        return $this->class;
    }

//*Setter
    public function setClassNav(string $classNav): self {
        $this->classNav = $classNav;
        return $this;
    }
    public function setClass(string $class): self {
        $this->class = $class;
        return $this;
    }
}


// print_r($_SESSION);
// print_r($_SESSION['loginCo']);

//* Si les $_SESSION login et psw existe on va las stocker en las variables correspondantes
if(isset($_SESSION['loginCo'])){
    $login = $_SESSION['loginCo'];
    $name = $_SESSION['name'];
    $firstName = $_SESSION['first_name'];
}


//* Chacher le formulaire de connexion une fois connecté
if(isset($_SESSION['id_user'])){
    $class = "displayNone";
    $classNav = "";
};

include './view/view_header.php';
include './view/view_mon_compte.php';


