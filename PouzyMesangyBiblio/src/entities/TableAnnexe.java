/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entities;

/**
 *
 * @author SIO_7
 */
public class TableAnnexe {
    
 private String cle;  
 private String valeur;
    
 
 public TableAnnexe(String cle, String valeur){
 
 this.cle = cle;
 this.valeur = valeur;
 
 }

    public String getCle() {
        return cle;
    }

    public void setCle(String cle) {
        this.cle = cle;
    }

    public String getValeur() {
        return valeur;
    }

    public void setValeur(String valeur) {
        this.valeur = valeur;
    }
 
 
 
}
