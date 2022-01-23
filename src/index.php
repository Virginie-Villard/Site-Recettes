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
$query = 'SELECT * FROM recipes';
$statement = $pdo->prepare($query);
$statement->execute();
$recipes = $statement->fetchAll();

// Fonction qui affiche le nom d'une recette
function displayRecipe($recipe)
{
    echo "<h2>" . $recipe["title"] . "</h2>";
    echo "<p>" . $recipe["description"] . "</p>";
}

// On affiche chaque recette une à une
foreach ($recipes as $recipe)
{
    displayRecipe($recipe);
}
?>