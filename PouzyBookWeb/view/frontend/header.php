<!-- On retrouve ici le template du header -->
<header>
    <img src="public/images/logoPouzyBook.png" alt=""></br>
    <nav>
        <ul class="">
            <li><a class="link" href="accueil.php?action=listLivresNonConnecte&amp;emprunteur=<?= ($_SESSION)['utilisateur'] ?>">Bibliothèque</a></li>
            <li><a class="link" href="accueil.php?action=listLivresEmpruntes&amp;emprunteur=<?= ($_SESSION)['utilisateur'] ?>">Mes livres Empruntés</a></li>
            <li><a class="link" href="accueil.php?action=monCompte&amp;emprunteur=<?= ($_SESSION)['utilisateur'] ?>">Mon compte</a></li>
            <li><a class="link" href="accueil.php?action=listLivresProprietaire&amp;emprunteur=<?= ($_SESSION)['utilisateur'] ?>">Mes livres Propriétaires</a></li>
            <li><a class="link" href="../PouzyBookWeb/controller/deconnexionController.php">Déconnexion</a></br>Utilisateur : <?php echo ($_SESSION)['utilisateur'];?></li>
        </ul>
    </nav>
</header>