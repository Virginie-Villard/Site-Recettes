
<?php

// https://dev.to/truthseekers/setup-a-basic-local-php-development-environment-in-docker-kod  (Mise en place du container Docker)
// https://hub.docker.com/_/phpmyadmin  (pour installer phpmyadmin)

require_once('db.php');
require_once('recipe_repository.php');
require_once('recipe_display.php');

$pdo = connect();
$recipes = fetchAllRecipes($pdo);
?>

<h1>Recettes !</h1>

<?php

displayRecipes($recipes);

include('register.php');
