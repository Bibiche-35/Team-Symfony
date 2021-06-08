/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package appli;

import entities.Bibliotheque;
import services.CBDD;
import services.CParametresStockageBDD;
import IHM.JFrameBibliotheque;
import IHM.JFrameConnexion;
import entities.Administre;
import entities.Livre;
import java.util.ArrayList;
import javax.swing.table.DefaultTableModel;
import services.CControleurJFrame;
import services.CTableAdministres;
import services.CTableLivres;
import services.CTestConnexion;

/**
 *
 * @author gimli
 */
public class App {

    public Bibliotheque biblio;
    public JFrameBibliotheque jFrameBiblio;
    public CTableLivres tableLivres;
    public JFrameConnexion jFrameConnexion;
    public CBDD bdd;
    public Administre admi;
    public CTableAdministres tableAdmi;
    public CControleurJFrame controleur;
    public ArrayList<String> listIdFormat;
    public ArrayList<String> listIdGenre;
    public ArrayList<String> listIdAuteur;
    public ArrayList<String> listIdEdition;
    
    
    // METHODE QUI AFFICHE L'INTERFACE DE CONNEXION
    public void runConnexionIHM(){
    //Initialisation de la connexion à la BDD
    this.bdd = new CBDD(new CParametresStockageBDD("parametresBdd.properties"));    
    
    // On créer l'afficache de connexion et l'initialise correctement
    this.jFrameConnexion = new JFrameConnexion();
    CTestConnexion connexion = new CTestConnexion();
    this.jFrameConnexion.setApp(this);
    connexion.setjFrameConnexion(this.jFrameConnexion);
    this.jFrameConnexion.setConnexion(connexion);
    
    //Initialisation des atributs liés aux tables
    this.tableAdmi = new CTableAdministres(bdd);
    this.tableLivres = new CTableLivres(bdd);
    
    // Une fois ce que dont on aura besoin initialisé, on affiche la page de connexion
    
    this.jFrameConnexion.setVisible(true);
    
    }
    
    // METHODE QUI AFFICHE LA BIBLIOTHEQUE
    public void runBibliothequeIHM() {
        jFrameConnexion.setVisible(false);
        
        // On initialise les attributs qui seront utilisés par la JframeBiblio
        biblio = new Bibliotheque();
        jFrameBiblio = new JFrameBibliotheque();
        controleur = new CControleurJFrame();
        jFrameBiblio.setApp(this);
 
        // On met dans la biblio des livres récupéres en fonction de l'id de notre administre
        this.majBiblio(tableLivres.lireLivresParID(admi.getIdUtilisateur()),admi);
       
        jFrameBiblio.setVisible(true);

    }
    
    
    public void majBiblio() {
        biblio.setListeLivres(tableLivres.lireLivres());
        this.afficherListejTableBiblio();
    }
    
    public void majBiblio(ArrayList<Livre> livres,Administre admi) {
        biblio.setListeLivres(tableLivres.lireLivresParID(admi.getIdUtilisateur()));
        this.afficherListejTableBiblio(livres);
    }

    public void setRowCountjTableBiblio(int rowCount) {
        DefaultTableModel model = (DefaultTableModel) jFrameBiblio.getjTableBibliotheque().getModel();
        model.setRowCount(rowCount);
        jFrameBiblio.getjTableBibliotheque().setModel(model);
        this.jFrameBiblio.idLivres = new String[rowCount];
    }

    public void afficherListejTableBiblio() {
        this.setRowCountjTableBiblio(this.biblio.getListeLivres().size());

        for (int i = 0; i < this.biblio.getListeLivres().size(); i++) {
            this.jFrameBiblio.idLivres[i] = this.biblio.getListeLivres().get(i).getId();
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(this.biblio.getListeLivres().get(i).getTitre(), i, 0);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(this.biblio.getListeLivres().get(i).getAuteur(), i, 1);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(this.biblio.getListeLivres().get(i).getRef(), i, 2);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(this.biblio.getListeLivres().get(i).getNbrePages(), i, 3);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(this.biblio.getListeLivres().get(i).getEdition(), i, 4);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(this.biblio.getListeLivres().get(i).getGenre(), i, 5);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(this.biblio.getListeLivres().get(i).getAnneeEdition(), i, 6);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(this.biblio.getListeLivres().get(i).getFormat(), i, 7);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(this.biblio.getListeLivres().get(i).getLangue(), i, 8);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(this.biblio.getListeLivres().get(i).getId(), i, 9);
            
            
        }
    }

    public void afficherListejTableBiblio(ArrayList<Livre> list) {
        this.setRowCountjTableBiblio(list.size());

        for (int i = 0; i < list.size(); i++) {
            this.jFrameBiblio.idLivres[i] = list.get(i).getId();
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(list.get(i).getTitre(), i, 0);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(list.get(i).getAuteur(), i, 1);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(list.get(i).getRef(), i, 2);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(list.get(i).getNbrePages(), i, 3);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(list.get(i).getEdition(), i, 4);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(list.get(i).getGenre(), i, 5);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(list.get(i).getAnneeEdition(), i, 6);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(list.get(i).getFormat(), i, 7);
            this.jFrameBiblio.getjTableBibliotheque().setValueAt(list.get(i).getLangue(), i, 8);
             this.jFrameBiblio.getjTableBibliotheque().setValueAt(list.get(i).getId(), i, 9);
        }
    }

    public static void main(String[] args) {
        new App().runConnexionIHM();

    }
}
