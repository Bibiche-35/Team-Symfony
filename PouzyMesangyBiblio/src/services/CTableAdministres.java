/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

import entities.Administre;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author gimli
 */
public class CTableAdministres {

    protected CBDD bdd;

    public CTableAdministres(CBDD bdd) {
        this.bdd = bdd;
    }

    public Administre convertir_RS_Administre(ResultSet rs) {
        try {
            String idUtilisateur = rs.getString(1);
            String utilisateur = rs.getString(2);
            String motDePasse = rs.getString(3);
            String nom = rs.getString(4);
            String prenom = rs.getString(5);
            String adresse = rs.getString(6);
            String mail = rs.getString(7);

            Administre administre = new Administre(idUtilisateur, utilisateur, motDePasse, nom, prenom, adresse, mail);

            return administre;
        } catch (SQLException ex) {
            Logger.getLogger(CTableAdministres.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }

    public Administre lireAdministre(int id) {
        Administre administre = null;
        if (bdd.connecter() == true) {
            System.out.println("Connexion OK");
            ResultSet rs = bdd.executerRequeteQuery("select * from administres  WHERE `administres`.`idUtilisateur` = " + id);
            try {
                if (rs.next()) {
                    administre = convertir_RS_Administre(rs);
                }
            } catch (SQLException ex) {
                Logger.getLogger(CBDD.class.getName()).log(Level.SEVERE, null, ex);
            }
            bdd.deconnecter();
        } else {
            System.out.println("Connexion KO");
        }
        return administre;
    }

    public Administre lireAdministreUserMdp(String user, String mdp) {
        Administre administre = null;
        if (bdd.connecter() == true) {
            System.out.println("Connexion OK");
            ResultSet rs = bdd.executerRequeteQuery("select * from administres  WHERE `administres`.`utilisateur` = '"
            + user + "' and `administres`.`motDePasse` = '" + mdp+"';");
            try {
                if (rs.next()) {
                    administre = convertir_RS_Administre(rs);
                }
            } catch (SQLException ex) {
                Logger.getLogger(CBDD.class.getName()).log(Level.SEVERE, null, ex);
            }
            bdd.deconnecter();
        } else {
            System.out.println("Connexion KO");
        }
        return administre;
    }

    public ArrayList<Administre> lireAdministre() {

        if (bdd.connecter() == true) {
            ArrayList<Administre> listeAdministre = new ArrayList();
            ResultSet rs = bdd.executerRequeteQuery("SELECT * FROM administres");
            try {
                while (rs.next()) {
                    Administre administre = convertir_RS_Administre(rs);
                    listeAdministre.add(administre);
                }
            } catch (SQLException ex) {
                Logger.getLogger(CBDD.class.getName()).log(Level.SEVERE, null, ex);
            }
            bdd.deconnecter();
            return listeAdministre;
        } else {
            System.out.println("Connexion KO");
        }
        return null;
    }
    
    

    public int insererAdministre(Administre administre) {
        int res = -1;
        if (bdd.connecter() == true) {
            String req = "INSERT INTO `administres` (`utilisateur`, `motDePasse`, `nom`,"
                    + " `prenom`, `adresse`, `mail`) "
                    + "VALUES ('" + CBDD.pretraiterChaineSQL(administre.getUtilisateur())
                    + "', '" + CBDD.pretraiterChaineSQL(administre.getMotDePasse())
                    + "', '" + CBDD.pretraiterChaineSQL(administre.getNom())
                    + "', '" + CBDD.pretraiterChaineSQL(administre.getPrenom())
                    + "', '" + CBDD.pretraiterChaineSQL(administre.getAdresse())
                    + "', '" + CBDD.pretraiterChaineSQL(administre.getMail())
                    + "');";

            res = bdd.executerRequeteUpdate(req);
            bdd.deconnecter();
        } else {
            System.out.println("Connexion KO");
        }
        return res;
    }

    public int supprimerAdministre(Administre administre) {
        int res = -1;
        if (bdd.connecter() == true) {
            String req = "DELETE FROM `administres` WHERE `idUtilisateur` = " + administre.getIdUtilisateur();
            res = bdd.executerRequeteUpdate(req);
            bdd.deconnecter();
        } else {
            System.out.println("Connexion KO");
        }
        return res;
    }

    public int supprimerAdministre(String idUtilisateur) {
        int res = -1;
        if (bdd.connecter() == true) {
            String req = "DELETE FROM `administres` WHERE `idUtilisateur` = " + idUtilisateur;
            res = bdd.executerRequeteUpdate(req);
            bdd.deconnecter();
        } else {
            System.out.println("Connexion KO");
        }
        return res;
    }

    public int modifierAdministre(Administre administre) {
        int res = -1;
        if (bdd.connecter() == true) {
            String req = "UPDATE `administres` SET "
                    + "`utilisateur` = '"
                    + CBDD.pretraiterChaineSQL(administre.getUtilisateur())
                    + "', "
                    + "`motDePasse` = '"
                    + CBDD.pretraiterChaineSQL(administre.getMotDePasse())
                    + "', "
                    + "`nom` = '"
                    + CBDD.pretraiterChaineSQL(administre.getNom())
                    + "', "
                    + "`prenom` = '"
                    + CBDD.pretraiterChaineSQL(administre.getPrenom())
                    + "', "
                    + "`adresse` = '"
                    + CBDD.pretraiterChaineSQL(administre.getAdresse())
                    + "', "
                    + "`mail` = '"
                    + CBDD.pretraiterChaineSQL(administre.getMail())
                    + "' WHERE `administres`.`idUtilisateur` = "
                    + CBDD.pretraiterChaineSQL(administre.getIdUtilisateur())
                    + ";";
            res = bdd.executerRequeteUpdate(req);
            bdd.deconnecter();
        } else {
            System.out.println("Connexion KO");
        }
        return res;
    }

    public static void main(String[] args) {
        CBDD bdd = new CBDD(new CParametresStockageBDD("parametresBdd.properties"));
        CTableAdministres table = new CTableAdministres(bdd);

        /* fonctionnel : Permet d'ajouter un administre */
//        String utilisateur = "malo";
//        String motDePasse = "malobtssio";
//        String nom = "LERIN";
//        String prenom = "MAlo";
//        String adresse = "26 Hameau du chêne";
//        String mail = "malo.lerin@hotmail.fr";
//        Administre administreTest = new Administre(utilisateur, motDePasse, nom, prenom, adresse, mail);
//        table.insererAdministre(administreTest);

        /* fonctionnel : Permet de supprimer un administré depuis l'id */
//        table.supprimerLivre(new Livre("8"));

     /* fonctionnel : Permet d'afficher un administré avec un id spécifique */
       // Administre administre = table.lireAdministre(2);
        //administre.afficher();

        /* fonctionnel : Permet d'afficher la bibiothèque des administrés */
//        for (Administre administre : table.lireAdministres()) {
//            System.out.println("--");
//            administre.afficher();
//        }
    }
}
