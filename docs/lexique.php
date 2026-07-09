<?php
$ext = "../";
?>

<!doctype html>
<html lang="fr">
<head>
    <?php
    $pageTitle = "Lexique - L'Inventrain";
    $pageDescription = "Lexique de L'Inventrain";
    $cssFiles = ['app.css', 'admin.css', 'docs.css'];
    $includeToast = true;
    include "../assets/includes/head.php";
    ?>

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
                Un système d'automatisation est un système qui permet au train d'automatiser certaines tâches à bord, le conducteur peut alors se concentrer sur la sécurité du train.
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
                Un service W est un train qui circule sans voyageurs, il sert soit à déplacer un train vers son terminus/origine ou le déposer dans un technicentre pour maintenance et bien plus. Il est aussi identifié par un numéro unique ou un code contenant W ou 00, (ex. WXWB ou 003849).
            </p>
        </article>
        <article id="reno">
            <h2>Rénovation</h2>
            <p>
                La rénovation est un processus qui consiste à moderniser un train pour le rendre plus performant et plus confortable. Elle peut concerner l'intérieur, l'extérieur ou les deux.
                <br>
                Un train peut être rénové de plusieurs manières.
            </p>
            <ul>
                <li>
                    <strong>OPMV (Opération Mie-Vie)</strong> : Réalisée à la moitié de la durée de vie du train (entre 15 et 20 ans), elle consiste à remettre le train à neuf (changement de motorisation, changement intérieurs majeurs, conversion diesel-éléctrique, etc.)
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
                    <strong>MI2N (RER A)</strong> : Leur <em>OPMV</em> a commencé en 2020 et les premières rames (bleues) circulent sur le RER A depuis octobre 2024.
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
                    : Ces rames ont subi une <em>RL</em> entre 2018 et 2021 pour changer la livrée Carmillon (couleur de la SNCF) vers la livrée Île-de-France Mobilités (bleues).
                </li>
            </ul>
        </article>
        <article id="sive">
            <h2>SIVE</h2>
            <p>
                Le SIVE, ou Système d’Information Voyageurs Embarqué, est un dispositif installé à bord des trains pour informer les passagers en temps réel. Il se compose généralement d’écrans, d’annonces sonores et de panneaux lumineux.
                <br>
                Ce système affiche les arrêts à venir, les correspondances ou les perturbations éventuelles sur le trajet.
            </p>
        </article>
    </section>

    <section class="nextPrevious">
        <a href="./index.php" class="previous">Retour à la documentation</a>
        <a href="./livraisons.php" class="next">Livraisons</a>
    </section>
</main>
<?php
include $ext . "assets/includes/footer.php";
?>
<script src="<?= $ext; ?>js/docs.js"></script>
<script src="<?= $ext; ?>js/app.js"></script>
</body>
</html>