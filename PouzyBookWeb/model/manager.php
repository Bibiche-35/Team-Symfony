<?php

namespace PouzyBookWeb\Model;

class Manager 
{
    // Nouvelle fonction qui nous permet d'éviter de répéter du code
    // connexion à la base de données avec les blocs try/catch
    protected function dbConnect()
    {
            $db = new \PDO('mysql:host=localhost;dbname=pouzybook;charset=utf8', 'root', '');
            return $db;
    }
}