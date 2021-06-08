<!-- Ceci est le controleur : on y regroupe nos fonctions -->

<?php
// Chargement des classes
require_once('model/LivresManager.php');

// controller pour la gestion des livres et extrait la liste des livres --> Function activée depuis la page d'accueil ou lien "Bibliotheque" sur le header
function listLivres()
{
    $postManager = new \PouzyBookWeb\model\LivresManager(); // Création d'un objet
    $posts = $postManager->listeLivres(); // Appel d'une fonction de cet objet

    require('view/frontend/listLivres.php');
}

// controller pour afficher le détail d'un livre sélectionné --> Function activée depuis la bilbiothèque et lien hypertext du livre pour voir le détail
function detailLivre($livreId)
{
    $postManager1 = new \PouzyBookWeb\model\LivresManager(); // Création d'un objet
    $postLivre = $postManager1->detailLivre($livreId); // Appel d'une fonction de cet objet

    $postManager2 = new \PouzyBookWeb\model\LivresManager(); // Création d'un objet
    $postEmprunteurLivre = $postManager2->detailEmprunteur($livreId); // Appel d'une fonction de cet objet

    require('view/frontend/detailLivre.php');
}

// controller pour afficher la liste des livres empruntés (associé à l'utilisateur connecté) --> Function activée depuis lien "Mes livres empruntés" sur le header
function livresEmpruntes($Emprunteur)
{
    $postManager = new \PouzyBookWeb\model\LivresManager(); // Création d'un objet
    $postLivresEmpruntes = $postManager->listeLivresEmpruntes($Emprunteur); // Appel d'une fonction de cet objet
    
    require('view/frontend/listLivresEmpruntes.php');
}

// controller pour afficher la liste des livres empruntés (associé à l'utilisateur connecté) --> Function activée depuis lien "Mes livres empruntés" sur le header
function livresProprietaire($Emprunteur)
{
    $postManager = new \PouzyBookWeb\model\LivresManager(); // Création d'un objet
    $postLivresEmpruntes = $postManager->listeLivresProprietaire($Emprunteur); // Appel d'une fonction de cet objet
    
    require('view/frontend/listLivresProprietaire.php');
}

// controller pour afficher la liste des livres empruntés (associé à l'utilisateur connecté) --> Function activée depuis lien "Mes livres empruntés" sur le header
function livresNonConnecte($Emprunteur)
{
    $postManager = new \PouzyBookWeb\model\LivresManager(); // Création d'un objet
    $posts = $postManager->listeLivresNonConnecte($Emprunteur); // Appel d'une fonction de cet objet
    
    require('view/frontend/listLivres.php');
}

// controller pour retourner un livre emprunté (associé à l'utilisateur connecté) --> Function activée depuis page "Le détail d'un livre", bouton "Retourner le livre" si les conditions sont remplies
function retourLivreEmprunte($livreId)
{
    $postManager1 = new \PouzyBookWeb\model\LivresManager(); // Création d'un objet
    $postManager1->retourLivreEmprunte($livreId); // Appel d'une fonction de cet objet
    $postManager2 = new \PouzyBookWeb\model\LivresManager(); // Création d'un objet
    $postLivre = $postManager2->detailLivre($livreId); // Appel d'une fonction de cet objet
    $postManager3 = new \PouzyBookWeb\model\LivresManager(); // Création d'un objet
    $postEmprunteurLivre = $postManager3->detailEmprunteur($livreId); // Appel d'une fonction de cet objet
    require('view/frontend/detailLivre.php');
}

// controller pour emprunter un livre disponible (associé à l'utilisateur connecté) --> Function activée depuis page "Le détail d'un livre", bouton "Emprunté le livre" si les conditions sont remplies
function empruntLivre($livreId, $emprunteur)
{
    $postManager1 = new \PouzyBookWeb\model\LivresManager(); // Création d'un objet
    $postManager1->empruntLivre($livreId, $emprunteur); // Appel d'une fonction de cet objet
    $postManager2 = new \PouzyBookWeb\model\LivresManager(); // Création d'un objet
    $postLivre = $postManager2->detailLivre($livreId); // Appel d'une fonction de cet objet
    $postManager3 = new \PouzyBookWeb\model\LivresManager(); // Création d'un objet
    $postEmprunteurLivre = $postManager3->detailEmprunteur($livreId); // Appel d'une fonction de cet objet
    require('view/frontend/detailLivre.php');
}

