<!-- On va créer un template (aussi appelé gabarit) de page. -->
<!-- On va y retrouver toute la structure de la page, avec des "trous" à remplir. -->

<?php 
session_start();
?>

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
    <?php include 'view/frontend/header.php'; ?>

    <p class="main"><?= $content ?></p>

    <?php include 'view/frontend/footer.php'; ?>
</body>
</html>