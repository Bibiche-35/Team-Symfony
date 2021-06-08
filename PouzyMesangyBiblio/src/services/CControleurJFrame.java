/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

import IHM.JInternalFrameCreerLivre;
import appli.App;
import entities.Livre;
import entities.TableAnnexe;
import java.util.ArrayList;
import javax.swing.JComboBox;
import javax.swing.JFrame;

/**
 *
 * @author SIO_7
 */
public class CControleurJFrame {

    public void setjInternal(JInternalFrameCreerLivre jInternal) {
        this.jInternal = jInternal;
    }

    public JInternalFrameCreerLivre getjInternal() {
        return jInternal;
    }

    JInternalFrameCreerLivre jInternal;

    // METHODE QUI SERT A AJOUTER UN LIVRE DANS LA BDD
    public int insererLivreBouton(Livre livre, App app) {

        return app.tableLivres.insererLivre(livre);
        
    }

    ;
    
    // METHODE QUI FERME LA PAGE BIBLIO ET OUVRE LA PAGE DE CONNEXION
    public void deconnexion(JFrame jframe, JFrame jframeConnexion) {

        jframe.setVisible(false);
        jframeConnexion.setVisible(true);
    }

    public ArrayList<String> setComboBox(JComboBox combo, ArrayList<TableAnnexe> liste) {

        ArrayList<String> listIndex = new ArrayList();
        for (int i = 0; i < liste.size(); i++) {

            combo.addItem(liste.get(i).getValeur());
            listIndex.add(liste.get(i).getCle());
        }
        
        return listIndex;
    }
}
