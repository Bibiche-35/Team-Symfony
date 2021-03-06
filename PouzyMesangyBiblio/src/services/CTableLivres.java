/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

import entities.Livre;
import entities.TableAnnexe;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author gimli
 */
public class CTableLivres {

    protected CBDD bdd;

    public CTableLivres(CBDD bdd) {
        this.bdd = bdd;
    }

    public Livre convertir_RS_Livre(ResultSet rs) {
        try {
            String id = rs.getString(1);
            String titre = rs.getString(2);
            String auteur = rs.getString(3);
            String ref = rs.getString(4);
            String nbrePages = rs.getString(5);
            String edition = rs.getString(6);
            String genre = rs.getString(7);
            String anneeEdition = rs.getString(8);
            String format = rs.getString(9);
            String idProprio = rs.getString(10);
            String langue = rs.getString(11);
            Livre livre = new Livre(id, titre, auteur, ref, nbrePages, edition, genre, anneeEdition, format, idProprio, langue);

            return livre;
        } catch (SQLException ex) {
            Logger.getLogger(CTableLivres.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }

    public Livre lireLivre(int id) {
        Livre livre = null;
        if (bdd.connecter() == true) {
            System.out.println("Connexion OK");
            ResultSet rs = bdd.executerRequeteQuery("select * from livres  WHERE `livres`.`id` = " + id);
            try {
                if (rs.next()) {
                    livre = convertir_RS_Livre(rs);
                }
            } catch (SQLException ex) {
                Logger.getLogger(CBDD.class.getName()).log(Level.SEVERE, null, ex);
            }
            bdd.deconnecter();
        } else {
            System.out.println("Connexion KO");
        }
        return livre;
    }

    public ArrayList<Livre> lireLivres() {

        if (bdd.connecter() == true) {
            ArrayList<Livre> listeLivres = new ArrayList();
            ResultSet rs = bdd.executerRequeteQuery("SELECT `id`,`titre`, `auteur`, `ref`,"
                    + " `nbrPages`, `edition`, `genre`, `anneeEdition`, `format`,`idProprietaire`,`langue`"
                    + " FROM livres, auteur, edition, genre, format"
                    + " WHERE livres.idAuteurLivres = auteur.idAuteur"
                    + " AND livres.idEditionLivres = edition.idEdition"
                    + " AND livres.idGenreLivres = genre.idGenre"
                    + " AND livres.idFormatLivres = format.idFormat");
            try {
                while (rs.next()) {
                    Livre livre = convertir_RS_Livre(rs);
                    listeLivres.add(livre);
                }
            } catch (SQLException ex) {
                Logger.getLogger(CBDD.class.getName()).log(Level.SEVERE, null, ex);
            }
            bdd.deconnecter();
            return listeLivres;
        } else {
            System.out.println("Connexion KO");
        }
        return null;
    }

    public ArrayList<Livre> lireLivresParID(String id) {

        if (bdd.connecter() == true) {
            ArrayList<Livre> listeLivres = new ArrayList();
            ResultSet rs = bdd.executerRequeteQuery("SELECT `id`,`titre`, `auteur`, `ref`,"
                    + " `nbrPages`, `edition`, `genre`, `anneeEdition`, `format`,`idProprietaire`,`langue`"
                    + " FROM livres, auteur, edition, genre, format"
                    + " WHERE livres.idAuteurLivres = auteur.idAuteur"
                    + " AND livres.idEditionLivres = edition.idEdition"
                    + " AND livres.idGenreLivres = genre.idGenre"
                    + " AND livres.idFormatLivres = format.idFormat");
            try {

                while (rs.next()) {

                    Livre livre = convertir_RS_Livre(rs);
                    livre.afficher();

                    if (livre.getIdProprio().equalsIgnoreCase(id)) {
                        listeLivres.add(livre);
                        System.out.println(listeLivres.size());
                    }

                }
            } catch (SQLException ex) {
                Logger.getLogger(CBDD.class.getName()).log(Level.SEVERE, null, ex);
            }
            bdd.deconnecter();
            return listeLivres;
        } else {
            System.out.println("Connexion KO");
        }
        return null;
    }

    public int insererLivre(Livre livre) {
        int res = -1;
        if (bdd.connecter() == true) {
            String req = "INSERT INTO `livres` (`Titre`, `idAuteurLivres`, `Ref`,"
                    + " `NbrPages`, `ideditionLivres`, `idgenreLivres`, `anneeEdition`, `idformatLivres`,`idProprietaire`,`langue`) "
                    + "VALUES ('" + CBDD.pretraiterChaineSQL(livre.getTitre())
                    + "', '" + CBDD.pretraiterChaineSQL(livre.getAuteur())
                    + "', '" + CBDD.pretraiterChaineSQL(livre.getRef())
                    + "', '" + CBDD.pretraiterChaineSQL(livre.getNbrePages())
                    + "', '" + CBDD.pretraiterChaineSQL(livre.getEdition())
                    + "', '" + CBDD.pretraiterChaineSQL(livre.getGenre())
                    + "', '" + CBDD.pretraiterChaineSQL(livre.getAnneeEdition())
                    + "', '" + CBDD.pretraiterChaineSQL(livre.getFormat())
                    + "', '" + livre.getIdProprio()
                    + "', '" + CBDD.pretraiterChaineSQL(livre.getLangue())
                    + "');";
            res = bdd.executerRequeteUpdate(req);
            bdd.deconnecter();
        } else {
            System.out.println("Connexion KO");
        }
        return res;
    }

    public int supprimerLivre(Livre livre) {
        int res = -1;
        if (bdd.connecter() == true) {
            String req = "DELETE FROM `livres` WHERE `id` = " + livre.getId();
            res = bdd.executerRequeteUpdate(req);
            bdd.deconnecter();
        } else {
            System.out.println("Connexion KO");
        }
        return res;
    }

    public int supprimerLivre(String idLivre) {
        int res = -1;
        if (bdd.connecter() == true) {
            String req = "DELETE FROM `livres` WHERE `id` = " + idLivre;
            res = bdd.executerRequeteUpdate(req);
            bdd.deconnecter();
        } else {
            System.out.println("Connexion KO");
        }
        return res;
    }

    public int modifierLivre(Livre livre) {
        int res = -1;
        if (bdd.connecter() == true) {
            String req = "UPDATE `livres` SET "
                    + "`Titre` = '"
                    + CBDD.pretraiterChaineSQL(livre.getTitre())
                    + "', "
                    + "`Auteur` = '"
                    + CBDD.pretraiterChaineSQL(livre.getAuteur())
                    + "', "
                    + "`Ref` = '"
                    + CBDD.pretraiterChaineSQL(livre.getRef())
                    + "', "
                    + "`NbrPages` = '"
                    + CBDD.pretraiterChaineSQL(livre.getNbrePages())
                    + "', "
                    + "`edition` = '"
                    + CBDD.pretraiterChaineSQL(livre.getEdition())
                    + "', "
                    + "`genre` = '"
                    + CBDD.pretraiterChaineSQL(livre.getGenre())
                    + "', "
                    + "`anneeEdition` = '"
                    + CBDD.pretraiterChaineSQL(livre.getAnneeEdition())
                    + "', "
                    + "`format` = '"
                    + CBDD.pretraiterChaineSQL(livre.getFormat())
                    + "' WHERE `livres`.`id` = "
                    + CBDD.pretraiterChaineSQL(livre.getId())
                    + ";";
            res = bdd.executerRequeteUpdate(req);
            bdd.deconnecter();
        } else {
            System.out.println("Connexion KO");
        }
        return res;
    }

    public ArrayList<TableAnnexe> lireTableAnnexe(String table) throws SQLException {

        ArrayList<TableAnnexe> liste = new ArrayList();

        if (bdd.connecter() == true) {

            String req = "SELECT * FROM " + table + ";";

            ResultSet rs = bdd.executerRequeteQuery(req);
            while (rs.next()) {

                TableAnnexe ligne = new TableAnnexe(rs.getString(1), rs.getString(2));

                liste.add(ligne);

            }

        }
        return liste;
    }

    public static void main(String[] args) throws SQLException {
       
    }
}
