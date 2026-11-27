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
    <link rel="stylesheet" href="<?php echo $ext; ?>/css/docs.css">
    <title>Propriété Intellectuelle - L'Inventrain</title>
</head>
<body>
<div id="overlay"></div>
<?php
include $ext . "assets/includes/nav.php";
?>
<main class="noCenter" id="content">
    <h1>Propriété Intellectuelle</h1>
    <section class="legalContent">
        <h2>Images & Illustration</h2>
        <p>
            Toutes les illustrations présentes sur le site sont la propriété de Léo Lesimple. <br>
            Elles sont soumises à des droits d'auteur et ne peuvent être reproduites sans autorisation préalable à
            l'écrit.
        </p>
        <p>
            Exception : la photographie de la page d'accueil (« RER NG 009M ») est l'œuvre d'Adnane, publiée sur
            <a href="https://commons.wikimedia.org/wiki/File:RER_NG_009M.jpg">Wikimedia Commons</a> sous licence
            <a href="https://creativecommons.org/licenses/by-sa/4.0/deed.fr">CC BY-SA 4.0</a>. Elle est hébergée
            avec le site, dans une version redimensionnée.
        </p>
        <p>
            Icônes : Font Awesome Free (icônes sous licence CC BY 4.0, polices sous licence SIL OFL 1.1, code sous
            licence MIT), hébergées avec le site.
        </p>
    </section>
    <section class="legalContent">
        <h2>Logo</h2>
        <p>
            Le logo graphique "L'Inventrain", représentant un MI09 de face est la propriété de Léo Lesimple. Il est
            recréé à partir d'images réelles de MI09
        </p>
        <hr>
        <p>
            Le logo "L'Inventrain" écrit, est soumis à la license propriétaire de la police "Meshed Display". <br>
            <a
                    href="./licenses/License_Meshed_Display.pdf">Consulter la license (PDF, 69 ko)</a>.
        </p>
    </section>
    <section class="legalContent">
        <h2>
            Polices
        </h2>
        <p>
            Les polices utilisées sur le site "L'Inventrain" sont :
        <ul>
            <li>
                <strong>Meshed Display</strong> : utilisée pour le logo "L'Inventrain" écrit et les titres, est soumise
                à la license propriétaire de la police "Meshed Display" <br>
                <a
                        href="./licenses/License_Meshed_Display.pdf">Consulter la license (PDF, 69 ko)</a>.
            </li>
            <li>
                <strong>IBM Plex Sans</strong> : utilisée pour le texte du site, est soumise à la license SIL Open Font License 1.1 et hébergée avec le site <br> <a
                        href="./licenses/OFL.txt">Consulter la license OFL (TXT, 5 ko)</a>.
            </li>
            <li><s>
                <strong>PT Sans</strong> : utilisée pour le texte du site, est soumise à la license SIL Open Font License 1.1 <br> <a
                            href="./licenses/OFL.txt" aria-disabled="true" class="disabledLink">Consulter la license OFL (TXT, 5 ko)</a>.</s>
            </li>
        </ul>
        <div class="docAlert red">
            <p>
                <strong>
                    Attention !
                </strong>
                <br>
                Suite à la découverte récente que la police « PT Sans » a été conçue pour le gouvernement russe et qu’elle est toujours utilisée par ce dernier, et conscient du caractère problématique de cette symbolique, j'ai procédé au remplacement de la police « PT Sans » par la police « IBM Plex Sans » sur le site.
                <br>
                Toute mention de la police "PT Sans" dans ce site est donc obsolète et n'est plus utilisée.
                <br>
            </p>
        </div>
    </section>
    <section class="legalContent">
        <h2>
            Données "Île-de-France Mobilités"
        </h2>
        <p>
            Les données du fichier lineReferentiel.json proviennent du référentiel des lignes publié par Île-de-France
            Mobilités sur <a href="https://prim.iledefrance-mobilites.fr/" target="_blank" rel="noopener noreferrer">PRIM</a>
            et l'<a href="https://opendata.iledefrance-mobilites.fr/" target="_blank"
                    rel="noopener noreferrer">OpenData</a> sous licence ODbL.
            <br>
            Les indices visuels des lignes sont ceux d’Île-de-France Mobilités, diffusés en <a
                    href="https://opendata.iledefrance-mobilites.fr/" target="_blank"
                    rel="noopener noreferrer">OpenData</a> sous licence ODbL.

        </p>
    </section>
    <section class="legalContent">
        <h2>
            Base de données
        </h2>
        <p>
            La base de données de L'Inventrain contient plusieurs types de données provenant de sources différentes, toutes vérifiées.
            <br>
            <strong>
                Attention !
            </strong>
            Certaines données proviennent d'une source interne à la SNCF m'ayant été fournie, merci de manipuler ces données avec prudence.
            <br>
            <em>Pour plus d'informations sur la provenance des données, n'hésitez pas à me contacter.</em>
        </p>
    </section>
    <section class="legalContent">
        <h2>
            Utilisation de l'IA
        </h2>
        <p>
            Lors de la confection de L'Inventrain, l'IA n'a été utilisée qu'en dernier recours face à un bug ou un problème dans le développement du site, toute utilisation de l'IA a été vérifiée et est notifiée dans le code source aux endroits concernés.
            <br>
            <strong>
                Aucune donnée n'a été générée par l'IA.
            </strong>
            <br><br>
            De plus, pour gagner de temps, les requètes SQL d'ajout de trains ont été formatées par "Le Chat" par Mistral AI, dans le but d'ajouter plus rapidement les milliers de trains d'Île-de-France. (😉 La base de données contient 1405 trains au 5/05/2025).
        </p>
    </section>
</main>
<?php
include $ext . "assets/includes/footer.php";
?>
</body>
</html>
