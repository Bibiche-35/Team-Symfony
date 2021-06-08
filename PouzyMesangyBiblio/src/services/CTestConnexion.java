/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

import IHM.JFrameConnexion;
import entities.Administre;
import javax.swing.JTextField;

/**
 *
 * @author SIO_7
 */
public class CTestConnexion {
   
    JFrameConnexion jFrameConnexion;

    public void setjFrameConnexion(JFrameConnexion jFrameConnexion) {
        this.jFrameConnexion = jFrameConnexion;
    }

    public JFrameConnexion getjFrameConnexion() {
        return jFrameConnexion;
    }

    public String recupererJTextField(JTextField txt) {

        return txt.getText();

    }

    
    //méthode qui test si l'id et le mdp rentré par l'user correspondent à un duo valide dans la BDD
    public boolean indentification(String user, String mdp) {

        Administre administre = this.jFrameConnexion.getApp().tableAdmi.lireAdministreUserMdp(user, mdp);

        if (administre != null) {
            System.out.println("Connexion Opé");
            
            
            
            return true;
        }
        System.out.println("Erreur user/mdp");
        return false;
    }

    public static void main(String[] args) {

        // Fonctionnel : test de la méthode d'indentification
        // CTestConnexion test = new CTestConnexion();
        //test.indentification("malo", "malobtssio");
    }

}
