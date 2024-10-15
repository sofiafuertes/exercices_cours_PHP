<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(["erreur" => "Méthode non autorisée. Utilisez une requête de type GET."]);
    exit;
}

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(["erreur" => "L'ID de l'utilisateur est manquant."]);
    exit;
}

$id_user = intval($_GET['id']);

if ($id_user <= 0) {
    http_response_code(400);
    echo json_encode(["erreur" => "ID de l'utilisateur invalide."]);
    exit;
}

try {
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req = $bdd->prepare('SELECT id_user, name_user, first_name_user, login_user FROM users WHERE id_user = :id_user');
    $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $req->execute();

    $data = $req->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        http_response_code(200);
        echo json_encode($data);
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Utilisateur non trouvé."]);
    }

} catch (Exception $error) {
    http_response_code(500);
    echo json_encode(["erreur" => $error->getMessage()]);
}
