<?php

$message = "";
$listPlayers = "";
function testDonnesReçus(): array|string
{
    if (empty($_POST['email']) || empty($_POST['pseudo']) || empty($_POST['score'])) {
        return "Veuillez remplir tous les champs!";
    }

    $email = sanitize($_POST['email']);
    $pseudo = sanitize($_POST['pseudo']);
    $score = sanitize($_POST['score']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Email pas au bon format';
    }

    return [$email, $pseudo, $score];
}




    if (isset($_POST['add'])) {
        $tab = testDonnesReçus();
        $newJoueur = new Manager_joueurs($tab[0], $tab[1]);
        $pseudo_joueur = $newJoueur->getJoueurByPseudo();
        if (empty($pseudo_joueur)) {
            $newJoueur->setEmail($tab[0]);
            $newJoueur->setPseudo($tab[1]);
            $newJoueur->setScore($tab[2]);
            $message = $newJoueur->addJoueur();
        } else {
            $message = "<p style='color: red'> Cette pseudo il existe deja en BDD </p>";
        }
    }



$playerList = new Manager_joueurs('email', 'pseudo');
$players = $playerList->getJoueurs();
foreach ($players as $player) {
    $listPlayers .= "<article style='border-bottom : 2px solid green'>
                <p>Nom utilisateur: {$player['email']} </p>
                <p>Prenom utilisateur : {$player['pseudo']}</p>
                <p>Login utilisateur : {$player['score']}</p>
                </article>";
}

