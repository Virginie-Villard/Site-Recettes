<h1>Recettes !</h1>
<?php

// https://dev.to/truthseekers/setup-a-basic-local-php-development-environment-in-docker-kod  (Mise en place du container Docker)
// https://hub.docker.com/_/phpmyadmin  (pour installer phpmyadmin)

$pdo = new PDO('mysql:host=db;dbname=recipes;charset=utf8', 'root', 'password');
