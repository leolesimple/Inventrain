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
    <link rel="canonical" href="https://linventrain.leolesimple.fr/docs/index.php">

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

    <title>Accueil de la Documentation - L'Inventrain</title>
</head>
<body>
<div id="overlay"></div>
<?php
include $ext . "assets/includes/nav.php";
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
            L’Inventrain, c’est un projet de base de données dédiée aux trains d’Île-de-France, pensé pour centraliser
            un maximum d’infos techniques, visuelles et historiques sur les matériels roulants.
            Cette documentation vous guide à travers son fonctionnement, sa structure et les règles de contribution
            éventuelles.
        </p>
    </header>

    <section class="docsContent">
        <h2>🔍 Que trouve-t-on dans L’Inventrain ?</h2>
        <ul>
            <li>Une fiche <strong>détaillée</strong> pour chaque rame</li>
            <li>
                Des données techniques : série, livrée, constructeur, automatisation…
            </li>
            <li>
                Des affectations par ligne, dépôt, réseau…
            </li>
            <li>
                L’évolution du matériel : rénovations, mises en service, retraits
            </li>
        </ul>
    </section>
    <section class="docsContent">
        <h2>📄 Les pages disponibles</h2>
        <p>
            Je vous propose une documentation complète sur le site en raison de la complexité de certaines notions. En
            effet, les termes ferroviaires peuvent-être difficiles à comprendre pour les néophytes. Voici un aperçu des
            pages disponibles :
        </p>
        <ul class="unList bigList">
            <li><a href="./add_trains.php">➕ Comment ajouter un train</a></li>
            <li><a href="./lexique.php">📚 un lexique</a>, pour comprendre chaque terme technique.</li>
            <li><a href="./livraisons.php">📔 un annuaire des mouvements de trains</a>, pour alimenter la base de
                données.
            </li>
        </ul>
    </section>

    <section class="docsContent">
        <h2>💡 Pourquoi cette doc ?</h2>
        <p>Parce qu’on aime les trains, mais aussi les projets bien organisés.
            Et que tout projet de base de données sans doc… ben, c'est comme un <a
                    href="https://fr.wikipedia.org/wiki/Altéo">MI2N</a> attelé à un <a
                    href="https://fr.wikipedia.org/wiki/MI_09">MI09</a> : ça finit par cramer
            😎</p>
    </section>
</main>
<?php
include $ext . "assets/includes/footer.php";
?>
<script src="../js/app.js"></script>
<script src="https://kit.fontawesome.com/406b037200.js" crossorigin="anonymous"></script>
</body>
</html>
