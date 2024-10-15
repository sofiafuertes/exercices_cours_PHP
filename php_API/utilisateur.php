<?php
//ROUTE POUR RECUPERER LA LISTE DES UTILISATEURS (Method GET)

// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée, ici POST, mais ça peut être GET, PUT ou DELETE
header("Access-Control-Allow-Methods: GET");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


//* GET 
//Testons le méthode de la requête pour savoir si elle est autorisé
if($_SERVER['REQUEST_METHOD'] != 'GET'){
    //Encode le code de réponse HTTP
    http_response_code(405);

    //Création du message d'erreur
    $data = ["erreur" => "Méthode non autorisée. Vous n'avez utilisé une requête de type GET !"];

    //encode notre message en JSON
    $json = json_encode($data);

    //Envoyer les data via un affichae
    echo $json;

}else{
    //Pas besoin de récupérer des données GET, car on n'en a pas besoin pour récupérer la liste des utilisateur


    //Aller chercher la liste de utilisateur dans la BDD (utilisons la BDD Task)
    //1) Créons l'objet de connexion PDO
    $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    try{
        //2) Préparation de la requête
        $req=$bdd->prepare('SELECT id_user, name_user, first_name_user, login_user FROM users');

        //3) Exécution de la requête
        $req->execute();

        //4) Récupération de la réponse
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        //Envoyons les données au Client
        //A) Définition du code de réponse HTTP
        http_response_code(200);

        //B) Encode nos donnés en JSON
        $json = json_encode($data);

        //C) Envoie du JSON via un affichage echo
        echo $json;

    }catch(EXCEPTION $error){
        $data = ["erreur" => $error->getMessage()];

        //Envoyons le message d'erreur au Client
        //A) Définition du code de réponse HTTP
        http_response_code(500);

        //B) Encode nos donnés en JSON
        $json = json_encode($data);

        //C) Envoie du JSON via un affichage echo
        echo $json;
    }
}

