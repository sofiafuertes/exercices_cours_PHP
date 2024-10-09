<?php

$name = "";
$content = "";


function sanitize($data)
{
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

function securiteArticle($a, $b)
{
    if (empty($a) or empty($b)) {
        return "Veuillez remplir les champs vides !";
    }
    $name = sanitize($a);
    $content = sanitize($b);

    //*connexion a la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=articles', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


    try {
        $req = $bdd->prepare('INSERT INTO article (nom_article, contenu_article) VALUES (?,?)');

        $req->bindParam(1, $name, PDO::PARAM_STR);
        $req->bindParam(2, $content, PDO::PARAM_STR);

        $req->execute();

    } catch (EXCEPTION $error) {
        echo $error->getMessage();
    }
}

if (isset($_POST["submit"])) {
    securiteArticle($_POST["nom_article"], $_POST["contenu_article"]);
    $name = $_POST["nom_article"];
    $content = $_POST["contenu_article"];
    echo "<p> Nom de l'article: $name</p>";
    echo "<p> Son contenu: $content</p>";
}


// Exercice 14 :
// a) Créer une page php,

// b) Ajouter le script php permettant de se connecter à la base de données articles,

// c) Ajouter le script php qui va effectuer une requête SQL select préparée permettant de récupérer tous les articles,

// d) Formater le résultat de la requête pour quelle l’affiche sous cette forme :
// <article>
//     <p>numéro de l’article : id de l’article n</p>
//     <p>nom de l’article : nom de l’article n</p>
//     <p>contenu de l’article : contenu de l’article n</p>
// </article>

$listArticles = "";

//* Fonction pour se connecter a la bdd et recuperer la liste des articles
function readArticles()
{
    $bdd = new PDO('mysql:host=localhost;dbname=articles', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    try {
        $req = $bdd->prepare('SELECT id_article, nom_article, contenu_article FROM article');


        $req->execute();

        $data = $req->fetchAll();
        return $data;

    } catch (EXCEPTION $error) {
        return $error->getMessage();
    }
}

//* Afficher les articles (id, nom et contenu) si $listArticles existe et elle est pas null
if (isset($listArticles)) {
    $data = readArticles();
    if (gettype($data) == 'string') {
        $listArticles = "<p>$data</p>";
    } else {
        foreach ($data as $article) {
            $listArticles .= "<article style='border-bottom : 1px solid green'>
                <p>numéro de l'article : {$article['id_article']} </p>
                <p>nom de l'article : {$article['nom_article']}</p>
                <p>contenu de l'article : {$article['contenu_article']}</p>
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
    <h1>Exo 14 et 15 BDD</h1>
    <form action="" method="post">
        <input type="text" name="nom_article" placeholder="Nom de l'article">
        <input type="text" name="contenu_article" placeholder="Contenu de l'article">
        <input type="submit" name="submit" value="Ajouter">
    </form>
    <article>
        <h2>Articles:</h2>
        <?php echo $listArticles ?>
    </article>
</body>

</html>