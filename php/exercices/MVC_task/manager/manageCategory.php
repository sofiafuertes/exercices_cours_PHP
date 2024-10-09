<?php 
class ManageCategory extends ModelCategorie{
    
public function addCategory():string{

    $nameCategory = $this->getNameCategory();
        //*Connexion avec la bdd
        $bdd = new PDO('mysql:host=localhost;dbname=task','root','',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
        //* Try...Catch pour faire la requete de envoie de donnees a la bdd et gerer des possibles erreurs
        try {
            //* Preparation requete
            $req = $bdd -> prepare ('INSERT INTO categories (name_category) VALUES (?)');
    
            //* Relie les donnes a ? 
            $req -> bindParam(1,$nameCategory,PDO::PARAM_STR);
    
            //* Execution de la requete
            $req -> execute();
    
            //* Message de confirmation
            return " $nameCategory a été ajouté avec succès";
    
        } catch (Exception $error) {
            return $error -> getMessage();
        }
    }

    public function readCategories():array|string{

        //* Connexion avec la bdd
        $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
        //* Requete pour recuperer les donnes de les categories
        try {
            $req = $bdd -> prepare ('SELECT id_category, name_category FROM categories ');
    
            $req -> execute();
    
            $data = $req -> fetchAll();
    
            return $data; 
    
        } catch (Exception $error) {
            return $error -> getMessage();
        }
    }

    //* Fonction pour recuperer une category en bdd selon le nom
public function readCategoryByName():array|string{

    $nameCategory = $this->getNameCategory();

    //* Connexion avec la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    //* Requete pour recuperer les donnes de les users
    try {
        $req = $bdd -> prepare ('SELECT name_category FROM categories WHERE name_category = ?');

        // introduire l elogin de l'user das ma requete 
        $req ->bindParam(1,$nameCategory, PDO::PARAM_STR);

        $req -> execute();

        $data = $req -> fetchAll();

        return $data; 

    } catch (Exception $error) {
        return $error -> getMessage();
    }
}
}