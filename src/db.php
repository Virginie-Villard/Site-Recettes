<?php

/**
 * Retourne une connexion PDO à la BDD
 * @return PDO
 */
function connect(): PDO
{
    try
    {
        return new PDO('mysql:host=db;dbname=recipes;charset=utf8',
            'root',
            'password',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    catch (Exception $e)
    {
        die('Error : ' . $e->getMessage());
    }
}
