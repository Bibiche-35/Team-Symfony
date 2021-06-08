<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    <link rel="stylesheet" href="public/CSS/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
  <header>
    <img src="public/images/logoPouzyBook.png" alt=""></br>
    <li class="title" href="index.php">Page de connexion/Inscription</li>
    <li><?php if (empty($_SESSION)) : ?>
        <h1>Vous n'êtes pas encore autorisé à voir le site</h1>        
        <?php else :?>
        <div class="content-message">
            <h1>Bonjour <?=$_SESSION['name'];?></h1>
            <p> bienvenue, vous êtes connecté </p>
        </div>
        <?php endif;
        // pour changer la durée d'une session, ca se passe dans le php.ini et c'est la fonction session.gc_maxlifetime . cf toutes les fonctions de config des sessions ici dans la documentation : https://www.php.net/manual/fr/session.configuration.php#ini.session.gc-maxlifetime
        ?>
    </li>
  </header>
    <div id="container">
      <form action="controller/loginController.php" method="POST">
          </br><h1>Formulaire de Connexion</h1></br>
            <label><strong>Nom d'utilisateur</strong></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required></br>
            <label><strong>Mot de passe</strong></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required></br></br>
            <input type="submit" class="myButton" value="LOGIN"></br></br></br>
            <?php 
            if (isset($_GET['erreur'])) {
              $erreur = $_GET['erreur'];
              if($erreur == 1){
                echo "<p style='color: red'> Nom d'utilisateur ou mot de passe vide</p>";
              }
              else if($erreur == 2){
                echo "<p style='color: red'> Le mot de passe ne correspond pas avec l'utilisateur</p>";
              }
              else if($erreur == 3){
                echo "<p style='color: red'> L'utilisateur n'est pas existant dans la base de données, Merci de remplir le formulaire d'inscription</p>";
              }
            }
            ?>
        </form></br>
        <form action="controller/inscriptionController.php" method="POST">
            <h1>Inscription</h1></br>
            <label><strong>Nom d'utilisateur</strong></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required></br>
            <label><strong>Mot de passe</strong></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required></br>
            <label><strong>Vérifier votre mot de passe</strong></label>
            <input type="password" placeholder="Entrer à nouveau le mot de passe" name="password-check" required></br></br>
            <input type="submit" class="myButton"  value="INSCRIPTION"></br></br></br>
            <?php 
            if (isset($_GET['erreur'])) {
              $erreur = $_GET['erreur'];
              if($erreur == 4){
                echo "<p style='color: red'> Une erreur est survenue, nous n'avons pas pu vous enregister, merci de recommencer</p>";
              }
              else if($erreur == 5){
                echo "<p style='color: red'> Les mots de passe ne sont pas identiques</p>";
              }
              else if($erreur == 6){
                echo "<p style='color: red'> Nom d'utilisateur ou mot de passe viden</p>";
              }
            }
            ?>
        </form>
    </div>
</body>
</html>
