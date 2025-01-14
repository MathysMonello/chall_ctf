<?php
// Démarrer la session PHP
session_start();

// Supprimer toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger vers la page de login
header("Location: index.php");
exit();
?>
