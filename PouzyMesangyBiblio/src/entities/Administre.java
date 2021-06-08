/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entities;

/**
 *
 * @author Damien
 */

/*
Cette classe nous servira à créer des objets de type "Livre", ils devront représenter
des livres physiques ou virtuels et donc posséder les attributs permettant de les définir.
 */
public class Administre {

    /*
    La liste des attributs. Ce sont des variables qui ont une "durée de vie" longue.
    Tant que l'objet créé à partir de cette classe existe, ses attributs existent aussi.
    Ils doivent "définir" l'objet. C'est à dire qu'ils sont importants pour comprendre et
    différencier les objets.
     */
    private String idUtilisateur = "-1";
    private String utilisateur;
    private String motDePasse;
    private String nom;
    private String prenom;
    private String adresse;
    private String mail;

    /*
    Un contructeur, celui ci attend 9 paramètres de type chaine de caractères et on les
    utilise ensuite pour remplir les différents attributs.
    Pour bien suivre quel paramètre doit aller dans quel attribut on a choisi de
    nommer les paramètres comme les attributs. Attention donc à bien différencier
    les uns des autres grace à "this".
     */
    public Administre(String idUtilisateur, String utilisateur, String motDePasse, String nom, String prenom, String adresse, String mail) {
        this.idUtilisateur = idUtilisateur;
        this.utilisateur = utilisateur;
        this.motDePasse = motDePasse;
        this.nom = nom;
        this.prenom = prenom;
        this.adresse = adresse;
        this.mail = mail;
    }

    public Administre(String utilisateur, String motDePasse, String nom, String prenom, String adresse, String mail) {
        this.utilisateur = utilisateur;
        this.motDePasse = motDePasse;
        this.nom = nom;
        this.prenom = prenom;
        this.adresse = adresse;
        this.mail = mail;
    }
    
    
    /*
    D'autres contructeurs, ici commentés car je ne souhaite pas laisser de choix.
    Dans cet état il est obligatoire d'utiliser le contructeur qui remplit tous les
    attributs avec des chaines de caractères.
     */
    public Administre() {
    }

    /**
     * Un constructeur pour faire un livre juste avec l'id
     * @param idString 
     */
    public Administre(String idString) {
        this.idUtilisateur = idString;
    }

    public Administre(String nom, String prenom) {
        this.nom = nom;
        this.prenom = prenom;
    }

        public String getIdUtilisateur() {
        return idUtilisateur;
    }

    public void setIdUtilisateur(String idUtilisateur) {
        this.idUtilisateur = idUtilisateur;
    }

    public String getUtilisateur() {
        return utilisateur;
    }

    public void setUtilisateur(String utilisateur) {
        this.utilisateur = utilisateur;
    }

    public String getMotDePasse() {
        return motDePasse;
    }

    public void setMotDePasse(String motDePasse) {
        this.motDePasse = motDePasse;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public String getAdresse() {
        return adresse;
    }

    public void setAdresse(String adresse) {
        this.adresse = adresse;
    }

    public String getMail() {
        return mail;
    }

    public void setMail(String mail) {
        this.mail = mail;
    }

    /*
    Nous souhaitons pouvoir afficher un apperçu des informations des utilisateurs de Pouzy-Book, cette
    méthode nous le permet.
     */
    public void afficher() {
        System.out.println("Id Utilisateur : " + this.idUtilisateur);
        System.out.println("Identifiant Utilisateur : " + this.utilisateur);
        System.out.println("Mot de passe Utilisateur : " + this.motDePasse);
        System.out.println("Nom de l'utilisateur : " + this.nom);
        System.out.println("Prénom de l'utilisateur : " + this.prenom);
        System.out.println("Adresse de l'utilisateur : " + this.adresse);
        System.out.println("Mail de l'utilisateur : " + this.mail);
    }
    

    /*
    Lorsque l'on n'utilise pas de framework de test comme jUnit, il est nécessaire
    de tester nos méthodes au minimum localement comme ci dessous.
     */
    public static void main(String[] args) {
        String idUtilisateur = "idUtilisateur";
        String utilisateur = "utilisateur";
        String motDePasse = "motDePasse";
        String nom = "nom";
        String prenom = "prenom";
        String adresse = "adresse";
        String mail = "mail";

        Administre administreTest = new Administre(idUtilisateur, utilisateur, motDePasse, nom, prenom, adresse, mail);

        administreTest.afficher();
        System.out.println(administreTest.toString());
        System.out.println(administreTest);
    }
}
