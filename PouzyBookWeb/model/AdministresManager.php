<?php

namespace PouzyBookWeb\Model; // La classe sera dans ce namespace

require_once("model/Manager.php");

// Classe pour y regrouper toutes nos fonctions qui concernent les livres
class AdministresManager extends Manager
{
    
    // fonction pour récupérer le détail d'un compte en fonction du nom de l'utilisateur ('utilisateur' sur la base de donnée) par exemple "malo" (et non 'idUtilisateur' sur la base de donnée)
    public function detailCompte($emprunteur)
    {
        // Connexion à la base de données rappelle de la fonction
        $db = $this->dbConnect();
            
        // On récupère tous les livres dans la bibliothèque 
        $req = $db->prepare('SELECT * FROM administres WHERE utilisateur = ?');
        $req->execute(array($emprunteur));
        $idEmprunteur = $req->fetch();
        return $idEmprunteur;
    }

    // fonction pour modifier les informations du compte de l'administré en fonction des informations présentes sur la page moncompte.php issues des données sur le formulaire.
    public function updateInfosCompte($utilisateur, $nom, $prenom, $adresse, $mail)
    {
        // Connexion à la base de données rappelle de la fonction
        $db = $this->dbConnect();
            
        $req = $db->prepare('UPDATE administres SET nom = ?, prenom = ?, adresse = ?, mail = ? WHERE utilisateur = ?');
        $postCompte = $req->execute(array($nom, $prenom, $adresse, $mail, $utilisateur));
            
        return $postCompte;
    }
}