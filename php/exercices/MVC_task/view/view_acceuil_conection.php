<main>
    <h1>Accueil</h1>
    <!-- Creation du formulaire -->
    <section class="<?php echo $header->getClass() ?>">
        <h2>Connexion</h2>
        <form action="" method="post">
            <input type="email" name="loginCo" placeholder="Login">
            <input type="text" name="passwordCo" placeholder="Password">
            <input type="submit" name="connexion" value="connexion">
        </form>
    </section>
    <p><?php echo $controlerAccueil->getMessage() ?> </p>


    
</main>
</body>

</html>