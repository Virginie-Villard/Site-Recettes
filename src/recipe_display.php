<?php

/**
 * @param array $recipe
 * @return void
 */
function displayRecipe(array $recipe): void
{
    echo "<h2>" . $recipe["title"] . "</h2>";
    echo "<p>" . $recipe["description"] . "</p>";
    echo "<p>" . $recipe["user_name"] . "</p>";
}

/**
 * @param array $recipes
 * @return void
 */
function displayRecipes(array $recipes): void
{
    foreach ($recipes as $recipe)
    {
        displayRecipe($recipe);
    }
}

