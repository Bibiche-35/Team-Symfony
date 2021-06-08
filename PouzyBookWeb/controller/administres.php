<!-- Ceci est le controleur : on y regroupe nos fonctions -->

<?php
// Chargement des classes
require_once('model/AdministresManager.php');

// controller pour afficher le détail du compte de l'administré connecté --> Function activée depuis lien "Mon compte" sur le header
function detailCompte($emprunteur)
{
    $postManager = new \PouzyBookWeb\model\AdministresManager(); // Création d'un objet
    $postCompte = $postManager->detailCompte($emprunteur); // Appel d'une fonction de cet objet
    require('view/frontend/moncompte.php');
}

// controller pour modifier le détail du compte de l'administré connecté --> Function activée depuis lien "Mon compte" sur le header et attente des éléments à modifier directement sur le formulaire
function updateMonCompte($utilisateur, $nom, $prenom, $adresse, $mail)
{
    $postManager1 = new \PouzyBookWeb\model\AdministresManager(); // Création d'un objet
    $postCompte = $postManager1->updateInfosCompte($utilisateur, $nom, $prenom, $adresse, $mail);$postManager2 = new \PouzyBookWeb\model\AdministresManager(); // Création d'un objet
    $postCompte = $postManager2->detailCompte($utilisateur); // Appel d'une fonction de cet objet
    require('view/frontend/moncompte.php');
}


