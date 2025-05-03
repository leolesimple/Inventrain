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

    <title>Détail du train - L'Inventrain</title>

    <!--Scripts-->
    <script src="https://leolesimple.com/toastLibrary/toast.js"></script>
</head>
<body>
<div id="overlay"></div>
<?php
include "./assets/includes/nav.php";
?>
<div class="pubContainer" id="pubC">
    <div class="pub" id="pub" onclick="window.open('https://infostation.fr', '_blank');">
        <div>
            <img src="https://infostation.fr/img/z58.svg" class="infostationIcon" alt="">
            <div>
                <img src="https://infostation.fr/img/wordmark.svg" alt="InfoStation" class="infostationLogo">
                <p class="infostationTagLine">Pratique. Rapide. En temps réel.</p>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 14 24" fill="none">
            <path d="M1.98289 20.245C1.52155 21.3869 1.14259 22.5124 0.846007 23.6216H7.76616C8.2275 21.4032 8.91952 19.4458 9.84221 17.7493C10.7649 16.0202 11.9842 14.7642 13.5 13.9812V10.1642C12.4785 9.67483 11.5887 8.94079 10.8308 7.96207C10.0729 6.98334 9.43029 5.87412 8.90304 4.63441C8.40875 3.36207 8.02978 2.02448 7.76616 0.621643H0.5C0.862484 1.69824 1.2744 2.79115 1.73574 3.90036C2.23004 4.97696 2.83967 5.98831 3.56464 6.93441C5.5 9.46009 8.5 12.1216 8.5 12.1216C8.5 12.1216 5 15.1216 3.6635 17.1131C3.00444 18.0592 2.44423 19.1032 1.98289 20.245Z"
                  fill="#262E41" style="fill:#262E41;fill:color(display-p3 0.1490 0.1804 0.2549);fill-opacity:1;"/>
        </svg>
    </div>
</div>
<main class="noCenter" id="content">
    <?php
    include "./logic/details.php";
    ?>
</main>
<script>
    function hidePub(elementId) {
        const element = document.getElementById(elementId);
        element.style.transition = "opacity 0.5s ease, height 0.5s ease"; // Transition fluide
        element.style.overflow = "hidden"; // Masquer le contenu
        element.style.opacity = "0"; // Réduire l'opacité
        element.style.height = "0"; // Réduire la hauteur

        // Attendre la fin de la transition avant de définir display: none
        setTimeout(() => {
            element.style.display = "none";
        }, 500); // Correspond à la durée de la transition
    }

    //if the user ,scroll down 20px, hide the pub
    window.onscroll = function () {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            hidePub('pubC');
        }
    };
</script>
<?php
include "./assets/includes/footer.php"
?>
</body>
</html>