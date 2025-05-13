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

    <link rel="stylesheet" href="<?php echo $ext; ?>/css/app.css">
    <title>Mentions Légales - L'Inventrain</title>
</head>
<body>
<div id="overlay"></div>
<?php
include $ext . "assets/includes/nav.php";
?>
<main class="noCenter" id="content">
    <h1>Mentions Légales</h1>
    <section class="legalContent">
        <h2>Éditeur du site</h2>
        <p>
            <strong>Dénomination sociale :</strong> Léo Lesimple
            <br>
            <strong>Adresse e-mail :</strong> leo@leolesimple.fr
        </p>
    </section>
    <section class="legalContent">
        <h2>Propriété intellectuelle</h2>
        <p>
            Pour plus d'informations sur la propriété intellectuelle, veuillez consulter notre
            <a href="<?php echo $ext; ?>legal/cgu.php">
                page "Propriété Intellectuelle
            </a>.
        </p>
    </section>
    <section class="legalContent">
        <h2>Hébergement</h2>
        <p>
            <strong>Dénomination : </strong>
            O2Switch SAS
        </p>
        <p>
            <strong>SIRET : </strong>
            510 909 807 00032
        </p>
        <p>
            <strong>Adresse : </strong>
            Chemin des Pardiaux,
            63000 Clermont-Ferrand
        </p>
        <p>
            <strong>Téléphone : </strong>
            04 44 44 60 40
        </p>
        <p>
            <strong>Site Web :</strong>
            <a href="https://www.o2switch.fr" target="_blank" rel="noopener noreferrer">
                www.o2switch.fr
            </a>
        </p>
    </section>
    <section class="legalContent">
        <h2>Données Personelles</h2>
        <p>
            Aucune donnée personnelle n'est collectée sur ce site.
        </p>
</main>
<?php
include $ext . "assets/includes/footer.php";
?>
</body>
</html>
