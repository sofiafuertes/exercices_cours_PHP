<?php
//J'active la SESSION
session_start();

//J'inclus mes ressources (fonction utilitaire, model)
include './model/model_categories.php';
include './model/model_tasks.php';
include './utils/functions.php';
include './manager/manageCategory.php';
include './manager/manageTask.php';


//Déclaration de mes variables d'affichages
$optCategories = "";
$message = "";
$listeTasks = "";
$class = "";
$classNav = "displayNone";

//Fonction pour mettre en forme le <select> des categories
//Param : array ['id_categort'=> INT, 'name_category'=>string]
//Return : string
function optionCategory($category){
    return "<option value='".$category['id_category']."'>{$category['name_category']}</option>";
}

//Fonction pour mettre en forme une card task
//Param : array ['id_task'=>INT, 'nom_task'=> string, 'content_task'=>string, 'date_task'=>string, 'id_user'=>INT, 'id_category'=> INT, 'name_category'=>string]
//Return : string
function cardTask($task){
    return "<article>
                <h3>{$task['nom_task']}</h3>
                <p>Date : {$task['date_task']}</p>
                <p>Catégorie : {$task['name_category']}</p>
                <p>{$task['content_task']}</p>
            </article>";
}

//Fonction pour tester le formulaire d'ajout de tâche
//Param : void
//Return : array ["nom_task"=>string, "content_task"=>string, "date_task"=>string ('AAAA-MM-JJ'), "id_user"=>INT, "id_category"=>INT, "erreur"=>string]
function testFormAddTask(){
    //1) Vérification des données vides
    if(empty($_POST["nom_task"]) || empty($_POST["date_task"]) || empty($_POST["id_category"]) || empty($_SESSION['id_user'])){
        return ["nom_task"=>"", "content_task"=>"", "date_task"=>"", "id_user"=>'', "id_category"=> '', "erreur"=>"Veuillez remplir les champs requis !"];
    }

    //2) Vérification du format de données
    if(!filter_var($_POST["id_category"],FILTER_VALIDATE_INT) || !filter_var($_SESSION['id_user'],FILTER_VALIDATE_INT)){
        return ["nom_task"=>"", "content_task"=>"", "date_task"=>"", "id_user"=>'', "id_category"=> '', "erreur"=>"Problème dans le format des données !"];
    }

    //3) Nettoyage des données
    $nom_task = sanitize($_POST["nom_task"]);
    $content_task = sanitize($_POST["content_task"]);
    $date_task = sanitize($_POST["date_task"]);
    $id_user = sanitize($_SESSION['id_user']);
    $id_category = sanitize($_POST['id_category']);

    //4)Retour du tableau de données
    return ["nom_task"=>$nom_task, "content_task"=>$content_task, "date_task"=> $date_task, "id_user"=> $id_user, "id_category"=> $id_category, "erreur"=>""];
}

//Affichage des options pour le <select> categories
//je récupère la liste de mes categories
$ManageCategory = new ManageCategory('name_category');
$data = $ManageCategory->readCategories();

//je vérifie si je ne suis pas dans le cas d'erreur
if(gettype($data) != 'string'){
    //j'affiche la liste des options de catégories
    foreach($data as $category){
        $optCategories = $optCategories.optionCategory($category);
    }
}

//AJOUT D'UNE TASK avec la class ModelTask
//je vérifie que je reçois le formulaire
if(isset($_POST['ajouterTask'])){
    //je teste les données
    $tab = testFormAddTask();

    //je vérifie si je suis dans le cas d'erreur
    if($tab['erreur'] != ''){
        //j'affiche le message d'erreur
        $message = $tab['erreur'];
    }else{
        //je lance l'enregistrement de la task
        $manageTask = new ManageTask($tab['nom_task']);
        $manageTask->setContentTask($tab['content_task']);
        $manageTask->setDateTask($tab['date_task']);
        $manageTask->setIdUser($tab['id_user']);
        $manageTask->setIdCategory($tab['id_category']);
        $message = $manageTask->addTask();
    }
}

//AFFICHAGE DE LA LISTE DES TASKS
//je récupère mes données
$manageTask = new ManageTask('nom_task');
$manageTask->setIdUser($_SESSION['id_user']);
$data = $manageTask->readTasksByUser();

//J'affiche la liste
foreach($data as $task){
    $listeTasks = $listeTasks.cardTask($task);
}



//* Cacher le formulaire de connexion une fois connecté
if(isset($_SESSION['id_user'])){
    $class = "displayNone";
    $classNav = "";
};





//j'inclus les view
include './view/view_header.php';
include './view/view_task.php';

