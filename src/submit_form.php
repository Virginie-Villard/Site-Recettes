<?php

echo("Validation formulaire : <br>");

if (!isset($_POST['user_name']) || !isset($_POST['password']))
{
    echo('Il faut un email et un message valides pour soumettre le formulaire.');
    return;
}
else
{
    echo('Demande de contact reçue, bienvenue ' . $_POST["user_name"]);
}

$email = $_POST['name'];
$message = $_POST['password'];

// sécu : htmlspecialchars ou echo strip_tags($message); !!!


