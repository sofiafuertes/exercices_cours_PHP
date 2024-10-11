<main>
    <h1>Mes Tâches</h1>
    <section>
        <h2>Ajouter une Tâche</h2>
        <form action="" method="POST">
            <input type="text" name="nom_task" placeholder="Nom de la Tâche">
            <input type="date" name="date_task" placeholder="Date">
            <select name="id_category">
                <?php echo $tasks->getOptCategories()?>
            </select>
            <textarea name="content_task" placeholder="Description de la tâche">
            </textarea>
            <input type="submit" name="ajouterTask">
        </form>
        <p><?php echo $tasks->getMessage() ?></p>
    </section>
    <section>
        <h2>Liste des Tâches</h2>
        <?php echo $tasks->getListeTasks() ?>
    </section>
</main>