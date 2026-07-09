<?php
$ext = "./";
?>
<!doctype html>
<html lang="fr">
<head>
    <?php
    $pageTitle = "Plan du site - L'Inventrain";
    $pageDescription = "Plan du site de L'Inventrain";
    $includeToast = true;
    $includeMapbox = true;
    include "./assets/includes/head.php";
    ?>
</head>
<body>
<?php
include "./assets/includes/nav.php";
?>
<main class="noCenter">
    <h1>Plan du site</h1>

    <h2>Pages principales</h2>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="search.php">Rechercher un train</a></li>
        <li><a href="detailsTrain.php">Détail du train</a></li>
        <li><a href="about.php">À Propos du site</a></li>
        <li><a href="plan.php">Plan du site (page actuelle)</a></li>
    </ul>

    <h2>Pages de documentation</h2>
    <ul>
        <li><a href="docs/index.php">Accueil</a></li>
        <li><a href="docs/lexique.php">Lexique</a></li>
        <li><a href="docs/livraisons.php">Livraisons de trains</a></li>
        <li><a href="docs/add_trains.php">Ajouter un Train</a></li>
    </ul>

    <h2>Pages légales</h2>
    <ul>
        <li><a href="legal/mentions.php">Mentions Légales</a></li>
        <li><a href="legal/propIntell.php">Propriété Intellectuelle</a></li>
    </ul>
</main>
<?php
include "./assets/includes/footer.php";
?>
</body>
</html>