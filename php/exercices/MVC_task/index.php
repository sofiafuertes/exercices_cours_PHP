<?php
//* J'active la session
session_start();

//* Inlclure ressources communes a chaque route



//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);

//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/

//test de la valeur $path dans l'URL et import de la ressource
switch ($path) {

    case $path === "/php/exercices_cours_PHP/php/exercices/MVC_task/":
        include './utils/functions.php';
        include './model/model_user_connexion.php';
        include './manager/manageConnexion.php';
        include './controler/header.php';
        include './controler/accueil.php';
        $controlerAccueil = new ControlerAccueil();
        $controlerAccueil->sendCleanData();
        $controlerAccueil->connexionUser();
        $header = new ControlerHeader();
        $header->displayNav();
        include './view/view_header.php';
        include './view/view_acceuil_conection.php';
        break;

    case $path === "/php/exercices_cours_PHP/php/exercices/MVC_task/inscription":
        include './utils/functions.php';
        include './model/model_users_incription.php';
        include './manager/manageUser.php';
        include './controler/header.php';
        include './controler/inscription_controler.php';
        $controlerInscription = new ControlerInscription();
        $controlerInscription->testDonnesReçus();
        $controlerInscription->afficherUserList();
        $header = new ControlerHeader();
        $header->displayNav();
        include './view/view_header.php';
        include './view/view_inscription.php';
        break;

    case $path === "/php/exercices_cours_PHP/php/exercices/MVC_task/mon_compte":
        include './utils/functions.php';
        include './controler/header.php';
        include './controler/mon_compte_controler.php';
        $moncompte = new ControlerCompte();
        $moncompte->displayUserAccount();
        $header = new ControlerHeader();
        $header->displayNav();
        include './view/view_header.php';
        include './view/view_mon_compte.php';
        break;

    case $path === "/php/exercices_cours_PHP/php/exercices/MVC_task/tasks":
        include './utils/functions.php';
        include './model/model_categories.php';
        include './model/model_tasks.php';
        include './manager/manageTask.php';
        include './manager/manageCategory.php';
        include './controler/header.php';
        include './controler/mytasks.php';
        $tasks = new ControlerTask();
        $tasks->registerTask();
        $tasks->displayListTask();
        $tasks->displaySelectCategory();
        $header = new ControlerHeader();
        $header->displayNav();
        include './view/view_header.php';
        include './view/view_task.php';
        break;

    case $path === "/php/exercices_cours_PHP/php/exercices/MVC_task/categories":
        include './model/model_categories.php';
        include './utils/functions.php';
        include './manager/manageCategory.php';
        include './controler/header.php';
        include './controler/category_controler.php';
        $category = new ControlerCategory();
        $category->registerCategory();
        $category->readCategories();
        $header = new ControlerHeader();
        $header->displayNav();
        include './view/view_header.php';
        include './view/view_categories.php';
        break;

    case $path === "/php/exercices_cours_PHP/php/exercices/MVC_task/deconnexion":
        include './controler/deco_controler.php';
        $deco = new Deconnexion();
        $deco->deco();
        break;

}

