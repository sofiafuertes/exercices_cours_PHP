<?php

// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Vérifier que la méthode de la requête est bien PUT
if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    http_response_code(405);
    echo json_encode(["erreur" => "Méthode non autorisée. Utilisez une requête de type PUT."]);
    exit;
}

// Récupérer les données du corps de la requête
$data = json_decode(file_get_contents("php://input"));

// Vérifier si l'email ancien et les nouvelles informations sont fournis
if (!isset($data->old_login) || !isset($data->name_user) || !isset($data->first_name_user) || !isset($data->login_user)) {
    http_response_code(400);
    echo json_encode(["erreur" => "Données manquantes pour mettre à jour l'utilisateur."]);
    exit;
}

// Récupérer les données
$old_login = $data->old_login;
$name_user = $data->name_user;
$first_name_user = $data->first_name_user;
$login_user = $data->login_user;

try {
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // Préparer la requête de mise à jour
    $req = $bdd->prepare("UPDATE users SET name_user = :name_user, first_name_user = :first_name_user, login_user = :login_user WHERE login_user = :old_login");

    // Lier les paramètres
    $req->bindParam(':name_user', $name_user, PDO::PARAM_STR);
    $req->bindParam(':first_name_user', $first_name_user, PDO::PARAM_STR);
    $req->bindParam(':login_user', $login_user, PDO::PARAM_STR);
    $req->bindParam(':old_login', $old_login, PDO::PARAM_STR);

    // Exécuter la requête
    $req->execute();

    // Vérifier si une ligne a été mise à jour
    if ($req->rowCount() > 0) {
        http_response_code(200);
        echo json_encode(["message" => "Utilisateur mis à jour avec succès."]);
    } else {
        // Si aucune ligne n'a été mise à jour, cela signifie que l'email ancien n'existe pas
        http_response_code(404);
        echo json_encode(["message" => "Aucun utilisateur trouvé avec cet ancien email."]);
    }

} catch (Exception $error) {
    http_response_code(500);
    echo json_encode(["erreur" => $error->getMessage()]);
}