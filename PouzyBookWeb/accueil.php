<!-- Ceci est le routeur : Son objectif va être d'appeler le bon contrôleur -->
<!-- (on dit qu'il route les requêtes) -->

<?php
require('controller/livres.php');
require('controller/administres.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listLivresNonConnecte') {
            livresNonConnecte($_GET['emprunteur']);
        }
        elseif ($_GET['action'] == 'livre') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                detailLivre($_GET['id']);
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de livre envoyé');
            }
        }
        elseif ($_GET['action'] == 'listLivresEmpruntes') {
            livresEmpruntes($_GET['emprunteur']);    
        }
        elseif ($_GET['action'] == 'listLivresProprietaire') {
            livresProprietaire($_GET['emprunteur']);    
        }
        elseif ($_GET['action'] == 'retourLivre') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                retourLivreEmprunte($_GET['id']);
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de livre envoyé');
            }  
        }
        elseif ($_GET['action'] == 'empruntLivre') {
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                empruntLivre($_GET['id'], $_GET['emprunteur']);
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de livre envoyé');
            }  
        }
        elseif ($_GET['action'] == 'enSavoirPlus') {
            require('view/frontend/enSavoirPlus.php');
        }
        elseif ($_GET['action'] == 'contact') {
            require('view/frontend/contact.php');
        }
        elseif ($_GET['action'] == 'mentionsLegales') {
            require('view/frontend/mentionsLegales.php');
        }
        elseif ($_GET['action'] == 'monCompte') {
            detailCompte($_GET['emprunteur']);    
        }
        elseif ($_GET['action'] == 'modifierMonCompte') {
            if (isset($_GET['emprunteur'])) {
                updateMonCompte($_GET['emprunteur'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['mail']);
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de livre envoyé');
            } 
        }
    }
    else {
        listlivres();
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}