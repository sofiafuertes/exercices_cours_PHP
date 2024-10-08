<?php
//* Initialisation de SESSION
session_start();

//*Include de le model categories et fichier functions utilitaires
include './model/model_categories.php';
include './utils/functions.php';

//* Declaration de variables 
$message = "";
$categoryList = "";
$class = "";
$classNav = "displayNone";


//*Fonction pour chequer si les champs sont vides et filtrer et nettoyer les donnees 
/**
 * @return array|string
 */
function sendCleanData()
{
    //*Verifier si les champs sont vides, si ils le sont on retourne on message de erreur
    if (empty($_POST['name_category'])) {
        return 'Veuillez remplir le champ de nom de categorie';
    }

    //*Nettoyer les donnees avec la fonction sanitize
    $name_cat = sanitize($_POST['name_category']);


    //* cet fonction retournera un tableau avec le $login et le $psw
    return [$name_cat];
}
;


//* Verification de le reçu de donnes quand le ajouter il est envoye et affichage de $message. 
if (isset($_POST['ajouter'])) {
    $tab = sendCleanData();
    // print_r($tab);
    $newCategory = new ModelCategorie($tab[0]);
    $name_cat = $newCategory->readCategoryByName();
    if (empty($name_cat)) {
        $newCategory->setNameCategory($tab[0]);
        $message = $newCategory->addCategory();
    } else {
        $message = "Cette category existe déjà en BDD !";
    }
}

// //* Affichage de la list des caregories
// if(isset($categoryList)){
//     $data = readCategories();
//     if(gettype($data) == 'string'){
//         $categoryList = $data;
//     }else{
//         foreach ($data as $category) {
//         $categoryList .= "<article style='border-bottom : 2px solid green'>
//                 <p>Id category: {$category['id_category']} </p>
//                 <p>Nom category : {$category['name_category']}</p>
//                 </article>";
//         }
//     }
// }













//* Chacher le formulaire de connexion une fois connecté
if(isset($_SESSION['id_user'])){
    $class = "displayNone";
    $classNav = "";
};


include './view/view_header.php';
include './view/view_categories.php';