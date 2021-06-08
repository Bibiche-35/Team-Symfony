<?php
// controller de déconnexion associé au bouton déconnexion --> associé à la page header.php
session_start();
session_destroy();

header('Location: ../index.php');
exit;

?>