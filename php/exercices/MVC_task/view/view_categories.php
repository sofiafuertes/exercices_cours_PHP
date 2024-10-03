<main>
    <h1>Categories</h1>
    <h4>Ajouter une categorie: </h4>
    <!-- Creation du formulaire -->
    <form action="" method="post">
        <input type="text" name="name_category" placeholder="Nom de la categorie">
        <input type="submit" name="ajouter" value="Ajouter">
    </form>
    <p><?php echo $message ?> </p>
    <section>
        <h4>Liste des categories dans la bdd</h4>
        <p><?php echo $categoryList ?></p>
    </section>
</main>

</body>

</html>