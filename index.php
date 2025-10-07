<?php
$ext = "./";
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
    <link rel="canonical" href="https://linventrain.leolesimple.fr/index.php">

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $ext; ?>img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $ext; ?>img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $ext; ?>img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $ext; ?>img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $ext; ?>img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $ext; ?>img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $ext; ?>img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $ext; ?>img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $ext; ?>img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $ext; ?>img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $ext; ?>img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $ext; ?>img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $ext; ?>img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $ext; ?>img/favicon/manifest.json">
    <meta name="msapplication-TileImage" content="<?php echo $ext; ?>img/favicon/ms-icon-144x144.png">

    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="https://leolesimple.com/toastLibrary/toast.css">

    <link href="https://api.mapbox.com/mapbox-gl-js/v3.10.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.10.0/mapbox-gl.js"></script>

    <title>Accueil - L'Inventrain</title>

    <!--Scripts-->
    <script src="https://leolesimple.com/toastLibrary/toast.js"></script>
</head>
<body>
<div id="overlay"></div>
<?php
include "./assets/includes/nav.php";
?>
<section class="mapView" aria-hidden="true">
    <div id="imgOverlay"></div>
    <p class="attribution">
        <a href="https://commons.wikimedia.org/wiki/File:RER_NG_009M.jpg">Adnane</a>, <a
                href="https://creativecommons.org/licenses/by-sa/4.0">CC BY-SA 4.0</a>, via Wikimedia Commons
    </p>
</section>
<main class="noCenter" id="content">
    <form class="homeSearch" action="search.php" method="get">
        <h1>
            <label for="homeBar">
                Rechercher un train
            </label>
        </h1>
        <div class="inputWrapper">
            <input class="bigSearch" name="search" id="homeBar" placeholder="3540, 002H, 27354" type="search">
            <span class="iconSearch" aria-hidden="true"></span>
            <button class="searchBtn skip-link" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span class="">Rechercher</span>
            </button>
        </div>
    </form>
    <section class="lastTrainsHero">
        <h1>
            Les derniers ajouts.
        </h1>
        <div class="tilesContainer">
            <?php
            include "./logic/lastTrains.php";
            ?>
        </div>
        <div class="buttonContainer">
            <a href="search.php" class="seeMoreBtn">Voir tous les trains <i
                        class="fa-solid fa-chevron-right hoverOnly"></i> </a>
        </div>
    </section>
    <section class="about">
        <div>
            <h1>
                Qu'est-ce que L'Inventrain ?
            </h1>
            <img src="./img/Z5000_295L.webp"
                 alt="" height="200" class="imgExpl">
            <p>
                <strong>Vous prenez régulièrement le train ou le RER en Île-de-France ?</strong> Vous vous êtes déjà
                demandé quel est ce
                modèle de rame que vous voyez tous les matins ? L’Inventrain est là pour répondre simplement à ce genre
                de
                question.
                <br>
                C’est une base de données accessible qui répertorie les trains en circulation dans la région. Pour
                chaque
                rame, vous pouvez retrouver des infos utiles : modèle, constructeur, ligne d’affectation, dépôt, livrée,
                rénovations… Le tout, présenté de manière claire et structurée.
                <br>
                Que vous soyez curieux, passionné ou juste en train de chercher une info précise, L’Inventrain vous aide
                à
                mieux comprendre ce qui roule autour de vous.
                <br>
                <a class="seeMoreBtn" href="./about.php">Plus en détail <i
                            class="fa-solid fa-chevron-right hoverOnly"></i></a>
            </p>
        </div>
    </section>
</main>
<?php
include "./assets/includes/footer.php";
?>
<script src="./js/app.js"></script>
<script src="https://kit.fontawesome.com/406b037200.js" crossorigin="anonymous"></script>
</body>
</html>
