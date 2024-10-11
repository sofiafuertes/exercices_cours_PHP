<?php
class ControlerHeader{
    //Attribut
    private ?string $class;
    private ?string $classNav;

    //Constructeur
    public function __construct(){
        //Déclaration des variables d'affichages
        $this->class = ""; //J'affiche les formulaires de Connexion et d'Inscription
        $this->classNav = "displayNone"; //J'enlève les liens Mon Compte et Déconnexion
    }

    //Getter et Setter
    public function getClass(): ?string { return $this->class; }
    public function setClass(?string $class): self { $this->class = $class; return $this; }

    public function getClassNav(): ?string { return $this->classNav; }
    public function setClassNav(?string $classNav): self { $this->classNav = $classNav; return $this; }

    //Méthode pour afficher le menu de navigation selon si on est conecté ou pas
    public function displayNav():void{
        //Je vérifie si je suis connecté :
        if(isset($_SESSION['id_user'])){
            //Si je suis connecté, je passe la class displayNone à la section possédant mes formulaires Inscription et Connexion pour les enlever
            //Et j'efface cette class de mes liens Mon Compte et Déconnexion, pour les afficher
            $this->setClass("displayNone");
            $this->setClassNav("");
        }
    }
}