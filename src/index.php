<?php
session_start();

// https://dev.to/truthseekers/setup-a-basic-local-php-development-environment-in-docker-kod  (Mise en place du container Docker)
// https://hub.docker.com/_/phpmyadmin  (pour installer phpmyadmin)

require_once 'db.php';
require_once 'recipe_repository.php';
require_once 'recipe_display.php';
require_once 'authentication.php';

$pdo = connect();
$recipes = fetchAllRecipes($pdo);
?>



<h1>Recettes !</h1>

<?php

if (isLoged())
{
    echo $_SESSION['user']['user_name'];
    echo '<a href="logout_action.php" id="logout">Logout</a>';
    displayRecipes($recipes);
}
else
{
    // sign in + login.
    echo '<a href="register.php" id="register">Sign in</a>';
    echo '<a href="login.php" id="login">Login</a>';
}


