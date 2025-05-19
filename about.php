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

    <link rel="stylesheet" href="<?php echo $ext; ?>/css/app.css">
    <title>À Propos de L'Inventrain</title>
</head>
<body>
<div id="overlay"></div>
<?php
include $ext . "assets/includes/nav.php";
?>
<main class="noCenter" id="content">
    <h1>À Propos de L'Inventrain</h1>
    <section class="legalContent">
        <h2>
            Un site pour tous les passionnés de trains... mais pas que !
        </h2>
        <p>
            <strong>Vous prenez régulièrement le train ou le RER en Île-de-France ?</strong> Vous vous êtes déjà
            demandé quel est ce
            modèle de rame que vous voyez tous les matins ? L’Inventrain est là pour répondre simplement à ce genre
            de
            question.
            <br>
            C’est une base de données accessible qui répertorie les trains en circulation dans la région. Pour
            chaque
            rame, vous pouvez retrouver des infos utiles : modèle, constructeur, ligne d’affectation, dépôt, livrée,
            rénovations… Le tout, présenté de manière claire et structurée.
            <br>
            Que vous soyez curieux, passionné ou juste en train de chercher une info précise, L’Inventrain vous aide
            à
            mieux comprendre ce qui roule autour de vous.
        </p>
    </section>
    <section class="legalContent">
        <h2>
            Un projet collaboratif
        </h2>
        <p>
            L’Inventrain est un projet dynamique. La mise à jour des trains est quotidienne, et la provenance des
            données est vérifiée par les contributeurs.
            <br>
            Ces données proviennent de plusieurs sources, les listes de trains Wikipédia, uniquement celles produites
            par les transporteurs eux-mêmes, des sources officielles internes à la SNCF/RATP, et par les observations
            des contributeurs sur le terrain.
        </p>
    </section>
    <section class="legalContent">
        <h2>
            Porté par un passionné
        </h2>
        <p>
            L'Inventrain est porté par Léo, passionné de trains depuis petit. Dans le cadre de ce projet étudiant,
            partager des connaissances méconnues du grand public a été une évidence. En effet, la plupart des gens ne
            connaissent pas les trains qu'ils prennent tous les jours, et c'est bien dommage ! Ils sont bien plus qu'un
            tas de ferraille ou une « bétaillère » comme peuvent dire certains. Ils possèdent une histoire, parfois, ils
            font partie de l'histoire comme le
            <a href="./detailsTrain.php?id=458">MI79 n°8243/4</a> ayant subi l'attentat de Saint-Michel en 1995, ou le
            Z5301 qui a percuté un autre train à Gare de Lyon en 1988.
            <br>
            L'Inventrain est un projet qui me tient à cœur, et j'espère qu'il vous plaira autant qu'à moi.
        </p>
    </section>
</main>
<?php
include $ext . "assets/includes/footer.php";
?>
</body>
</html>
