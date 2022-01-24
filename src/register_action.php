<?php

session_start();


require_once 'db.php';
require_once 'authentication.php';

if(!empty($_POST['user_name']) && !empty($_POST['email']) && !empty($_POST['password']))
{
    // connexion à la BDD
    $pdo = connect();

    if(register($pdo, $_POST['user_name'], $_POST['email'], $_POST['password']))
    {
        if(login($pdo, $_POST['email'], $_POST['password']))
        {
            header('Location: index.php');
        }
        else
        {
            header('Location: register.php?error=3'); // échec login après register
        }
    }
    else
    {
        header('Location: register.php?error=1'); // utilisateur ou mot de passe incorrect
    }
}
else
{
    header('Location: register.php?error=2'); // utilisateur ou mot de passe vide
}

// fermer la connexion

