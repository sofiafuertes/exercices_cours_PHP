<?php

//* Declaration de variables 
$class = "";
$classNav = "displayNone";


class ControlerCategory{
    //Attribut
    private ?string $message;
    private ?string $categoryList;

    //Constructeur
    public function __construct(){
        //Déclaration des variables d'affichages
        $this->message = "";
        $this->categoryList = ""; 
    }

    //GETTER ET SETTER
    public function getMessage(): ?string { return $this->message; }
    public function setMessage(?string $message): self { $this->message = $message; return $this; }

    public function getcategoryList(): ?string { return $this->categoryList; }
    public function setcategoryList(?string $categoryList): self { $this->categoryList = $categoryList; return $this; }

//*Fonction pour chequer si les champs sont vides et filtrer et nettoyer les donnees 
/**
 * @return array|string
 */
public function sendCleanData(): array|string
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


//* Verification de le reçu de donnes quand le ajouter il est envoye et affichage de $message. 
public function registerCategory():void{
    if (isset($_POST['ajouter'])) {
    $tab = $this->sendCleanData();
    // print_r($tab);
    $manageCategory = new ManageCategory($tab[0]);
    $name_cat = $manageCategory->readCategoryByName();
    if (empty($name_cat)) {
        $manageCategory->setNameCategory($tab[0]);
        $message = $manageCategory->addCategory();
    } else {
        $message = "Cette category existe déjà en BDD !";
    }
}}

//* Affichage de la list des caregories
public function readCategories():void{
    if(isset($this->categoryList)){
    $manageCategory = new ManageCategory("name_category");
    $data = $manageCategory->readCategories();
    if(gettype($data) == 'string'){
        $this->setcategoryList($data);
    }else{
        foreach ($data as $category) {
            $categoryList = $this->getcategoryList();
        $this->setcategoryList($categoryList."<article style='border-bottom : 2px solid green'>
                <p>Id category: {$category['id_category']} </p>
                <p>Nom category : {$category['name_category']}</p>
                </article>");
        }
    }
}}



}







