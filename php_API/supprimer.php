<?php

// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Vérifier que la méthode de la requête est bien PUT
if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405);
    echo json_encode(["erreur" => "Méthode non autorisée. Utilisez une requête de type DELETE."]);
    exit;
}

// Récupérer les données du corps de la requête
$data = json_decode(file_get_contents("php://input"));

// Vérifier si l'email ancien et les nouvelles informations sont fournis
if (!isset($data->login_user)) {
    http_response_code(400);
    echo json_encode(["erreur" => "Données manquantes pour supprimer l'utilisateur"]);
    exit;
}

// Récupérer les données
$login_user = $data->login_user;

try {
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // Préparer la requête de mise à jour
    $req = $bdd->prepare("DELETE FROM users WHERE login_user = :login_user");


    // Exécuter la requête
    $req->bindParam(':login_user', $login_user,PDO::PARAM_STR);

    // Vérifier si une ligne a été mise à jour
    if ($req->execute()) {
        // Vérifier si un utilisateur a été supprimé
        if ($req->rowCount() > 0) {
            http_response_code(200);
            echo json_encode(["message" => "Utilisateur supprimé avec succès."]);
        } else {
            http_response_code(404);
            echo json_encode(["erreur" => "Aucun utilisateur trouvé avec cet email."]);
        }
    } else {
        http_response_code(500);
        echo json_encode(["erreur" => "Erreur lors de la suppression de l'utilisateur."]);
    }
} catch (Exception $error) {
    http_response_code(500);
    echo json_encode(["erreur" => $error->getMessage()]);
}