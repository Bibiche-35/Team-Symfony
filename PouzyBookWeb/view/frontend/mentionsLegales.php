<?php $title = 'Mentions légales'; ?>

<?php ob_start(); ?>
<main class="container">
</br><section>
        <article> <h2>Rappel Article 9 du code de protection civil :</h2>
    Chacun a droit au respect de sa vie privée.
    Les juges peuvent, sans préjudice de la réparation du dommage subi, prescrire
    toutes mesures, telles que séquestre, saisie et autres, propres à empêcher ou faire
    cesser une atteinte à l'intimité de la vie privée : ces mesures peuvent, s'il y a
    urgence, être ordonnées en référé.
        </article> 
    </section>
</main>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>