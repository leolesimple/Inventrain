<?php
$ext = "./";
?>

<!doctype html>
<html lang="fr">
<head>
    <?php
    $pageTitle = "A Propos de L'Inventrain";
    $pageDescription = "A propos de L'Inventrain, le site pour inventorier le materiel ferre d'Ile-de-France";
    include "./assets/includes/head.php";
    ?>
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
