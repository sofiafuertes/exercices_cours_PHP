<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Revision: Pokemon</h1>
    <form action="" method="POST">
        <input type="text" name="nom" placeholder="Nom Pokemon">
        <input type="text" name="type" placeholder="Type Pokemon">
        <input type="text" name="force" placeholder="Force">
        <input type="text" name="faiblesse" placeholder="Faiblesse"> 
        <br><br>
        <input type="submit" name="Ajouter" value="Ajouter">
    </form>
    <p> <?php echo $controlerAccueil->getMessageEnregistrer(); ?> </p>
    <h2>Liste Pokemons enrigestres en BDD</h2>
    <p> <?php echo $controlerAccueil->getMessageAttaquer() ?> </p>
</body>
</html>