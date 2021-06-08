<?php $title = 'En savoir plus'; ?>

<?php ob_start(); ?>
<main class="container">
   </br><section>
       <article>
    <h2>L’application, bien que disponible depuis un navigateur web, fonctionne comme un circuit
    “fermé”. L’application « Pouzy-Book » se comporte donc différemment selon le statut du
    visiteur :
    </h2>
     <div>- Anonyme : le visiteur anonyme. Ne peut accéder qu’à la page inscription/création de
    compte.
     </div>- Utilisateur : visiteur connecté - dont l’inscription préalable au service a été réalisée -
    peut accéder aux pages de l'application.
    L’administrateur « Pouzy-Book » n’a, dans cette première version, pas été défini mais
    nous pensons que le dPO peut faire office d'action d'administration.
    Cette première version de l'application est basé sur la confiance de chaque utilisateurs ou
    administrés (via le formulaire de création de compte et les conditions générales d'utilisation
    et règlement RGPD). Il est important que la première version soit simple et rapide d'accès,
    la demande de document supplémentaire peut freiner la popularité de cette utilisation.
    </article>
  </section>
</main>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>