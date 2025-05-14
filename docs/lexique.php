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
    <section class="docsContent">
        <article id="rame">
            <h2>Rame</h2>
            <p>
                Une rame est un <strong>groupe</strong> de voitures et/ou de locomotives qui circulent ensemble. Il peut s'agir d'une
                composition fixe ou d'une composition modulaire.
            </p>
        </article>
        <article id="voiture">
            <h2>Voiture</h2>
            <p>
                Une voiture (maladroitement appelé wagon) est un véhicule ferroviaire qui peut être tracté ou poussé par une locomotive. Elle transporte des passagers
                <br>
                Un <strong>wagon</strong> transporte du fret, des marchandises seulement.
            </p>
        </article>
        <article id="serie">
            <h2>Série</h2>
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
            <h2>US et UM</h2>
            <p>
                US signifie <em>Unité Simple</em>, c'est une rame qui circule seule. <br>UM signifie Unité Multiple, c'est une rame composée de plusieurs rames. Les trains en Île-de-France sont souvent en UM2 (donc deux rames couplées).
                <br><br>
                <strong>Exemple :</strong> Généralement, une série ne peut faire une UM qu'avec elle-même. Par exemple, les MI09 ne peuvent pas faire d'UM avec les MI2N sur le RER A.
            </p>
        </article>
        <article id="automaitonsystem">
            <h2>Système d'automatisation</h2>
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
            <h2>EPIC</h2>
            <p>
                EPIC signifie <em>Établissement Public à caractère Industriel et Commercial</em>, c'est un établissement public qui a pour mission de gérer une activité industrielle ou commerciale.
                <br>
                Par exemple, la RATP est un EPIC qui gère le transport ferroviaire en France.
            </p>
        </article>
        <article id="epa">
            <h2>EPA</h2>
            <p>
                EPA signifie <em>Établissement Public Administratif</em>, c'est un établissement public qui a pour mission de gérer une activité administrative.
                <br>
                Par exemple, la SNCF est un EPA qui gère le transport ferroviaire en France.
            </p>
        </article>
        <article id="stf">
            <h2>STF</h2>
            <p>
                Un STF (Supervision Technique de Flotte), parfois désigné à tort sous le nom de <em>dépôt</em> est un établissement ferroviaire qui peut contenir un ou plusieurs dépôts (voies de garages), un centre de maintenance (technicentre), un centre de formation, etc. Il est chargé de la gestion de la flotte de trains d'une partie du réseau, une rame est <strong>forcément</strong> rattachée à un STF et peut en changer au cours de sa vie.
                <br>
                Par exemple, le STF Saint Lazare possède 4 dépôts (Clichy, Achères, Val Notre-Dame, Mantes-la-Jolie), un centre de formation (à La Garenne Colombes), 2 technicentres (Clichy, Achères) et est chargé de la supervision des Lignes L et J du Transilien ainsi que de la partie SNCF du RER A.
            </p>
        </article>
        <article id="automotrices">
            <h2>Automotrices</h2>
            <p>
                Une automotrice est un train qui possède sa propre source d'énergie, il n'a pas besoin d'une locomotive pour circuler. Il peut être composé de plusieurs voitures ou d'une seule voiture.
                <br>
                Aujourd'hui, la plupart des trains sont des automotrices, elles sont plus légères et plus économiques à l'usage. Elles peuvent être électriques ou diesel. Seules les VB2N+BB27300 ne sont pas des automotrices en IDF.
            </p>
        </article>
        <article class="services">
            <h2>Services</h2>
            <h3 style="margin-left: 1rem;">Commercial</h3>
            <p>
                Un service commercial est un train qui circule sur le réseau et qui est destiné à transporter des passagers. Il est identifié par un numéro unique ou un code mission (ex. QDIL34, QUDO56 (code missions RER A), 130859 (numéro circulation Ligne J)).
            </p>
            <h3 style="margin-left: 1rem;">W (Vide Voyageurs)</h3>
            <p>
                Un service W est un train qui circule sans voyageurs, il sert soit à déplacer un train vers son terminus/origine ou le déposer dans un technicentre pour maintenance et bien plus. Il est aussi identifié par un numéro unique ou un code contenant W ou 00, (ex. WXWB ou 003849)
            </p>
        </article>
        <article id="reno">
            <h2>Rénovation</h2>
            <p>
                La rénovation est un processus qui consiste à moderniser un train pour le rendre plus performant et plus confortable. Elle peut concerner l'intérieur, l'extérieur ou les deux.
                <br>
                Un train peut-être rénové de plusieurs manières.
            </p>
            <ul>
                <li>
                    <strong>OPMV (Opération Mie-Vie)</strong>: Réalisée à la moitié de la durée de vie du train (entre 15 et 20 ans), elle consiste à remettre le train à neuf (changement de motorisation, changement intérieurs majeurs, conversion diesel-éléctrique, etc.)
                </li>
                <li>
                    <strong>RL (Rénovation Légère)</strong> : Réalisée tous les 3/4 ans, elle permet de refaire la livrée du train, changer les selleries ou encore revoir les systèmes de conduite, mettre à jour le
                    <a href="#sive">SIVE</a>, etc.
                </li>
                <li>
                    <strong>
                        RLO (Rénovation Lourde)
                    </strong>
                    : Réalisée à la fin de vie des trains en cas de prolongement de leur durée de service, elle est entre l'OPMV et la rénovation Légère, elle permet seulement de garder un train propre et en bon état de marche.
                </li>
            </ul>
            <p>
                <strong>Exemples :</strong> <br>
            </p>
            <ul>
                <li>
                    <strong>MI2N (RER A)</strong>: Leur <em>OPMV</em> a commencée en 2020 et les premières rames (bleues) circulent sur le RER A depuis octobre 2024.
                </li>
                <li>
                    <strong>
                        MI84 (RER B)
                    </strong>
                    : Partis en OPMV en 2015, les MI84 sont en cours de <em>RLO</em> en raison de leur prolongement de service jusqu'en 2030, en cause le retard des MI20.
                </li>
                <li>
                    <strong>
                        Z50000
                    </strong>
                    : Ces rames ont subies une <em>RL</em> entre 2018 et 2021 pour changer la livrée Carmillon (couleur de la SNCF) vers la livrée Île-de-France Mobilités (bleues).
                </li>
            </ul>
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