<?php
$ext = "./";
?>

<!doctype html>
<html lang="fr">
<head>
    <?php
    $pageTitle = "Accueil - L'Inventrain";
    $pageDescription = "L'Inventrain - Inventoriez le materiel ferre d'Ile-de-France";
    $canonicalUrl = "https://linventrain.leolesimple.fr/index.php";
    $includeToast = true;
    $includeMapbox = true;
    include "./assets/includes/head.php";
    ?>
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
