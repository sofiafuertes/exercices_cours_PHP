<?php 
// function addCategory($name_category){
//     //*Connexion avec la bdd
//     $bdd = new PDO('mysql:host=localhost;dbname=task','root','',
//     array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//     //* Try...Catch pour faire la requete de envoie de donnees a la bdd et gerer des possibles erreurs
//     try {
//         //* Preparation requete
//         $req = $bdd -> prepare ('INSERT INTO categories (name_category) VALUES (?)');

//         //* Relie les donnes a ? 
//         $req -> bindParam(1,$name_category,PDO::PARAM_STR);

//         //* Execution de la requete
//         $req -> execute();

//         //* Message de confirmation
//         return "$name_category a été ajouté avec succès";

//     } catch (Exception $error) {
//         return $error -> getMessage();
//     }
// }


//* Creation de la fonction pour aficher la list de utilisateurs de la bdd

// function readCategories(){

//     //* Connexion avec la bdd
//     $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//     //* Requete pour recuperer les donnes de les categories
//     try {
//         $req = $bdd -> prepare ('SELECT id_category, name_category FROM categories ');

//         $req -> execute();

//         $data = $req -> fetchAll();

//         return $data; 

//     } catch (Exception $error) {
//         return $error -> getMessage();
//     }
// }

// //* Fonction pour recuperer une category en bdd selon le nom
// function readCategoryByName($name_category){

//     //* Connexion avec la bdd
//     $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//     //* Requete pour recuperer les donnes de les users
//     try {
//         $req = $bdd -> prepare ('SELECT name_category FROM categories WHERE name_category = ?');

//         // introduire l elogin de l'user das ma requete 
//         $req ->bindParam(1,$name_category, PDO::PARAM_STR);

//         $req -> execute();

//         $data = $req -> fetchAll();

//         return $data; 

//     } catch (Exception $error) {
//         return $error -> getMessage();
//     }
// }


class ModelCategorie{
    private ?string $nameCategory;
    
    public function __construct(?string $nameCategory){
        $this->nameCategory = $nameCategory;
    }

    public function getNameCategory(){
        return $this->nameCategory;
    }

    public function setNameCategory(?string $nameCategory): ModelCategorie{
        $this->nameCategory = $nameCategory;
        return $this;
    }

//     public function addCategory():string{
//         //*Connexion avec la bdd
//         $bdd = new PDO('mysql:host=localhost;dbname=task','root','',
//         array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
//         //* Try...Catch pour faire la requete de envoie de donnees a la bdd et gerer des possibles erreurs
//         try {
//             //* Preparation requete
//             $req = $bdd -> prepare ('INSERT INTO categories (name_category) VALUES (?)');
    
//             //* Relie les donnes a ? 
//             $req -> bindParam(1,$this->nameCategory,PDO::PARAM_STR);
    
//             //* Execution de la requete
//             $req -> execute();
    
//             //* Message de confirmation
//             return " $this->nameCategory a été ajouté avec succès";
    
//         } catch (Exception $error) {
//             return $error -> getMessage();
//         }
//     }

//     public function readCategories():array|string{

//         //* Connexion avec la bdd
//         $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
//         //* Requete pour recuperer les donnes de les categories
//         try {
//             $req = $bdd -> prepare ('SELECT id_category, name_category FROM categories ');
    
//             $req -> execute();
    
//             $data = $req -> fetchAll();
    
//             return $data; 
    
//         } catch (Exception $error) {
//             return $error -> getMessage();
//         }
//     }

//     //* Fonction pour recuperer une category en bdd selon le nom
// public function readCategoryByName():array|string{

//     //* Connexion avec la bdd
//     $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//     //* Requete pour recuperer les donnes de les users
//     try {
//         $req = $bdd -> prepare ('SELECT name_category FROM categories WHERE name_category = ?');

//         // introduire l elogin de l'user das ma requete 
//         $req ->bindParam(1,$this->nameCategory, PDO::PARAM_STR);

//         $req -> execute();

//         $data = $req -> fetchAll();

//         return $data; 

//     } catch (Exception $error) {
//         return $error -> getMessage();
//     }
// }
}