<main>
    <h1>Inscription</h1>
    <!-- Creation du formulaire -->
    <form action="" method="post">
        <input type="text" name="name_user" placeholder="Your name">
        <input type="text" name="first_name_user" placeholder="Your first name">
        <input type="email" name="login_user" placeholder="Your email">
        <input type="password" name="mdp_user" placeholder="Your password">
        <input type="submit" name="submit" value="connexion">
    </form>
    <p><?php echo $message ?> </p>
    <section>
        <h2>Liste des utilisateurs</h2>
        <p><?php echo $userList ?></p>
    </section>
</main>

</body>

</html>