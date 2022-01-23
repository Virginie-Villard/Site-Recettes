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

// $email = $_POST['name'];
// $message = $_POST['password'];

$data = [
    'user_name' => $_POST["user_name"],
    'email' => $_POST["email"],
    'password' => $_POST["password"],
];

$sql = "INSERT INTO users (user_name, email, password) VALUES (:user_name, :email, :password)";
$pdo->prepare($sql)->execute($data);

// sécu : htmlspecialchars ou echo strip_tags($message); !!!


