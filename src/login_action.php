<?php
session_start();

// http://www.codeurjava.com/2016/12/formulaire-de-login-avec-html-css-php-et-mysql.html

require_once 'db.php';
require_once 'authentication.php';

if(!empty($_POST['email']) && !empty($_POST['password']))
{
    // connexion à la BDD
    $pdo = connect();

    if(login($pdo, $_POST['email'], $_POST['password']))
    {
        header('Location: index.php');
    }
    else
    {
        header('Location: login.php?error=1'); // utilisateur ou mot de passe incorrect
    }
}
else
{
    header('Location: login.php?error=2'); // utilisateur ou mot de passe vide
}

// fermer la connexion



