<h1>Recettes !</h1>
<?php

// https://dev.to/truthseekers/setup-a-basic-local-php-development-environment-in-docker-kod  (Mise en place du container Docker)
// https://hub.docker.com/_/phpmyadmin  (pour installer phpmyadmin)

try
{
    $pdo = new PDO('mysql:host=db;dbname=recipes;charset=utf8',
        'root',
        'password',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

// On récupère tout le contenu de la table recipes


function debug($value)
{
    echo "<pre>".print_r($value)."</pre>";
}

/**
 * Fetch all recipes
 * @param PDO $pdo
 * @return array|false
 */
function fetchAllRecipes(PDO $pdo)
{
    $query = 'SELECT * FROM recipes INNER JOIN users ON recipes.user_id = users.id';
    $statement = $pdo->prepare($query);
    $statement->execute();
    return $statement->fetchAll();
}

/**
 * @param $recipe
 * @return void
 */
function displayRecipe($recipe)
{
    echo "<h2>" . $recipe["title"] . "</h2>";
    echo "<p>" . $recipe["description"] . "</p>";
    echo "<p>" . $recipe["user_name"] . "</p>";
}

/**
 * @param array $recipes
 * @return void
 */
function displayRecipes($recipes)
{
    foreach ($recipes as $recipe)
    {
        displayRecipe($recipe);
    }
}


$recipes = fetchAllRecipes($pdo);
displayRecipes($recipes);

include_once('register.php');

?>