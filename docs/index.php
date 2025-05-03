<?php
$ext = "../"
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

    <link rel="stylesheet" href="<?php echo $ext; ?>css/app.css">
    <link rel="stylesheet" href="<?php echo $ext; ?>css/docs.css">
    <link rel="stylesheet" href="https://leolesimple.com/toastLibrary/toast.css">

    <title>Accueil - L'Inventrain</title>

    <!--Scripts-->
    <script src="https://leolesimple.com/toastLibrary/toast.js"></script>
</head>
<body>
<div id="overlay"></div>
<?php
include $ext . "assets/nav.php";
?>
<main class="noCenter" id="content">
    <div class="fil-ariane">
        <a href="../index.php">Accueil</a> > <a href="./index.php">Documentation</a>
    </div>
    <br>

    <header class="titleContainer docs" id="headContent">
        <h1>
            Documentation
        </h1>
        <p>
            Bienvenue dans la documentation de L'Inventrain ! <br> Vous trouverez ici toutes les informations
            nécessaires pour utiliser le site.
        </p>
    </header>

    <section class="aLaUne">
        <h2>À la Une</h2>
        <div class="banner" role="button" tabindex="0">
            <h3>Ajouter un train à L'Inventrain</h3>
            <p>
                Découvrez comment ajouter un train à L'Inventrain via l'espace sécurisé. <br>
                Vous y trouverez notamment des informations sur les différentes valeurs à renseigner, les formats
                acceptés et les erreurs possibles.
            </p>
        </div>
    </section>
</main>
<script src="../js/app.js"></script>
<script>
    // On click or focus + enter on the banner, redirect to the add train page
    document.querySelector('.banner').addEventListener('click', function () {
        window.location.href = 'add_trains.php';
    });

    document.querySelector('.banner').addEventListener('keyup', function (e) {
        if (e.key === 'Enter') {
            window.location.href = 'add_trains.php';
        }
    });
</script>
<script src="https://kit.fontawesome.com/406b037200.js" crossorigin="anonymous"></script>
</body>
</html>
