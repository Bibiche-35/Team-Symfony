<?php

// controller de connexion (si pseudo inexistant/créé et mot de passe) : nécessité d'un utilisateur avec mot de passe --> associé à la page login.php

require '../inc/db.php';

session_start();
//print_r($_POST);
// die;

if (isset($_POST['username']) && isset($_POST['password']))
{

    $dbConnexion = new DB ;
    $pdo = $dbConnexion->getPdo();

    //print_r($_POST);
    //die;  // Permet de rentrer et d'arrêter le script afin qu'il s'éxécute jusqu'à ce bout de code

    if($_POST['username']!=="" && $_POST['password']!==""){

        $pdoConnexionSecured = $pdo->prepare("SELECT * FROM administres WHERE `utilisateur`=:name AND `motDePasse`=:password;");
        $pdoConnexionSecured->bindValue(':name', $_POST['username']);
        $pdoConnexionSecured->bindValue(':password', $_POST['password']); 
        $pdoConnexionSecured->execute();        
        $result = $pdoConnexionSecured->fetch(PDO::FETCH_ASSOC);

        $pdoConnexionSecured1 = $pdo->prepare("SELECT * FROM administres WHERE `utilisateur`=:name");
        $pdoConnexionSecured1->bindValue(':name', $_POST['username']);
        $pdoConnexionSecured1->execute();        
        $result1 = $pdoConnexionSecured1->fetch(PDO::FETCH_ASSOC);

        //var_dump($result1['utilisateur']);
        //var_dump($_POST['username']);
        //die;
        if ($result != 0) {
            $_SESSION['utilisateur'] = $result['utilisateur'];
            var_dump($_SESSION['utilisateur']);
            //die;
            header('Location: ../accueil.php');
        } 
        else if ($result1 != 0 && ($_POST['username'] == $result1['utilisateur'])) {
                header('Location: ../index.php?erreur=2');
        }
        else {
                header('Location: ../index.php?erreur=3');
        } 
          
    } else {
            header('Location: ../index.php?erreur=1');
    }
} 
else {
    header('Location: ../index.php');
}