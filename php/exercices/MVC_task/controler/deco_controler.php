<?php 

class Deconnexion{
    public function deco(){
        
        //Je détruis la session
        session_destroy();

        //Je redirige vers la page d'accueil index.php
        header('Location:/php/exercices_cours_PHP/php/exercices/MVC_task/');
        exit;
    }
}