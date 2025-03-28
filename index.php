<?php
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

$ext = './';
?>

<!doctype html>
<html lang="fr">
<head>
    <!--Meta-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Ajouter un train à L'Inventrain via l'espace sécurisé.">
    <meta name="author" content="Léo LESIMPLE">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#F2F2F2">
    <meta name="msapplication-navbutton-color" content="#F2F2F2">
    <meta name="apple-mobile-web-app-status-bar-style" content="#F2F2F2">

    <!--Favicon-->

    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://leolesimple.com/toastLibrary/toast.css">

    <title>Accueil - L'Inventrain</title>

    <!--Scripts-->
    <script src="https://leolesimple.com/toastLibrary/toast.js"></script>
</head>
<body>
<?php
include "./assets/nav.php";
?>
<main id="content">
</main>
<script src="./js/app.js"></script>
</body>
</html>
