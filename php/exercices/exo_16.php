<?php 

$userList = "";
$message = "";

/**
 * Creation de la fonction sanitize pour nettoyer les donnes envoyes a la bdd
 * @param mixed $data
 * @return string
 */
function sanitize($data)
{
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

function sendCleanData($a, $b, $c, $d){
    //*Verifier si les champs sont vides, si ils le sont on retourne on message de erreur
    if(empty($c) or empty($d)){
        return ["name_user"=>'',"first_name_user"=>'',"login_user"=>'',"password_user"=>'',"erreur"=>'Veuillez remplir le Login ET le Mot de Passe !'];
    }

    //*Nettoyer les donnees avec la fonction sanitize
    $name = sanitize($a);
    $firstName = sanitize($b);
    $login = sanitize($c);
    $psw = sanitize($d);


    if(!filter_var($login,FILTER_VALIDATE_EMAIL)){
        return ["name_user"=>'',"first_name_user"=>'',"login_user"=>'',"password_user"=>'',"erreur"=>'Login pas au bon format !'];
    }

    //* Hasher le mot de passe 
    $psw = password_hash($psw,PASSWORD_BCRYPT);

    return ["name_user"=>$name,"first_name_user"=>$firstName,"login_user"=>$login,"password_user"=>$psw,"erreur"=>''];
}

    function addUser($name, $firstName,$login,$psw){
    //*Connexion avec la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=task','root','',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    //* Try...Catch pour faire la requete de envoie de donnees a la bdd et gerer des possibles erreurs
    try {
        //* Preparation requete
        $req = $bdd -> prepare ('INSERT INTO users (name_user, first_name_user, login_user, mdp_user) VALUES (?,?,?,?)');

        //* Relie les donnes a chaque ? 
        $req -> bindParam(1,$name,PDO::PARAM_STR);
        $req -> bindParam(2,$firstName,PDO::PARAM_STR);
        $req -> bindParam(3,$login,PDO::PARAM_STR);
        $req -> bindParam(4,$psw,PDO::PARAM_STR);

        //* Execution de la requete
        $req -> execute();

        //* Message de confirmation
        return "$login a été enregistré avec succès";

    } catch (Exception $error) {
        return $error -> getMessage();
    }
}

//* Verification de le reçu de donnes quand le submit il est envoye et affichage de $message. 
if(isset($_POST['submit'])){
    $tab = sendCleanData($_POST['name_user'],$_POST['first_name_user'],$_POST['login_user'], $_POST['mdp_user']); 

    if($tab['erreur'] != ''){
        $message = $tab['erreur'];
    }else{
        if(empty(readUserByLogin($tab['login_user']))){
        $message = addUser($tab['name_user'],$tab['first_name_user'],$tab['login_user'],$tab['password_user']);
}else{
    $message="Ce Login existe déjà en BDD !";
}
}}


//* Creation de la fonction pour aficher la list de utilisateurs de la bdd

function readUsers(){

    //* Connexion avec la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    //* Requete pour recuperer les donnes de les users
    try {
        $req = $bdd -> prepare ('SELECT name_user, first_name_user, login_user FROM users ');

        $req -> execute();

        $data = $req -> fetchAll();

        return $data; 

    } catch (Exception $error) {
        return $error -> getMessage();
    }
}



//* Fonction pour recuperer un utilisateur en bdd selon un login precis
function readUserByLogin($login_user){

    //* Connexion avec la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    //* Requete pour recuperer les donnes de les users
    try {
        $req = $bdd -> prepare ('SELECT name_user, first_name_user, login_user FROM users WHERE login_user = ?');

        // introduire l elogin de l'user das ma requete 
        $req ->bindParam(1,$login_user, PDO::PARAM_STR);

        $req -> execute();

        $data = $req -> fetchAll(PDO::FETCH_ASSOC);

        return $data; 

    } catch (Exception $error) {
        return $error -> getMessage();
    }
}


//* Affichage de la list de utilisateurs
if(isset($userList)){
    $data = readUsers();
    if(gettype($data) == 'string'){
        $userList = $data;
    }else{
        foreach ($data as $user) {
        $userList .= "<article style='border-bottom : 2px solid green'>
                <p>Nom utilisateur: {$user['name_user']} </p>
                <p>Prenom utilisateur : {$user['first_name_user']}</p>
                <p>Login utilisateur : {$user['login_user']}</p>
                </article>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exo 16</h1>
    <!-- Creation du formulaire -->
<form action="" method="post">
    <input type="text" name="name_user" placeholder="Your name">
    <input type="text" name="first_name_user" placeholder="Your first name">
    <input type="email" name="login_user" placeholder="Your username">
    <input type="password" name="mdp_user" placeholder="Your password">
    <input type="submit" name="submit" value="connexion">
</form>
<p><?php echo $message ?> </p>
    <section>
        <h2>Liste des utilisateurs</h2>
        <p><?php echo $userList ?></p>
    </section>


</body>

</html>