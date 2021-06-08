<?php $title = 'Contact'; ?>

<?php ob_start(); ?>
<main class="container">
</br><p class="lead"><h1>Les informations de mon compte:</h1></p></br>

<form action="accueil.php" method="post">
    <form>
        <div>
            <label for="nom">Nom : </label>
            <input type="text" type="text" name="nom" placeholder="Votre Nom"></br>
            <label for="nom">E-mail : </label>
            <input type="text" type="text" name="e-mail" placeholder="Email"></br>
            <label for="nom">Sujet : </label>
            <input type="textarea" type="text" name="sujet" placeholder="Quel est votre sujet ?"></br>
            <textarea class="form-control" rows="5" cols="33"></textarea></br></br>
        <button type="submit" class="myButton">Envoyez</button>
        </div>
    </form>
</main>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>