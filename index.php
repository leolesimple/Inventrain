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

    <title>Accueil - L'Inventrain</title>

    <!--Scripts-->
    <script src="https://leolesimple.com/toastLibrary/toast.js"></script>
</head>
<body>
<?php
include "./assets/nav.php";
?>
<section class="mapView">
    <div id="map"></div>
    <script>
        // Snippet de code officiel de Mapbox GL JS
        mapboxgl.accessToken = 'pk.eyJ1IjoibGVvbDQ1NiIsImEiOiJjbTEyOTd3emowemQ1MmxzY2g3bzZ0dXN1In0.m584YEMvD5ucGLBFfBGg9g';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/light-v11',
            zoom: 10,
            lang: 'fr',
            center: [2.3470129, 48.8616513],
        });

        map.on('style.load', () => {
            map.setLayoutProperty('country-label', 'text-field', ['get', 'name_fr']);
        });

        map.on('load', () => {
            map.addSource('idfm', {
                type: 'geojson',
                data: 'assets/lines_alleged.geojson'
            });

            map.addLayer({
                id: 'layer-borders',
                type: 'line',
                source: 'idfm',
                paint: {
                    'line-color': [
                        'case',
                        ['has', 'colourweb_hexa'],
                        ['concat', '#', ['get', 'colourweb_hexa']],
                        '#000000'
                    ],
                    'line-width': 5,
                    'line-opacity': 0.7,
                    'line-cap': 'round',
                    'line-join': 'round'
                }
            });
        });
    </script>
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
        </div>
    </form>
    <div class="lastTrainsHero">
        <h1>
            Les derniers ajouts.
        </h1>
        <div class="tilesContainer">
            <div class="tile" role="button" aria-label="Voir le train 360L" tabindex="0">
                <div class="rameInfo">
                    <img src="./img/trains/z50000_idfm.svg" class="rameIcon" alt="">
                    <div>
                        <h3>360L</h3>
                        <div class="badgesContainer">
                            <span class="badge blueBadge">Z50000</span>
                            <span class="badge blueBadge">IDFM</span>
                        </div>
                    </div>
                </div>
                <div class="infosSupp">
                    <div class="dateContainer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 23 28"
                                 fill="none">
                                <path d="M11.5 14.3572L22 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L1 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L1 8.10718L6.25 4.98218L11.5 1.85718L22 8.10718L16.75 11.2322L11.5 14.3572Z"
                                      fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L22 8.10718M11.5 14.3572V26.8572M11.5 14.3572L1 8.10718M11.5 14.3572L16.75 11.2322M22 8.10718V20.6072L11.5 26.8572M22 8.10718L11.5 1.85718L6.25 4.98218M22 8.10718L16.75 11.2322M11.5 26.8572L1 20.6072V8.10718M1 8.10718L6.25 4.98218M6.25 4.98218L16.75 11.2322"
                                      stroke="#202124"
                                      style="stroke:#202124;stroke:color(display-p3 0.1255 0.1294 0.1412);stroke-opacity:1;"
                                      stroke-width="2" stroke-linejoin="round"/>
                            </svg>
                            <h4 class="date">01/12/2022</h4>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 23 28"
                                 fill="none">
                                <path d="M11.5 14.3572L22 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L1 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L1 8.10718L6.25 4.98218L11.5 1.85718L22 8.10718L16.75 11.2322L11.5 14.3572Z"
                                      fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L22 8.10718M11.5 14.3572V26.8572M11.5 14.3572L1 8.10718M11.5 14.3572L16.75 11.2322M22 8.10718V20.6072L11.5 26.8572M22 8.10718L11.5 1.85718L6.25 4.98218M22 8.10718L16.75 11.2322M11.5 26.8572L1 20.6072V8.10718M1 8.10718L6.25 4.98218M6.25 4.98218L16.75 11.2322"
                                      stroke="#202124"
                                      style="stroke:#202124;stroke:color(display-p3 0.1255 0.1294 0.1412);stroke-opacity:1;"
                                      stroke-width="2" stroke-linejoin="round"/>
                            </svg>
                            <h4 class="date">01/12/2022</h4>
                        </div>
                    </div>
                    <div class="iconLigne">
                        <svg xmlns="http://www.w3.org/2000/svg" class="" width="30" height="31"
                             viewBox="0 0 30 31" fill="none">
                            <g clip-path="url(#clip0_227_2885)">
                                <path d="M23.2593 30.8572H6.75131C3.02646 30.8572 0 27.8307 0 24.1059V7.60849C0 3.88364 3.02646 0.857178 6.75131 0.857178H23.2487C26.9736 0.857178 30 3.88364 30 7.60849V24.1059C30 27.8307 26.9841 30.8572 23.2593 30.8572Z"
                                      fill="#D5C900"
                                      style="fill:#D5C900;fill:color(display-p3 0.8353 0.7882 0.0000);fill-opacity:1;"/>
                                <path d="M12.3596 23.9683C12.095 23.9683 11.8199 23.9683 11.5448 23.9471L11.64 21.3334C11.7564 21.3334 11.8834 21.3545 11.9998 21.3545C13.8622 21.3545 14.9522 20.2752 14.9522 17.8413V7.89423H18.4654V18.1376C18.4549 21.0371 16.9099 23.9683 12.3596 23.9683Z"
                                      fill="#202124"
                                      style="fill:#202124;fill:color(display-p3 0.1255 0.1294 0.1412);fill-opacity:1;"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_227_2885">
                                    <rect width="30" height="30" fill="white" style="fill:white;fill-opacity:1;"
                                          transform="translate(0 0.857178)"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>            <div class="tile" role="button" aria-label="Voir le train 360L" tabindex="0">
                <div class="rameInfo">
                    <img src="./img/trains/z50000_idfm.svg" class="rameIcon" alt="">
                    <div>
                        <h3>360L</h3>
                        <div class="badgesContainer">
                            <span class="badge blueBadge">Z50000</span>
                            <span class="badge blueBadge">IDFM</span>
                        </div>
                    </div>
                </div>
                <div class="infosSupp">
                    <div class="dateContainer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 23 28"
                                 fill="none">
                                <path d="M11.5 14.3572L22 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L1 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L1 8.10718L6.25 4.98218L11.5 1.85718L22 8.10718L16.75 11.2322L11.5 14.3572Z"
                                      fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L22 8.10718M11.5 14.3572V26.8572M11.5 14.3572L1 8.10718M11.5 14.3572L16.75 11.2322M22 8.10718V20.6072L11.5 26.8572M22 8.10718L11.5 1.85718L6.25 4.98218M22 8.10718L16.75 11.2322M11.5 26.8572L1 20.6072V8.10718M1 8.10718L6.25 4.98218M6.25 4.98218L16.75 11.2322"
                                      stroke="#202124"
                                      style="stroke:#202124;stroke:color(display-p3 0.1255 0.1294 0.1412);stroke-opacity:1;"
                                      stroke-width="2" stroke-linejoin="round"/>
                            </svg>
                            <h4 class="date">01/12/2022</h4>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 23 28"
                                 fill="none">
                                <path d="M11.5 14.3572L22 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L1 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L1 8.10718L6.25 4.98218L11.5 1.85718L22 8.10718L16.75 11.2322L11.5 14.3572Z"
                                      fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L22 8.10718M11.5 14.3572V26.8572M11.5 14.3572L1 8.10718M11.5 14.3572L16.75 11.2322M22 8.10718V20.6072L11.5 26.8572M22 8.10718L11.5 1.85718L6.25 4.98218M22 8.10718L16.75 11.2322M11.5 26.8572L1 20.6072V8.10718M1 8.10718L6.25 4.98218M6.25 4.98218L16.75 11.2322"
                                      stroke="#202124"
                                      style="stroke:#202124;stroke:color(display-p3 0.1255 0.1294 0.1412);stroke-opacity:1;"
                                      stroke-width="2" stroke-linejoin="round"/>
                            </svg>
                            <h4 class="date">01/12/2022</h4>
                        </div>
                    </div>
                    <div class="iconLigne">
                        <svg xmlns="http://www.w3.org/2000/svg" class="" width="30" height="31"
                             viewBox="0 0 30 31" fill="none">
                            <g clip-path="url(#clip0_227_2885)">
                                <path d="M23.2593 30.8572H6.75131C3.02646 30.8572 0 27.8307 0 24.1059V7.60849C0 3.88364 3.02646 0.857178 6.75131 0.857178H23.2487C26.9736 0.857178 30 3.88364 30 7.60849V24.1059C30 27.8307 26.9841 30.8572 23.2593 30.8572Z"
                                      fill="#D5C900"
                                      style="fill:#D5C900;fill:color(display-p3 0.8353 0.7882 0.0000);fill-opacity:1;"/>
                                <path d="M12.3596 23.9683C12.095 23.9683 11.8199 23.9683 11.5448 23.9471L11.64 21.3334C11.7564 21.3334 11.8834 21.3545 11.9998 21.3545C13.8622 21.3545 14.9522 20.2752 14.9522 17.8413V7.89423H18.4654V18.1376C18.4549 21.0371 16.9099 23.9683 12.3596 23.9683Z"
                                      fill="#202124"
                                      style="fill:#202124;fill:color(display-p3 0.1255 0.1294 0.1412);fill-opacity:1;"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_227_2885">
                                    <rect width="30" height="30" fill="white" style="fill:white;fill-opacity:1;"
                                          transform="translate(0 0.857178)"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="tile" role="button" aria-label="Voir le train 360L" tabindex="0">
                <div class="rameInfo">
                    <img src="./img/trains/z50000_idfm.svg" class="rameIcon" alt="">
                    <div>
                        <h3>360L</h3>
                        <div class="badgesContainer">
                            <span class="badge blueBadge">Z50000</span>
                            <span class="badge blueBadge">IDFM</span>
                        </div>
                    </div>
                </div>
                <div class="infosSupp">
                    <div class="dateContainer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 23 28"
                                 fill="none">
                                <path d="M11.5 14.3572L22 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L1 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L1 8.10718L6.25 4.98218L11.5 1.85718L22 8.10718L16.75 11.2322L11.5 14.3572Z"
                                      fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L22 8.10718M11.5 14.3572V26.8572M11.5 14.3572L1 8.10718M11.5 14.3572L16.75 11.2322M22 8.10718V20.6072L11.5 26.8572M22 8.10718L11.5 1.85718L6.25 4.98218M22 8.10718L16.75 11.2322M11.5 26.8572L1 20.6072V8.10718M1 8.10718L6.25 4.98218M6.25 4.98218L16.75 11.2322"
                                      stroke="#202124"
                                      style="stroke:#202124;stroke:color(display-p3 0.1255 0.1294 0.1412);stroke-opacity:1;"
                                      stroke-width="2" stroke-linejoin="round"/>
                            </svg>
                            <h4 class="date">01/12/2022</h4>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 23 28"
                                 fill="none">
                                <path d="M11.5 14.3572L22 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L1 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L1 8.10718L6.25 4.98218L11.5 1.85718L22 8.10718L16.75 11.2322L11.5 14.3572Z"
                                      fill="#E3E7F2"
                                      style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                                <path d="M11.5 14.3572L22 8.10718M11.5 14.3572V26.8572M11.5 14.3572L1 8.10718M11.5 14.3572L16.75 11.2322M22 8.10718V20.6072L11.5 26.8572M22 8.10718L11.5 1.85718L6.25 4.98218M22 8.10718L16.75 11.2322M11.5 26.8572L1 20.6072V8.10718M1 8.10718L6.25 4.98218M6.25 4.98218L16.75 11.2322"
                                      stroke="#202124"
                                      style="stroke:#202124;stroke:color(display-p3 0.1255 0.1294 0.1412);stroke-opacity:1;"
                                      stroke-width="2" stroke-linejoin="round"/>
                            </svg>
                            <h4 class="date">01/12/2022</h4>
                        </div>
                    </div>
                    <div class="iconLigne">
                        <svg xmlns="http://www.w3.org/2000/svg" class="" width="30" height="31"
                             viewBox="0 0 30 31" fill="none">
                            <g clip-path="url(#clip0_227_2885)">
                                <path d="M23.2593 30.8572H6.75131C3.02646 30.8572 0 27.8307 0 24.1059V7.60849C0 3.88364 3.02646 0.857178 6.75131 0.857178H23.2487C26.9736 0.857178 30 3.88364 30 7.60849V24.1059C30 27.8307 26.9841 30.8572 23.2593 30.8572Z"
                                      fill="#D5C900"
                                      style="fill:#D5C900;fill:color(display-p3 0.8353 0.7882 0.0000);fill-opacity:1;"/>
                                <path d="M12.3596 23.9683C12.095 23.9683 11.8199 23.9683 11.5448 23.9471L11.64 21.3334C11.7564 21.3334 11.8834 21.3545 11.9998 21.3545C13.8622 21.3545 14.9522 20.2752 14.9522 17.8413V7.89423H18.4654V18.1376C18.4549 21.0371 16.9099 23.9683 12.3596 23.9683Z"
                                      fill="#202124"
                                      style="fill:#202124;fill:color(display-p3 0.1255 0.1294 0.1412);fill-opacity:1;"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_227_2885">
                                    <rect width="30" height="30" fill="white" style="fill:white;fill-opacity:1;"
                                          transform="translate(0 0.857178)"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="buttonContainer">
            <a href="search.php" class="seeMoreBtn">Voir tous les trains <i class="fa-solid fa-chevron-right hoverOnly"></i> </a>
        </div>
    </div>
</main>
<script src="./js/app.js"></script>
<script src="https://kit.fontawesome.com/406b037200.js" crossorigin="anonymous"></script>
</body>
</html>
