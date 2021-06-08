<?php

namespace PouzyBookWeb\Model; // La classe sera dans ce namespace

require_once("model/Manager.php");

// class pour y regrouper toutes nos fonctions qui concernent les livres
class LivresManager extends Manager
{
    
    // fonction pour récupérer toutes les informations de tous les livres et de tous les administrés
    public function listeLivres()
    {
        // Connexion à la base de données rappelle de la fonction
        $db = $this->dbConnect();
    
        // On récupère tous les livres dans la bibliothèque 
        $req = $db->query('SELECT id, titre, auteur, ref, nbrPages, edition, genre, anneeEdition, langue, format, DATE_FORMAT(dateEmprunt, \'%d/%m/%Y\') AS dateEmprunt_fr, idEmprunteur FROM livres INNER JOIN auteur ON idAuteurLivres = idAuteur INNER JOIN edition ON idEditionLivres = idEdition INNER JOIN genre ON idGenreLivres = idGenre INNER JOIN format ON idFormatLivres = idFormat LEFT JOIN emprunt ON id = idLivreEmprunte');
    
        return $req;
    }

    // fonction pour récupérer toutes les informations d'un livre en fonction de son id
    public function detailLivre($id)
    {
        // Connexion à la base de données rappelle de la fonction
        $db = $this->dbConnect();
        
        // On récupère tous les livres dans la bibliothèque 
        $req = $db->prepare('SELECT id, titre, auteur, ref, nbrPages, edition, genre, anneeEdition, langue, format, DATE_FORMAT(dateEmprunt, \'%d/%m/%Y\') AS dateEmprunt_fr, idUtilisateur AS idProprietaire, utilisateur AS utilisateurProprietaire, nom AS nomProprietaire, prenom AS prenomProprietaire, mail AS mailProprietaire FROM livres INNER JOIN auteur ON idAuteurLivres = idAuteur INNER JOIN edition ON idEditionLivres = idEdition INNER JOIN genre ON idGenreLivres = idGenre INNER JOIN format ON idFormatLivres = idFormat LEFT JOIN administres ON idProprietaire = idUtilisateur LEFT JOIN emprunt ON id = idLivreEmprunte WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();

        return $post;
        }

    // fonction pour récupérer le détail de l'emprunteur d'un livre en fonction de l'idLivreEmprunte présent dans table 'emprunt' : Jointure LEFT JOIN afin d'afficher meme les livres non empruntés (afffichage NULL si livre non emprunté)
    public function detailEmprunteur($id)
    {
        // Connexion à la base de données rappelle de la fonction
        $db = $this->dbConnect();
        
        // On récupère tous les livres dans la bibliothèque 
        $req = $db->prepare('SELECT idUtilisateur AS idEmprunteur, utilisateur AS utilisateurEmprunteur, nom AS nomEmprunteur, prenom AS prenomEmprunteur, mail AS mailEmprunteur FROM administres LEFT JOIN emprunt ON idEmprunteur = idUtilisateur WHERE idLivreEmprunte = ?');
        $req->execute(array($id));
        $post = $req->fetch();

        return $post;
        }

    // fonction pour récupérer la liste des livres empruntés en fonction de l'idAdministre : Jointure LEFT JOIN avec table emprunt
    public function listeLivresEmpruntes($Emprunteur)
    {
        // Connexion à la base de données rappelle de la fonction
        $db = $this->dbConnect();
        
        // On récupère tous les livres dans la bibliothèque 
        $req = $db->prepare('SELECT id, titre, auteur, ref, nbrPages, edition, genre, anneeEdition, langue, format, DATE_FORMAT(dateEmprunt, \'%d/%m/%Y\') AS dateEmprunt_fr, idEmprunteur, idUtilisateur, utilisateur FROM livres INNER JOIN auteur ON idAuteurLivres = idAuteur INNER JOIN edition ON idEditionLivres = idEdition INNER JOIN genre ON idGenreLivres = idGenre INNER JOIN format ON idFormatLivres = idFormat LEFT JOIN emprunt ON id = idLivreEmprunte INNER JOIN administres ON idEmprunteur = idUtilisateur WHERE utilisateur = ?');
        $req->execute(array($Emprunteur));
        return $req;
    }    

    // fonction pour récupérer la liste des livres empruntés en fonction de l'idAdministre : Jointure LEFT JOIN avec table emprunt
    public function listeLivresProprietaire($Emprunteur)
    {
        // Connexion à la base de données rappelle de la fonction
        $db = $this->dbConnect();
            
        // On récupère tous les livres dans la bibliothèque 
        $req = $db->prepare('SELECT id, titre, auteur, ref, nbrPages, edition, genre, anneeEdition, langue, format, idProprietaire FROM livres INNER JOIN auteur ON idAuteurLivres = idAuteur INNER JOIN edition ON idEditionLivres = idEdition INNER JOIN genre ON idGenreLivres = idGenre INNER JOIN format ON idFormatLivres = idFormat INNER JOIN administres ON idProprietaire = idUtilisateur WHERE utilisateur = ?');
        $req->execute(array($Emprunteur));
        return $req;
    } 

    // fonction pour récupérer la liste des livres empruntés en fonction de l'idAdministre : Jointure LEFT JOIN avec table emprunt
    public function listeLivresNonConnecte($Emprunteur)
    {
        // Connexion à la base de données rappelle de la fonction
        $db = $this->dbConnect();
            
        // On récupère tous les livres dans la bibliothèque 
        $req = $db->prepare('SELECT id, titre, auteur, ref, nbrPages, edition, genre, anneeEdition, langue, format, DATE_FORMAT(dateEmprunt, \'%d/%m/%Y\') AS dateEmprunt_fr,idProprietaire FROM livres INNER JOIN auteur ON idAuteurLivres = idAuteur INNER JOIN edition ON idEditionLivres = idEdition INNER JOIN genre ON idGenreLivres = idGenre INNER JOIN format ON idFormatLivres = idFormat INNER JOIN administres ON idProprietaire = idUtilisateur LEFT JOIN emprunt ON id = idLivreEmprunte WHERE utilisateur != ?');
        $req->execute(array($Emprunteur));
        return $req;
    }    
    
    // fonction pour retourner un livre emprunté (la function supprime les informatiosn depuis la table emprunt) en fonction de l'id du livre.
    public function retourLivreEmprunte($id)
    {
        // Connexion à la base de données rappelle de la fonction
        $db = $this->dbConnect();
            
        // On récupère tous les livres dans la bibliothèque 
        $req = $db->prepare('DELETE FROM emprunt WHERE `idLivreEmprunte` = ? ');
        $req->execute(array($id));
    }  
    
    // fonction pour emprunté un livre disponible (la function ajoute les informatiosn dans la table emprunt en fonction de l'id du livre et l'id de l'adminsitre (emprunteur)
    public function empruntLivre($idLivre, $emprunteur)
    {
        // Connexion à la base de données rappelle de la fonction
        $db = $this->dbConnect();
            
        // On récupère tous les livres dans la bibliothèque 
        $req1 = $db->prepare('SELECT idUtilisateur FROM administres WHERE utilisateur = ?');
        $req1->execute(array($emprunteur));
        $idEmprunteur = $req1->fetch();

        $req2 = $db->prepare('INSERT INTO emprunt(dateEmprunt, idLivreEmprunte, idEmprunteur) VALUES(NOW(), ?, ?)');
        
        $affectedLines = $req2->execute(array($idLivre, $idEmprunteur['idUtilisateur']));
    }  
    
}