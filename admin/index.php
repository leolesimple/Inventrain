<?php
// Start the session securely
ini_set('session.cookie_secure', 1); 
ini_set('session.cookie_httponly', 1); 
session_start();

// Redirect if not logged in
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
Réussi! Vous êtes connecté.
</body>
</html>
