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
<div id="overlay"></div>
<?php
include "./assets/nav.php";
?>
<main class="noCenter" id="content">
    <form class="homeSearch" action="search.php" method="get" style="padding: 4.375rem 1.25rem 1.5rem 1.25rem;">
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
    <div class="searchResults">
        <div>
            <h1>
                Résultats
            </h1>
            <form class="filterContainer">
                <button class="TriBtn" name="rame" id="rame">
                    Rame
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 6" fill="none">
                          <path d="M8.53191 5.00119C9.02837 5.17863 9.51773 5.32438 10 5.43845V2.77686C9.03546 2.59942 8.1844 2.33326 7.44681 1.97838C6.69503 1.6235 6.14894 1.15455 5.80851 0.571533H4.14894C3.93617 0.964436 3.61702 1.30664 3.19149 1.59815C2.76596 1.88966 2.28369 2.13681 1.74468 2.33959C1.19149 2.52971 0.609929 2.67546 0 2.77686V5.57153C0.468085 5.43212 0.943262 5.27369 1.42553 5.09625C1.89362 4.90613 2.33333 4.67166 2.74468 4.39283C3.8428 3.64846 5 2.49461 5 2.49461C5 2.49461 6.30435 3.84076 7.17021 4.3548C7.58156 4.60829 8.03546 4.82375 8.53191 5.00119Z"
                                fill="#818181"
                                style="fill:#818181;fill:color(display-p3 0.5067 0.5067 0.5067);fill-opacity:1;"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 6" fill="none">
                          <path d="M8.53191 1.14188C9.02837 0.964436 9.51773 0.818681 10 0.704613V3.36621C9.03546 3.54365 8.1844 3.80981 7.44681 4.16469C6.69503 4.51957 6.14894 4.98852 5.80851 5.57153H4.14894C3.93617 5.17863 3.61702 4.83643 3.19149 4.54492C2.76596 4.25341 2.28369 4.00626 1.74468 3.80347C1.19149 3.61336 0.609929 3.4676 0 3.36621V0.571533C0.468085 0.71095 0.943262 0.869379 1.42553 1.04682C1.89362 1.23693 2.33333 1.47141 2.74468 1.75024C3.8428 2.49461 5 3.64846 5 3.64846C5 3.64846 6.30435 2.3023 7.17021 1.78826C7.58156 1.53478 8.03546 1.31932 8.53191 1.14188Z"
                                fill="#818181"
                                style="fill:#818181;fill:color(display-p3 0.5067 0.5067 0.5067);fill-opacity:1;"/>
                        </svg>
                    </span>
                </button>
                <button class="TriBtn">
                    Livraison
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 6" fill="none">
                          <path d="M8.53191 5.00119C9.02837 5.17863 9.51773 5.32438 10 5.43845V2.77686C9.03546 2.59942 8.1844 2.33326 7.44681 1.97838C6.69503 1.6235 6.14894 1.15455 5.80851 0.571533H4.14894C3.93617 0.964436 3.61702 1.30664 3.19149 1.59815C2.76596 1.88966 2.28369 2.13681 1.74468 2.33959C1.19149 2.52971 0.609929 2.67546 0 2.77686V5.57153C0.468085 5.43212 0.943262 5.27369 1.42553 5.09625C1.89362 4.90613 2.33333 4.67166 2.74468 4.39283C3.8428 3.64846 5 2.49461 5 2.49461C5 2.49461 6.30435 3.84076 7.17021 4.3548C7.58156 4.60829 8.03546 4.82375 8.53191 5.00119Z"
                                fill="#818181"
                                style="fill:#818181;fill:color(display-p3 0.5067 0.5067 0.5067);fill-opacity:1;"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 6" fill="none">
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
                <label for="livree" class="sr-only">Livrée</label>
                <select name="livree" id="livree">

                </select>
            </form>
        </div>
        <div class="resultsContainer">
            <div class="tile tileResult" role="button" aria-label="Voir le train 360L" tabindex="0">
                <div class="rame">
                    <div class="rameInfo">
                        <img src="./img/trains/z50000_idfm.svg" class="rameIcon" alt="">
                        <div>
                            <h3>360L</h3>
                        </div>
                    </div>
                    <div class="badgesContainer">
                        <span class="badge badgeMD blueBadge">Z50000</span>
                        <span class="badge badgeMD blueBadge">IDFM</span>
                    </div>
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
                            <div class="badge badgeMD greenBadge">
                                En Service
                            </div>
                        </div>
                    </div>
                </div>
                <div class="infosSupp">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="23" viewBox="0 0 13 23" fill="none">
                        <path d="M1.48289 19.6234C1.02155 20.7652 0.642586 21.8908 0.346007 23H7.26616C7.7275 20.7816 8.41952 18.8241 9.34221 17.1277C10.2649 15.3986 11.4842 14.1426 13 13.3596V9.54255C11.9785 9.05319 11.0887 8.31915 10.3308 7.34042C9.57288 6.3617 8.93029 5.25248 8.40304 4.01277C7.90875 2.74042 7.52978 1.40284 7.26616 0H0C0.362484 1.0766 0.774398 2.1695 1.23574 3.27872C1.73004 4.35532 2.33967 5.36667 3.06464 6.31276C5 8.83845 8 11.5 8 11.5C8 11.5 4.5 14.5 3.1635 16.4915C2.50444 17.4376 1.94423 18.4816 1.48289 19.6234Z"
                              fill="#262E41"
                              style="fill:#262E41;fill:color(display-p3 0.1490 0.1804 0.2549);fill-opacity:1;"/>
                    </svg>
                </div>
            </div>
            <div class="tile tileResult" role="button" aria-label="Voir le train 360L" tabindex="0">
                <div class="rame">
                    <div class="rameInfo">
                        <img src="./img/trains/z50000_idfm.svg" class="rameIcon" alt="">
                        <div>
                            <h3>360L</h3>
                        </div>
                    </div>
                    <div class="badgesContainer">
                        <span class="badge badgeMD blueBadge">Z50000</span>
                        <span class="badge badgeMD blueBadge">IDFM</span>
                    </div>
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
                            <div class="badge badgeMD greenBadge">
                                En Service
                            </div>
                        </div>
                    </div>
                </div>
                <div class="infosSupp">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="23" viewBox="0 0 13 23" fill="none">
                        <path d="M1.48289 19.6234C1.02155 20.7652 0.642586 21.8908 0.346007 23H7.26616C7.7275 20.7816 8.41952 18.8241 9.34221 17.1277C10.2649 15.3986 11.4842 14.1426 13 13.3596V9.54255C11.9785 9.05319 11.0887 8.31915 10.3308 7.34042C9.57288 6.3617 8.93029 5.25248 8.40304 4.01277C7.90875 2.74042 7.52978 1.40284 7.26616 0H0C0.362484 1.0766 0.774398 2.1695 1.23574 3.27872C1.73004 4.35532 2.33967 5.36667 3.06464 6.31276C5 8.83845 8 11.5 8 11.5C8 11.5 4.5 14.5 3.1635 16.4915C2.50444 17.4376 1.94423 18.4816 1.48289 19.6234Z"
                              fill="#262E41"
                              style="fill:#262E41;fill:color(display-p3 0.1490 0.1804 0.2549);fill-opacity:1;"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="./js/app.js"></script>
<script src="https://kit.fontawesome.com/406b037200.js" crossorigin="anonymous"></script>
</body>
</html>
