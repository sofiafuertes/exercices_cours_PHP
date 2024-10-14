<!-- VUE DE LA PAGE D'ACCUEIL -->
<main>
    <h1>Enregistrer un nouveau joueur</h1>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="pseudo" placeholder="Pseudo">
        <input type="number" name="score" placeholder="Score">
        <input type="submit" name="add" value="Add player" >
    </form>
    <p><?php echo $message ?></p>
    <h3>List of players</h3>
    <p><?php echo $listPlayers?></p>

</main>