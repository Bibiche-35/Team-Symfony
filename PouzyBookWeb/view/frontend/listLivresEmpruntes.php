<!-- Ceci est la Vue de la page d'accueil. Elle affiche la page : Affichage -->
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<main class="container">
    <p class="lead"><h1>Mes livres empruntés :</h1></p></br>
        <div class="row">
            <div class="">
                <table class="tableau-style">
                <thead>
                    <tr>
                        <th scope="col">Fonction</th>
                        <th scope="col">id</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Référence ISBN</th>
                        <th scope="col">Nbre pages</th>
                        <th scope="col">Editeur</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Année</th>
                        <th scope="col">Langue</th>
                        <th scope="col">Format</th>
                        <th scope="col">Date emprunt</th>
                    </tr>
                </thead>
                <tbody>           
                    <?php   
                        while ($data = $postLivresEmpruntes->fetch()) { 
                    ?> 
                        <tr>   
                            <td><a href="accueil.php?action=livre&amp;id=<?= $data['id'] ?>">Voir</a></td>
                            <td><?= $data['id'] ;?></td>
                            <td><?= $data['titre'] ;?></td>
                            <td><?= $data['auteur'];?> </td>
                            <td><?= $data['ref'];?></td>
                            <td><?= $data['nbrPages'];?></td>
                            <td><?= $data['edition'];?> </td>
                            <td><?= $data['genre'];?></td>
                            <td><?= $data['anneeEdition'];?></td>
                            <td><?= $data['langue'];?> </td>
                            <td><?= $data['format'];?></td>
                            <td><?= $data['dateEmprunt_fr'];?></td>
                        </tr>
                    <?php 
                        } 
                    ?>  
                </tbody>
                </table>
            </div>
        </div>
</main>
<?php
$postLivresEmpruntes->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>