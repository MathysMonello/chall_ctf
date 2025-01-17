<?php
// Nom et valeur du cookie attendu
$cookieName = "user_auth";
$validCookieValue = "USD4xM4ngeSmR";

// Vérification de l'existence et de la validité du cookie
if (!isset($_COOKIE[$cookieName]) || $_COOKIE[$cookieName] !== $validCookieValue) {
    // Redirection ou message d'erreur si le cookie n'est pas valide
    header("Location: no_access.php");
    exit(); // Terminer le script pour éviter l'accès
}

// Si le cookie est valide, afficher la page sécurisée
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Sécurisée</title>
</head>
<body>
    <h1>Bienvenue sur la Admin</h1>
    <p>Vous pouvez rentrer le cookie en tant que flag.</p>
</body>
</html>
