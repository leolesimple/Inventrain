<?php
$ext = "./"
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

    <title>Recherche - L'Inventrain</title>

    <!--Scripts-->
    <script src="https://leolesimple.com/toastLibrary/toast.js"></script>
</head>
<body>
<div id="overlay"></div>
<?php
include "./assets/includes/nav.php";
?>
<main class="noCenter" id="content">
    <form class="search" action="" method="get">
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
    <div class="searchResults">
        <div>
            <h1>
                Résultats
            </h1>
            <form class="filterContainer">
                <label for="filterRame">Filtrer par :</label>
                <button class="TriBtn" name="rame" id="filterRame">
                    Rame
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" id="rameUp" viewBox="0 0 10 6" fill="none">
                          <path d="M8.53191 5.00119C9.02837 5.17863 9.51773 5.32438 10 5.43845V2.77686C9.03546 2.59942 8.1844 2.33326 7.44681 1.97838C6.69503 1.6235 6.14894 1.15455 5.80851 0.571533H4.14894C3.93617 0.964436 3.61702 1.30664 3.19149 1.59815C2.76596 1.88966 2.28369 2.13681 1.74468 2.33959C1.19149 2.52971 0.609929 2.67546 0 2.77686V5.57153C0.468085 5.43212 0.943262 5.27369 1.42553 5.09625C1.89362 4.90613 2.33333 4.67166 2.74468 4.39283C3.8428 3.64846 5 2.49461 5 2.49461C5 2.49461 6.30435 3.84076 7.17021 4.3548C7.58156 4.60829 8.03546 4.82375 8.53191 5.00119Z"
                                fill="#818181"
                                style="fill:#818181;fill:color(display-p3 0.5067 0.5067 0.5067);fill-opacity:1;"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" id="rameDown" viewBox="0 0 10 6" fill="none">
                          <path d="M8.53191 1.14188C9.02837 0.964436 9.51773 0.818681 10 0.704613V3.36621C9.03546 3.54365 8.1844 3.80981 7.44681 4.16469C6.69503 4.51957 6.14894 4.98852 5.80851 5.57153H4.14894C3.93617 5.17863 3.61702 4.83643 3.19149 4.54492C2.76596 4.25341 2.28369 4.00626 1.74468 3.80347C1.19149 3.61336 0.609929 3.4676 0 3.36621V0.571533C0.468085 0.71095 0.943262 0.869379 1.42553 1.04682C1.89362 1.23693 2.33333 1.47141 2.74468 1.75024C3.8428 2.49461 5 3.64846 5 3.64846C5 3.64846 6.30435 2.3023 7.17021 1.78826C7.58156 1.53478 8.03546 1.31932 8.53191 1.14188Z"
                                fill="#818181"
                                style="fill:#818181;fill:color(display-p3 0.5067 0.5067 0.5067);fill-opacity:1;"/>
                        </svg>
                    </span>
                </button>
                <label class="sr-only" for="filterLivraison">Filtrer par :</label>
                <button class="TriBtn" id="filterLivraison">
                    Livraison
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" id="livraisonUp" viewBox="0 0 10 6" fill="none">
                          <path d="M8.53191 5.00119C9.02837 5.17863 9.51773 5.32438 10 5.43845V2.77686C9.03546 2.59942 8.1844 2.33326 7.44681 1.97838C6.69503 1.6235 6.14894 1.15455 5.80851 0.571533H4.14894C3.93617 0.964436 3.61702 1.30664 3.19149 1.59815C2.76596 1.88966 2.28369 2.13681 1.74468 2.33959C1.19149 2.52971 0.609929 2.67546 0 2.77686V5.57153C0.468085 5.43212 0.943262 5.27369 1.42553 5.09625C1.89362 4.90613 2.33333 4.67166 2.74468 4.39283C3.8428 3.64846 5 2.49461 5 2.49461C5 2.49461 6.30435 3.84076 7.17021 4.3548C7.58156 4.60829 8.03546 4.82375 8.53191 5.00119Z"
                                fill="#818181"
                                style="fill:#818181;fill:color(display-p3 0.5067 0.5067 0.5067);fill-opacity:1;"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" id="livraisonDown" viewBox="0 0 10 6" fill="none">
                          <path d="M8.53191 1.14188C9.02837 0.964436 9.51773 0.818681 10 0.704613V3.36621C9.03546 3.54365 8.1844 3.80981 7.44681 4.16469C6.69503 4.51957 6.14894 4.98852 5.80851 5.57153H4.14894C3.93617 5.17863 3.61702 4.83643 3.19149 4.54492C2.76596 4.25341 2.28369 4.00626 1.74468 3.80347C1.19149 3.61336 0.609929 3.4676 0 3.36621V0.571533C0.468085 0.71095 0.943262 0.869379 1.42553 1.04682C1.89362 1.23693 2.33333 1.47141 2.74468 1.75024C3.8428 2.49461 5 3.64846 5 3.64846C5 3.64846 6.30435 2.3023 7.17021 1.78826C7.58156 1.53478 8.03546 1.31932 8.53191 1.14188Z"
                                fill="#818181"
                                style="fill:#818181;fill:color(display-p3 0.5067 0.5067 0.5067);fill-opacity:1;"/>
                        </svg>
                    </span>
                </button>
                <svg xmlns="http://www.w3.org/2000/svg" width="2" height="39" viewBox="0 0 2 39" fill="none">
                    <path d="M1 1.57153L1 37.5715" stroke="#818181"
                          style="stroke:#818181;stroke:color(display-p3 0.5067 0.5067 0.5067);stroke-opacity:1;"
                          stroke-width="2" stroke-linecap="round"/>
                </svg>
            </form>
        </div>
        <div class="resultsContainer">
            <?php
            include "./logic/searchResults.php";
            ?>
        </div>
    </div>
</main>
<?php
include "./assets/includes/footer.php";
?>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const search = urlParams.get('search');
    if (search) {
        document.getElementById('homeBar').value = search;
    }

    document.querySelectorAll('.tile[role="button"]').forEach(tile => {
        tile.addEventListener('click', () => {
            const idTrain = tile.dataset.train;
            const number = tile.querySelector('.trainNumber')?.textContent || 'Inconnu';

            console.log("Train cliqué :", idTrain, "-", number);
            window.location.href = "detailsTrain.php?id=" + idTrain;
        });
    });
</script>
<script src="./js/app.js"></script>
<script src="https://kit.fontawesome.com/406b037200.js" crossorigin="anonymous"></script>
</body>
</html>
