<?php
session_start();

// https://dev.to/truthseekers/setup-a-basic-local-php-development-environment-in-docker-kod  (Mise en place du container Docker)
// https://hub.docker.com/_/phpmyadmin  (pour installer phpmyadmin)

require_once('db.php');
require_once('recipe_repository.php');
require_once('recipe_display.php');

$pdo = connect();
$recipes = fetchAllRecipes($pdo);
?>



<h1>Recettes !</h1>

<a href="login.php" id="login">Login</a>
<a href="logout_action.php" id="logout">Logout</a>

<?php
echo $_SESSION['user']['user_name'];
displayRecipes($recipes);

include('register.php');
