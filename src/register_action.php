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
}*/

// https://phpdelusions.net/pdo_examples/insert

$data = [
    'user_name' => htmlspecialchars($_POST["user_name"]),
    'email' => htmlspecialchars($_POST["email"]),
    'password' => htmlspecialchars($_POST["password"]),
];

$sql = "INSERT INTO users (user_name, email, password) VALUES (:user_name, :email, :password)";
$pdo->prepare($sql)->execute($data);

// sécu : htmlspecialchars  /ou echo strip_tags($message);--> déconseillé dans la doc pour la faille XSS...


