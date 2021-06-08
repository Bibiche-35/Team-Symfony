<?php $title = 'monCompte'; ?>

<?php ob_start(); ?>
<main class="container">


</br>
    <a class="myButton" href="public/download/AppliPouzy.rar" download>Télécharger l'application en "Local"</a>

    </br></br></br>
<p class="lead"><h1>Les informations de mon compte :</h1></p></br>
<form action="accueil.php?action=modifierMonCompte&amp;emprunteur=<?= $postCompte['utilisateur'] ?>" method="post">
    <div>
        <p>idUtilisateur : <?= $postCompte['idUtilisateur'] ?></p>
        <p>Utilisateur : <?= $postCompte['utilisateur'] ?></br>
        <label for="nom">Nom : </label><input id="nom" type="text" name="nom" value="<?= $postCompte['nom'] ?>"></br>
        <label for="prenom">Prénom : </label><input id=prenom" type="text" name="prenom" value="<?= $postCompte['prenom'] ?>"></br>
        <label for="adresse">Adresse Postale : </label><input id=adresse" type="text" name="adresse" value="<?= $postCompte['adresse'] ?>"></br>
        <label for="mail">Mail : </label><input id=mail" type="text" name="mail" value="<?= $postCompte['mail'] ?>"></br>
    </div></br>
    <div>
        <input class="myButton" type="submit" value="Enregistrer les modifications" />
    </div>
</form>


</main>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>