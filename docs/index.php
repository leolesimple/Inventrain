<?php
$ext = "../"
?>

<!doctype html>
<html lang="fr">
<head>
    <?php
    $pageTitle = "Accueil de la Documentation - L'Inventrain";
    $pageDescription = "Documentation de L'Inventrain";
    $canonicalUrl = "https://linventrain.leolesimple.fr/docs/index.php";
    $cssFiles = ['app.css', 'docs.css'];
    include "../assets/includes/head.php";
    ?>
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
