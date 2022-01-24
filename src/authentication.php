<?php

/**
 * @param PDO $pdo
 * @param string $email
 * @param string $password
 * @return bool
 */
function login(PDO $pdo, string $email, string $password): bool
{
    // Sanitize data
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Fetch user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
    $stmt->execute(['email' => $email, 'password' => $password]);
    $user = $stmt->fetch();

    // If a user is found for the given email and password
    // then save it in session and return true
    if($user)
    {
        $_SESSION['user'] = $user;
        return true;
    }

    // If no user found, just return false
    return false;
}

/**
 * @param PDO $pdo
 * @param string $user_name
 * @param string $email
 * @param string $password
 * @return bool
 */
function register(PDO $pdo, string $user_name, string $email, string $password): bool
{
    $data = [
        'user_name' => htmlspecialchars($user_name),
        'email' => htmlspecialchars($email),
        'password' => htmlspecialchars($password),
    ];

    $sql = "INSERT INTO users (user_name, email, password) VALUES (:user_name, :email, :password)";
    return $pdo->prepare($sql)->execute($data);
}

function isLoged()
{
    return isset($_SESSION['user']);
}

function logout()
{
    unset($_SESSION['user']);
}