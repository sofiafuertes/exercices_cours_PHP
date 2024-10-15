<?php
//ROUTE POUR ENREGISTRER UN UTILISATEUR

// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée, ici POST, mais ça peut être GET, PUT ou DELETE
header("Access-Control-Allow-Methods: POST");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//Testons le méthode de la requête pour savoir si elle est autorisé
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    //Encode le code de réponse HTTP
    http_response_code(405);

    //Création du message d'erreur
    $data = ["erreur" => "Méthode non autorisée. Vous n'avez utilisé une requête de type POST !"];

    //encode notre message en JSON
    $json = json_encode($data);

    //Envoyer les data via un affichae
    echo $json;

}else{
    //Récupération le JSON
    $json = file_get_contents('php://input');

    //Dechiffrage du json
    $data = json_decode($json);

    //on attend nos data sous la forme objet suivante :
    //Je choisi le nom des attributs moi-même. Ici je choisis de reprendre le nom des champs de ma BDD
    /*$data = {
            'name_user' : "Nom",
            'first_name_user' : "Prenom",
            'login_user' : "Email",
            'mdp_user' : "Mot de Passe"
        }*/

    //TRAITEMENT DE NOS DATAS
    //1) Etape de sécurité
    //Vérification des champs vides
    if(!empty($data->login_user) && !empty($data->mdp_user)){
        //Verification le format des données
        if(filter_var($data->login_user, FILTER_VALIDATE_EMAIL)){
            //Nettoyage des données
            $login = htmlentities(strip_tags(stripslashes(trim($data->login_user))));
            $password = htmlentities(strip_tags(stripslashes(trim($data->mdp_user))));
            $name = '';
            $firstName = '';

            if(!empty($data->name_user)){
                $name = htmlentities(strip_tags(stripslashes(trim($data->name_user))));
            }

            if(!empty($data->first_name_user)){
                $firstName = htmlentities(strip_tags(stripslashes(trim($data->first_name_user))));
            }

            //Hashage du mot de passe
            $password = password_hash($password, PASSWORD_BCRYPT);

            //Vérification du Login disponible ou pas
            $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            //Try catch pour vérifier le login
            try{
                $req = $bdd->prepare('SELECT id_user, name_user, first_name_user, login_user, mdp_user FROM users WHERE login_user = ?');

                //Binding de Param
                $req->bindParam(1,$login,PDO::PARAM_STR);

                //Execution de la requête
                $req->execute();

                //Récupère la réponse de la BDD
                $data = $req->fetchAll(PDO::FETCH_ASSOC);

                //On vérifi si data est vide ou pas
                if(empty($data)){
                    //Le login est disponible, et on peut l'utilisateur en BDD
                    $req = $bdd->prepare('INSERT INTO users (name_user, first_name_user, login_user, mdp_user) VALUES (?,?,?,?)');

                    //Binding de Param
                    $req->bindParam(1,$name,PDO::PARAM_STR);
                    $req->bindParam(2,$firstName,PDO::PARAM_STR);
                    $req->bindParam(3,$login,PDO::PARAM_STR);
                    $req->bindParam(4,$password,PDO::PARAM_STR);

                    //Execution de la requête
                    $req->execute();

                    //Formatage du message de confirmation
                    $data=["message" => "utilisateur a été enregistré avec succès !"];
                    //Encode du code réponse HTTP
                    http_response_code(200);
                    //Envoie du message erreur encodé en JSON
                    echo json_encode($data);

                }else{
                    //le login n'est pas disponible, on envoie un message d'erreur
                    //Formatage du message d'erreur
                    $data=["erreur" => "Ce Login est indisponible !"];
                    //Encode du code réponse HTTP
                    http_response_code(400);
                    //Envoie du message erreur encodé en JSON
                    echo json_encode($data);
                }

            }catch(EXCEPTION $error){
                //Formatage du message d'erreur
                $data=["erreur" => $error->getMessage()];
                //Encode du code réponse HTTP
                http_response_code(500);
                //Envoie du message erreur encodé en JSON
                echo json_encode($data);
            }



        }else{
            //Format de login (email) invalide
            //Encoder le code de réponse HTTP
            http_response_code(400);

            $error = ["erreur" => "Email as au bon format !"];

            //Encoder les données en json
            $response = json_encode($error);

            //Envoyer les données via un affichae
            echo $response;
        }

    }else{
        //Les champs obligatoires sont vides, message d'erreur
        //Encoder le code de réponse HTTP
        http_response_code(400);

        $error = ["erreur" => "Veuillez remplir tous les champs obligatoires !"];

        //Encoder les données en json
        $response = json_encode($error);

        //Envoyer les données via un affichae
        echo $response;
    }
    

    //Je formate la réponse à envoyé en tableau associatif
    $request = ["message" => "L'utilisateur a été enregistré avec succès !"];

    //Encoder le code de réponse HTTP
    http_response_code(200);

    //Encoder les données en json
    $response = json_encode($request);

    //Envoyer les données via un affichae
    echo $response;

}
