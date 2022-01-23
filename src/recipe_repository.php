<?php

/**
 * Fetch all recipes
 * @param PDO $pdo
 * @return array|false
 */
function fetchAllRecipes(PDO $pdo): array
{
    $query = 'SELECT * FROM recipes INNER JOIN users ON recipes.user_id = users.id';
    $statement = $pdo->prepare($query);
    $statement->execute();
    return $statement->fetchAll();
}