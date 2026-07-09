<?php
$ext = "../";
?>

<!doctype html>
<html lang="fr">
<head>
    <?php
    $pageTitle = "Livraisons - L'Inventrain";
    $pageDescription = "Livraisons des trains dans L'Inventrain";
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
        <a href="../index.php">Accueil</a> > <a href="./index.php">Documentation</a> > <a
                href="./livraisons.php#content">Livraisons des trains</a>
    </div>
    <br>
    <header class="titleContainer docs" id="headContent">
        <h1>
            Livraisons
        </h1>
        <p>
            Vous souhaitez ajouter un train réel et vous ne savez pas où trouver l'info ? <br>
            Vous êtes au bon endroit.
        </p>
    </header>
    <section class="docsContent">
        <article id="livraisons">
            <h2>En cours de livraison</h2>
            <h3>
                Z58000/Z58500
            </h3>
            <p>Les RER NG arrivent sur les lignes D et E du RER, vous trouverez l'agenda des livraisons mis à jour <a
                        href="https://fr.wikipedia.org/wiki/Liste_des_Z_58000_/_Z_58500" target="_blank">sur Wikipédia,
                    "Liste des Z58000/Z58500".</a>
            </p>
            <h3>
                Regio2N (Z57000)
            </h3>
            <p>
                Les Regio2N, nouveau train en vogue dans toutes les régions n'est pas encore complètement livré sur le réseau IDFM. Quelques-unes semblent manquer. Vous pourrez retrouver ces dates
                <a href="https://trainsso.fr/Z57000.pdf" target="_blank">sur le site trainsso</a> (tenu par un interne de la SNCF).
            </p>
        </article>
        <article id="renovations">
            <h2>Rénovation</h2>

            <h3>MI2N Altéo (RER A)</h3>
            <p>
                Les MI2N Altéo sont en OPMV (Opération Mie-Vie). La liste Wikipédia (remplie par la RATP sous pseudonymes)
                est disponible <a href="https://fr.wikipedia.org/wiki/Liste_des_Alt%C3%A9o" target="_blank">ici</a>.
            </p>

            <h3>Z2N (RER C, D, Transilien P, U, V)</h3>
            <p><strong>Aucune source ne permet de donner de date de rénovation au 03/03/2025.</strong></p>

            <h3>MI79/MI84 (RER B)</h3>
            <p>
                <a href="https://fr.wikipedia.org/wiki/Liste_des_Z_8100" target="_blank">Liste des MI79/MI84 sur Wikipédia</a>.
                <br><strong>Les rénovations des MI84 se terminent en juin 2025.</strong>
            </p>
        </article>

        <article id="retraits">
            <h2>Retrait de service</h2>

            <h3>Z22500 (MI2N Eole, RER E)</h3>
            <p>
                Suite à une trop grande incompatibilité avec le RER NG, la radiation des MI2N Eole a été avancée de six mois.
                <br>
                <a href="https://fr.wikipedia.org/wiki/Liste_des_Z_22500" target="_blank">Liste des Z22500</a>.
            </p>

            <h3>VB2N (Transilien J)</h3>
            <p>
                Le prolongement du RER E à Mantes-la-Jolie arrive. Ces rames des années 70 partent à la retraite.
                <br>
                <a href="https://fr.wikipedia.org/wiki/VB2N" target="_blank">Liste des VB2N</a>.
            </p>

            <h3>MI79/MI84 (RER B)</h3>
            <p>
                Les MI84 ont déjà été en partie radiés, mais le reste le sera à partir de 2027.
                <br>
                <a href="https://fr.wikipedia.org/wiki/Liste_des_Z_8100" target="_blank">Liste des MI79/MI84</a>.
            </p>
        </article>
    </section>

    <section class="nextPrevious">
        <a href="./index.php" class="previous">Retour à la documentation</a>
        <a href="./add_trains.php" class="next">Livraisons</a>
    </section>
</main>
<?php
include $ext . "assets/includes/footer.php";
?>
<script src="<?= $ext; ?>js/docs.js"></script>
<script src="<?= $ext; ?>js/app.js"></script>
</body>
</html>