<?php
session_start();

// http://www.codeurjava.com/2016/12/formulaire-de-login-avec-html-css-php-et-mysql.html

require_once('db.php');
require_once('utils.php');

if(isset($_POST['email']) && isset($_POST['password']))
{
    // connexion à la BDD
    $pdo = connect();

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars --> cf pr PDO
    // pour éliminer toute attaque de type injection SQL et XSS
    // public PDOStatement::bindValue(string|int $param, mixed $value, int $type = PDO::PARAM_STR): bool
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if($email !== "" && $password !== "")
    {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
        $stmt->execute(['email' => $email, 'password' => $password]);
        $user = $stmt->fetch();

        if($user)
        {
            $_SESSION['email'] = $email;
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
}
else
{
    header('Location: login.php');
}

// fermer la connexion



