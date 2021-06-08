<?php

// TODO #1 créer un objet PDO permettant de se connecter à la base de données "book"
// et le stocker dans la variable $pdo

// Etape 1, je dois gérer la connection à ma base de données via l'instanciation d'une classe PD0 pour PHP DATA OBJECT

// Le dsn contient les informations requises pour se connecter => mysql c'est le driver ou pilote qui permet la commication avec le logiciel de base de données
// Le host : c'est l'adresse du serveur sur lequel est la base de données
// dbname : c'est le nom de la base de données avec laquelle le souhaite me connecter


// création d'un objet à partir de la classe PDO pour faire la connexion. Le tableau transmis est un moyen d'afficher les erreurs de connexion à la bdd si il y en a

class DB {

    private $pdo; 

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=pouzybook;charset=utf8';
        $user = 'root';
        $password = '';

        try {
            $pdoConnexion = new PDO(
                $dsn,
                $user,
                $password,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING

                )
                );
        } catch (PDOException $exception) {
            echo 'Connexion échouée : '. $exception->getMessage();
        }
        $this->pdo = $pdoConnexion;
    }

    public function getPdo() {
        return $this->pdo;
    }
}