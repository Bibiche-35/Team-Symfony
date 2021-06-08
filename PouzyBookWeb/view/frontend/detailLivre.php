<!-- Ceci est la Vue de la page d'accueil. Elle affiche la page : Affichage -->
<?php $title = 'Détail d\'un livre'; ?>

<?php ob_start(); ?><main class="container">
    <main class="container">
        <div class="lead"><h1>Le détail d'un livre :</h1>
            <div class="">
                <table class="tableau-style">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Référence ISBN</th>
                        <th scope="col">Nbre pages</th>
                        <th scope="col">Editeur</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Année</th>
                        <th scope="col">Langue</th>
                        <th scope="col">Format</th>
                    </tr>
                </thead>
                <tbody>                   
                    <tr>   
                        <td><?= $postLivre['id'] ;?></td>
                        <td><?= $postLivre['titre'] ;?></td>
                        <td><?= $postLivre['auteur'];?> </td>
                        <td><?= $postLivre['ref'];?></td>
                        <td><?= $postLivre['nbrPages'];?></td>
                        <td><?= $postLivre['edition'];?> </td>
                        <td><?= $postLivre['genre'];?></td>
                        <td><?= $postLivre['anneeEdition'];?></td>
                        <td><?= $postLivre['langue'];?> </td>
                        <td><?= $postLivre['format'];?></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
        <div class="lead">Le propriétaire du livre :
            <div class="">
                <table class="tableau-style">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Pseudonyme</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Mail</th>
                    </tr>
                </thead>
                <tbody>                   
                    <tr>   
                        <td><?= $postLivre['idProprietaire'];?> </td>
                        <td><?= $postLivre['utilisateurProprietaire'];?> </td>
                        <td><?= $postLivre['nomProprietaire'];?> </td>
                        <td><?= $postLivre['prenomProprietaire'];?></td>
                        <td><?= $postLivre['mailProprietaire'];?></td>
                    </tr>
                </tbody>
                </table>
            </div>
        <div class="lead">L'emprunteur du livre :
            <div class="">
                <table class="tableau-style">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Pseudonyme</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Mail</th>
                    </tr>
                </thead>
                <tbody>                   
                    <tr>   
                        <td><?= $postEmprunteurLivre['idEmprunteur'];?> </td>
                        <td><?= $postEmprunteurLivre['utilisateurEmprunteur'];?> </td>
                        <td><?= $postEmprunteurLivre['nomEmprunteur'];?> </td>
                        <td><?= $postEmprunteurLivre['prenomEmprunteur'];?></td>
                        <td><?= $postEmprunteurLivre['mailEmprunteur'];?></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </main>  

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>  
   
<?php            
        if ($postLivre['dateEmprunt_fr'] == 0) {
            if ($postLivre['utilisateurProprietaire'] == ($_SESSION['utilisateur'])) {
                echo "le livre t'appartient tu ne peux pas l'emprunter";               
            }
            else {
                echo "le livre peut être emprunté par n'importe qui"; 
                ?> 
                </br></br><a href="accueil.php?action=empruntLivre&amp;id=<?= $postLivre['id'] ?>&amp;emprunteur=<?= ($_SESSION['utilisateur']) ?>" class="myButton">Emprunter le livre</a>
                <?php
            }
        }
        elseif ($postLivre['dateEmprunt_fr'] !== 0) {
            if ($postEmprunteurLivre['utilisateurEmprunteur'] == ($_SESSION['utilisateur'])) {
                echo "le ".$postLivre['dateEmprunt_fr'].", le livre a été emprunté par moi et peut être retourné";   
                ?> 
                </br></br><a href="accueil.php?action=retourLivre&amp;id=<?= $postLivre['id'] ?>" class="myButton">Retourner le livre</a>
                <?php             
            }
            else {
                echo "le livre a été emprunté par quelqu'un d'autre que moi, je ne peux donc pas l'emprunter ni le retourner";
            }
        }          
?>


 
