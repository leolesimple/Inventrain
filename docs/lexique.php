<?php
$ext = "../";
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
    <link rel="stylesheet" href="<?php echo $ext; ?>css/admin.css">
    <link rel="stylesheet" href="<?php echo $ext; ?>css/docs.css">
    <link rel="stylesheet" href="https://leolesimple.com/toastLibrary/toast.css">

    <title>Lexique - L'Inventrain</title>

    <!--Scripts-->
    <script src="https://leolesimple.com/toastLibrary/toast.js"></script>
</head>
<body>
<?php
include $ext . "assets/includes/nav.php";
?>
<main class="docsMain" id="content">
    <div class="fil-ariane">
        <a href="../index.php">Accueil</a> > <a href="./index.php">Documentation</a> > <a href="./lexique.php#content">Lexique</a>
    </div>
    <br>
    <header class="titleContainer docs" id="headContent">
        <h1>
            Lexique
        </h1>
        <p>
            Un peu de vocabulaire ? Volontiers ! <br> Voici un lexique des termes utilisés dans le ferroviaire.
        </p>
    </header>
    rame
    voiture
    serie
    US/UM (#usum)
    Système d'automatisation (#automaitonsystem)
    EPIC
    EPA
    STF
    Automotrices
    Services Co et W (#services)
    Rénovation (#reno)
    <section class="docsContent">
        <article id="rame">
            <h3>Rame</h3>
            <p>
                Une rame est un <strong>groupe</strong> de voitures et/ou de locomotives qui circulent ensemble. Il peut s'agir d'une
                composition fixe ou d'une composition modulaire.
            </p>
        </article>
        <article id="voiture">
            <h3>Voiture</h3>
            <p>
                Une voiture (maladroitement appelé wagon) est un véhicule ferroviaire qui peut être tracté ou poussé par une locomotive. Elle transporte des passagers
                <br>
                Un <strong>wagon</strong> transporte du fret, des marchandises seulement.
            </p>
        </article>
        <article id="serie">
            <h3>Série</h3>
            <figure>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/de/Regio_2N_%28Z_57000%29%2C_rame_125R%2C_gare_de_Dreux.jpg/960px-Regio_2N_%28Z_57000%29%2C_rame_125R%2C_gare_de_Dreux.jpg" alt="">
                <figcaption>Un Regio2N à la gare de Dreux</figcaption>
            </figure>
            <p>
                Une série est un groupe de véhicules ferroviaires qui partagent la même architecture, le même design et les mêmes caractéristiques techniques (hors options).
                <br>
                Par exemple, les Regio2N <em>ou Omneo (Premium)</em> est une série de trains à deux niveaux qui circulent sur le réseau ferré français.
            </p>
        </article>
        <article id="usum">
            <h3>US et UM</h3>
            <p>
                US signifie <em>Unité Simple</em>, c'est une rame qui circule seule. <br>UM signifie Unité Multiple, c'est une rame composée de plusieurs rames. Les trains en Île-de-France sont souvent en UM2 (donc deux rames couplées).
                <br><br>
                <strong>Exemple :</strong> Généralement, une série ne peut faire une UM qu'avec elle-même. Par exemple, les MI09 ne peuvent pas faire d'UM avec les MI2N sur le RER A.
            </p>
        </article>
        <article id="automaitonsystem">
            <h3>Système d'automatisation</h3>
            <p>
                Un système d'automatisation est un système qui permet au train d'automatiser certaines tâches à bord, le conducteur peut alors ce concentrer sur la sécurité du train.
                <br>
                Plusieurs niveaux de systèmes d'automatisation existent, des systèmes de sécurité (comme le KVB) aux systèmes d'automatisation avancés (comme le SACEM).
                <br><br>
                <strong>Exemple :</strong> Le SACEM est un système d'automatisation avancé qui permet au train de rouler seul, le conducteur est là pour surveiller le train et intervenir en cas de problème, il s'occupe uniquement de l'échange voyageurs.
                <br>
                Il est utilisé sur le RER A entre Nanterre <> Noisy Champs (Direction MLV) et Nanterre <> Fontenay-sous-Bois (Direction Boissy).
            </p>
        </article>
        <article id="epic">
            <h3>EPIC</h3>
            <p>
                EPIC signifie <em>Établissement Public à caractère Industriel et Commercial</em>, c'est un établissement public qui a pour mission de gérer une activité industrielle ou commerciale.
                <br>
                Par exemple, la RATP est un EPIC qui gère le transport ferroviaire en France.
            </p>
        </article>
        <article id="epa">
            <h3>EPA</h3>
            <p>
                EPA signifie <em>Établissement Public Administratif</em>, c'est un établissement public qui a pour mission de gérer une activité administrative.
                <br>
                Par exemple, la SNCF  est un EPA qui gère le transport ferroviaire en France.
            </p>
        </article>
    </section>

    <section class="nextPrevious">
        <a href="./index.php" class="previous">Retour à la documentation</a>
        <a href="./livraisons.php" class="next">Livraisons</a>
    </section>
</main>
<script src="<?= $ext; ?>js/docs.js"></script>
<script src="<?= $ext; ?>js/app.js"></script>
</body>
</html>