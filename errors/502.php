<?php
$ext = "https://linventrain.leolesimple.fr/";
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Page introuvable sur L'Inventrain.">
    <title>Erreur 404 - L'Inventrain</title>
    <link rel="stylesheet" href="<?= $ext ?>css/app.css">
    <link rel="stylesheet" href="https://leolesimple.com/toastLibrary/toast.css">
    <script src="https://kit.fontawesome.com/406b037200.js" crossorigin="anonymous"></script>
    <style>
        .hugeHeading {
            color: #202025;
            font-family: "Meshed Display", serif;
            font-size: 5rem;
            font-weight: 600;
            line-height: 100%;
        }

        .errorImage {
            width: 100%;
            max-width: 100px;
            margin: 0 auto;
            display: block;
        }
    </style>
</head>
<body>
<main class="" id="content">
    <img src="https://linventrain.leolesimple.fr/img/logo_MI09/MI09_v1.svg" alt="Page introuvable" class="errorImage">
    <h1 class="hugeHeading">Erreur 502</h1>
    <h2>Le serveur a reçu une réponse invalide en amont.<br>On essaie de corriger ça.</h2>
    <a class="seeMoreBtn" href="<?= $ext ?>">Retour à l'accueil <i class="fa-solid fa-chevron-right hoverOnly"></i></a>
</main>
<script src="<?= $ext ?>js/app.js"></script>
</body>
</html>
