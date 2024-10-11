<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <a href="/php/exercices_cours_PHP/php/exercices/MVC_task/">Accueil/Connexion</a>
            <a href="/php/exercices_cours_PHP/php/exercices/MVC_task/tasks" class="<?php echo $header->getClassNav() ?>" >Mes Tâches</a>
            <a href="/php/exercices_cours_PHP/php/exercices/MVC_task/inscription" class="<?php echo $header->getClass()?>">Inscription</a>
            <a href="/php/exercices_cours_PHP/php/exercices/MVC_task/mon_compte" class="<?php echo $header->getClassNav() ?>">Mon compte</a>
            <a href="/php/exercices_cours_PHP/php/exercices/MVC_task/categories" class="<?php echo $header->getClassNav() ?>">Categories</a>
            <a href="/php/exercices_cours_PHP/php/exercices/MVC_task/deconnexion" class="<?php echo $header->getClassNav() ?>">Deconnexion</a>
            

        </nav>
    </header>