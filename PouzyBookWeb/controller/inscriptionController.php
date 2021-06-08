<?php
// controller de nouvelle inscription (si pseudo inexistant) : nécessité d'un utilisateur et deux mots de passe identiques --> associé à la page login.php

require '../inc/db.php';

session_start();
//print_r($_POST);
//die;

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-check'])) {

    if ($_POST['username'] !== "" && $_POST['password'] !== "") {

        if ($_POST['password'] ===  $_POST['password-check']) {

            $dbConnexion = new DB;
            $pdo = $dbConnexion->getPdo();

            //print_r($_POST);
            // die;  // Permet de rentrer et d'arrêter le script afin qu'il s'éxécute jusqu'à ce bout de code

            $newUserName = $_POST['username'];
            $newPass = $_POST['password'];
            //var_dump($newUserName);
            //var_dump($newPass);

            $pdoConnexionSecured = $pdo->prepare("INSERT INTO administres (utilisateur, motDePasse) VALUES (:utilisateur, :motDePasse)");
            $pdoConnexionSecured->bindValue(':utilisateur', $newUserName);
            $pdoConnexionSecured->bindValue(':motDePasse', $newPass);
            $result = $pdoConnexionSecured->execute();
            var_dump($result);
            //die;

            if ($result != 0){
                $_SESSION['utilisateur'] = $newUserName;
                header('Location: ../accueil.php');
            } else {
                header('Location: ../index.php?erreur=4');
                // une erreur est survenue, nous n'avons pas pu vous enregister, merci de recommencer
            }
        } else {
            header('Location: ../index.php?erreur=5');
            // les mots de passe ne sont pas identiques
        }

    } else {
        header('Location: ../index.php/?erreur=6');
        // Nom d'utilisateur ou mot de passe vide
    }

} else {
    header('Location: ../index.php');
}