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

    <title>Comment ajouter un train ? - L'Inventrain</title>

    <!--Scripts-->
    <script src="https://leolesimple.com/toastLibrary/toast.js"></script>
</head>
<body>
<?php
include $ext . "assets/includes/nav.php";
?>
<main class="docsMain" id="content">
    <div class="fil-ariane">
        <a href="../index.php">Accueil</a> > <a href="./index.php">Documentation</a> > <a href="./add_trains.php">Ajouter
            un train</a>
    </div>
    <br>
    <header class="titleContainer docs" id="headContent">
        <h1>
            Ajouter un train
        </h1>
        <p>
            Découvrez comment ajouter un train à L'Inventrain <br> via l'espace sécurisé et de manière réaliste.
        </p>
    </header>

    <!--alert-->
    <section class="docAlert" role="alert">
        <p>
            <strong>Attention !</strong> Conscient que certains termes techniques peuvent présenter un problème de
            compréhension, j’ai pris la décision de rédiger une documentation dédiée à la manipulation des données
            techniques présentes dans le projet. Un <a href="./lexique.php">lexique</a> est également disponible pour
            aider la compréhension.
        </p>
    </section>
    <section class="docsContent">
        <h2>Multiples Étapes</h2>
        <p>
            Les trains de la SNCF et de la RATP ont des caractéristiques techniques, d’affectation et de sécurité
            spécifiques qui les définissent. Ces données sont cruciales pour le bon fonctionnement d’un inventaire de
            rames, comme L’Inventrain. Elles permettent de localiser le train, de déterminer à qui s’adresser et de
            connaître son historique d’entretien.
        </p>
        <h2>Utiliser les données </h2>
        <p>
            Le panel de données possibles pour inventorier un train est énorme. Cependant, j'ai décidé (par soucis de
            compléxité et par soucis de temps) de ne pas tout ajouter, mais de me concentrer sur les données les plus
            importantes. Voici comment utiliser les données disponibles dans L'Inventrain.
        </p>
        <h2>Données Générales</h2>
        <article>
            <h3>Numéro de la <a target="_blank" href="./lexique.php#rame">rame</a></h3>
            <dl>
                <dt>🤔 Qu’est-ce que c’est ?</dt>
                <dd>
                    Le numéro de rame permet d'identifier de manière unique un groupe de <a target="_blank"
                                                                                            href="./lexique.php#voiture">voitures</a>
                    parmi une <a target="_blank" href="./lexique.php#serie">série</a> et depuis les années 2000, un
                    numéro de rame doit être unique sur tout le réseau férré français.
                </dd>
                <dt>🛠️ Utilisation</dt>
                <dd>
                    Ce numéro de rame est formaté de manière simple côté SNCF et RATP, ils sont composés comme suit :
                    <ul>
                        <li><strong>12345</strong> : Le numéro de la locomotive à laquelle les voitures sont couplées.
                        </li>
                        <li><strong>000A</strong> (trois chiffres suivis d'une lettre) : Nouvelle nomenclature, la
                            lettre correspondant au dépôt d'affectation. <br><em>Attention ! Dans une même série, il
                                n'existe pas de 001A et de 001H, ce sera 001A et 002H.</em></li>
                        <li><strong>000TT</strong> : Nomenclature Tram-Train.</li>
                        -
                        <li><strong>0000</strong> : Nomenclature RATP pour les rames des lignes A et B du RER.</li>
                    </ul>
                </dd>
            </dl>
            <p>On peut le trouver à l'avant ou sur le flanc de la première voiture de la rame (<a target="_blank"
                                                                                                  href="./lexique.php#automotrices">automotrices</a>)
                ou sur le flanc de la locomotive (loco+voitures).</p>
        </article>
        <article>
            <h3>Nom de la <a target="_blank" href="./lexique.php#serie">série</a></h3>
            <dl>
                <dt>🤔 Qu’est-ce que c’est ?</dt>
                <dd>
                    Le nom de la série, c'est l'identifiant d'un groupe de rames. Il est unique et s'incrémente au fur
                    et à mesure des appels d'offre soit de 10 000 en 10 000, soit par nom d'acronyme, à la SNCF, ce sera
                    lettres + chiffres (comme Z 50000 ou BB 27300) et la RATP, utilises un acronyme (comme MI09 pour
                    Matériel d'Interconnexion Appel d'Offre 2009), pour en savoir plus, consultez la <a target="_blank"
                                                                                                        href="./lexique.php#nommenclature_serie">nommenclature
                        des séries</a>.
                </dd>
                <dt>🛠️ Utilisation</dt>
                <dd>
                    Chaque série est déjà présente dans la base de données, il vous suffit de la sélectionner dans le
                    menu déroulant. Les séries futures y sont également présentes bien que les rames de pré-série ne
                    soient pas encore livrées ou commandées. Aucun ajout n'est nécessaire.
                    <br>
                    Pour différencier les séries, je vous invite à vous référer à la page des <a target="_blank"
                                                                                                 href="./livraisons.php">trains
                        en livraisons</a> qui vous donnera la liste des trains non ajoutés à L'Inventrain pour que vous
                    puissiez les ajouter vous-mêmes.
                </dd>
            </dl>
        </article>
        <article>
            <h3>Année de mise en service</h3>
            <dl>
                <dt>🤔 Qu’est-ce que c’est ?</dt>
                <dd>
                    Chaque série possède une date de mise en service qui peut être différente de la date de mise en
                    service de chaque rame. Cette date est la date à laquelle la première rame de la série a été mise en
                    service, soit l'inauguration publique de la série. Exemple : la série MI09 a été mise
                    en service sur le RER A en 2011 par M. Sarkozy, bien que la première MI09 ait été livrée en 2009.
                </dd>
                <dt>🛠️ Utilisation</dt>
                <dd>
                    Pour simplifier les structures de données, chaque série possède une année de mise en service et non
                    la date précise. Les rames pré-1990 n'ayant pas eu d'inauguration à date précise.
                </dd>
            </dl>
        </article>
        <article>
            <h3>Nom alternatif</h3>
            <dl>
                <dt>🤔 Qu’est-ce que c’est ?</dt>
                <dd>
                    Une série peut posséder un ou plusieurs noms alternatifs, qui sont des surnoms ou des noms d'usage
                    de la série. Ces noms sont souvent utilisés par les passionnés et les équipes de communication pour
                    éviter de nommer par exemple une Z 50000 par son nom complet, mais par son nom d'usage NAT (Nouvelle
                    Automotrice Transilien) ou Francilien.
                </dd>
                <dt>🛠️ Utilisation</dt>
                <dd>
                    <strong>Ce champ n'est pas obligatoire</strong>
                </dd>
            </dl>
        </article>
        <article>
            <h3>Constructeur</h3>
            <dl>
                <dt>🤔 Qu’est-ce que c’est ?</dt>
                <dd>
                    Le constructeur est l’entreprise qui fabrique le train. Alstom ayant racheté de nombreuses
                    entreprises, il a été décidé pour L’Inventrain d’attribuer le nom de l’entreprise d’origine, par
                    exemple ANF et CIMT. Les séries fabriquées au milieu d’un rachat, comme la Z50000, sont attribuées
                    au constructeur existant au moment de la livraison de la rame. Les rames livrées entre 2009 et 2020
                    ont été fabriquées par Bombardier, et celles livrées entre 2020 et 2022 par Alstom.
                </dd>
                <dt>🛠️ Utilisation</dt>
                <dd>
                    Les pages Wikipédia des séries sont généralement bien construites et vérifiées par les entreprises
                    concernées. Il est donc recommandé de s’y référer pour connaître le fabricant d’une série. La page
                    des trains en livraisons peut également fournir cette information.
                </dd>
            </dl>
        </article>
        <article>
            <h3>Système de Conduite</h3>
            <dl>
                <dt>🤔 Qu’est-ce que c’est ?</dt>
                <dd>
                    Le système de conduite est le nom du système d’automatisation qui assiste le conducteur. Il est
                    important de le noter, car il permet de savoir si la rame est équipée d’un système de conduite
                    automatique ou non. Il existe plusieurs systèmes de conduite, comme le SACEM (RER A), le KVB (SNCF
                    Réseau), le BAL (RATP) et d'ici à 2027, NExTEO (SNCF Réseau - RER B, D, E).
                </dd>
                <dt>🛠️ Utilisation</dt>
                <dd>
                    cf. Page des trains en livraisons.
                </dd>
            </dl>
        </article>
        <article>
            <h3><a target="_blank" href="./lexique.php#automationsystem">Niveau d'automisation / GOA</a></h3>
            <dl>
                <dt>🤔 Qu’est-ce que c’est ?</dt>
                <dd>
                    Le niveau d’automatisation est une échelle indiquant à quel point le conducteur est assisté par le système
                    de conduite. Il existe plusieurs niveaux, allant de GOA0 à GOA4.
                    <ul>
                        <li>
                            <strong>GOA0</strong> : Le système de conduite ne gère que les aiguillages, c'est une
                            conduite à vue. (Tramway)
                        </li>
                        <li>
                            <strong>GOA1</strong> : Le système de conduite gère en plus, le respect de la signalisation
                            et de la vitesse ainsi que la distance entre deux trains. (KVB, BAL)
                        </li>
                        <li>
                            <strong>GOA2</strong> : Le système de conduite est semi-automatisée, il gère tout départ et
                            arrêt inclus SAUF les <a target="_blank" href="./lexique.php#ev">échanges voyageurs</a>. Le
                            conducteur est toujours présent en cabine, en cas d'urgence, il peut reprendre en conduite
                            manuelle. (SACEM, Métro de Paris)
                        </li>
                        <li>
                            <strong>GOA3</strong> : La conduite est entièrement automatisée, le système gère même la
                            présence d'obstacle sur les voies, un opérateur est présent dans le train en cas d'urgence,
                            mais n'est pas conducteur. (NExTEO, Ligne 4 du Métro de Lyon).
                        </li>
                        <li>
                            <strong>GOA4</strong> : La conduite est entièrement automatisée, sans conducteur, ni
                            opérateur, ces systèmes sont souvent en milieu hermétique avec <a target="_blank"
                                                                                              href="./lexique.php#portespal">portes
                                palières</a>. (Ligne 1, 4, 14 du Métro de Paris).
                        </li>
                    </ul>
                </dd>
                <dt>🛠️ Utilisation</dt>
                <dd>
                    <strong>
                        Ce champ n'est pas obligatoire</strong>
                    <br>
                    Le niveau d'automatisation est plus compliqué à trouver, il est donc recommandé de le laisser vide,
                    mes sources sont internes à la SNCF.
                </dd>
            </dl>
        </article>
        <article>
            <h3>Divers</h3>
            <ul>
                <li><strong>Capacité</strong> : Nombre de places (assises et debouts) d'une rame (en <a target="_blank"
                                                                                       href="./lexique.php#usum">US</a>).
                </li>
                <li><strong>Vitesse maximale</strong> : Vitesse maximale autorisée en service commercial (≠ vitesse maximale théorique)
                </li>
                <li><strong>Masse</strong> : Masse d'une rame en <a target="_blank" href="./lexique.php#usum">US</a></li>
            </ul>
        </article>

        <h2>Données par rame</h2>
        <article>
            <h3>Livrée</h3>
            <dl>
                <dt>🤔 Qu’est-ce que c’est ?</dt>
                <dd>
                    La livrée d'une rame correspond à l'apparence extérieure de la rame. Elle est utilisées pour
                    habiller le train et identifier le propriétaire de la rame.
                    <br>
                    <strong>Depuis 2019, Île-de-France Mobilités a décidé de repeindre progressivement <em>tous</em> les
                        trains dans la livrée IDFM bleue, ce qui referme le grand panel des livrées pour une et
                        uniquement.
                        <br> Certains trouvent cela trop outrancier de la part d'IDFM pour exhiber le fait que ce sont
                        eux qui financent ces trains.</strong>
                </dd>
                <dt>🛠️ Utilisation</dt>
                <dd>
                    Pour voir quelle est la livrée du train, je vous invite à vous référer à la page des <a
                            target="_blank"
                            href="./livraisons.php">trains
                        en livraisons</a>.
                </dd>
            </dl>
        </article>
        <article>
            <h3>Propriétaire</h3>
            <div class="docAlert red">
                <strong>Attention ! Faire la différence entre la SNCF et les SAS SNCF est important. </strong><br>
                La SNCF n'existe plus depuis le 1<sup>er</sup> janvier 2020, elle a été remplacée par les SAS SNCF, qui
                divise chaque corps de métier en une entreprise, les trains sont exploités par SNCF Voyageurs, SNCF
                Réseau est le gestionnaire d'infrastructure, etc.
                <br> Pour en apprendre plus, je vous invite à lire cette page traitant <a target="_blank"
                                                                                          href="https://www.groupe-sncf.com/fr/groupe/portrait-entreprise/groupe-societes">des
                    sociétés du Groupe SNCF</a>.
            </div>
            <dl>
                <dt>🤔 Qu’est-ce que c’est ?</dt>
                <dd>
                    Entreprise possédant la rame, elle peut être différente de l'entreprise exploitante. Par exemple,
                    SNCF Voyageurs louent certaines rames à SNCF Matériel ou aux Régions (hors IDF), les rames post-2009,
                    appartiennent à Île-de-France Mobilités (IDFM) et sont louées à SNCF Voyageurs/RATP/Stretto
                    (T4/T11/T14), dans une logique de mise en concurrence voulue par l'UE.
                    <br><br>
                    Certaines rames appartenaient à la SNCF (ex. Regio2N) avant d'être revendues à IDFM.
                </dd>
                <dt>🛠️ Utilisation</dt>
                <dd>
                    Pour voir quelle est la livrée du train, je vous invite à vous référer à la page des <a
                            target="_blank"
                            href="./livraisons.php">trains
                        en livraisons</a>.
                </dd>
            </dl>
        </article>
        <article>
            <h3>Dépôt / STF</h3>
            <dl>
                <dt>🤔 Qu’est-ce que c’est ?</dt>
                <dd>
                    Le dépôt, auquel la rame est attaché, est appelé STF (Supervision Technique de Flotte). Il s'agit de
                    l'endroit sur lequel la rame est "immatriculée" et où elle est entretenue. Un STF peut contenir
                    plusieurs dépôts, par exemple, le STF de Paris Saint-Lazare contient les dépôts/technicentres de
                    Clichy, Achères Grand Cormier, etc.
                </dd>
                <dt>🛠️ Utilisation</dt>
                <dd>
                    En général, les STF sont les mêmes en fonction des lignes d'affectation, ils sont disponibles sur la
                    page des <a
                            target="_blank"
                            href="./livraisons.php">trains
                        en livraisons</a>.
                </dd>
            </dl>
        </article>
        <article>
            <h3>Divers</h3>
            <ul>
                <li><strong>Date de Livraison</strong> : Date à laquelle le constructeur dépose la rame dans le dépôt (≠ date de mise en
                    service).
                </li>
                <li><strong>Date de radiation</strong> : Date à laquelle la rame est mise au rebut <strong>DÉFINITIVEMENT</strong>. </li>
                <li><strong>Réseau d'affectation</strong> : Réseau d'un <a target="_blank" href="lexique.php#epic">EPIC</a> (RATP, SNCF
                    Réseau) sur lequel la rame est autorisée à circuler.
                </li>
                <li><strong>Ligne d'Affectation</strong> : Ligne(s) commerciale(s) sur laquelle/lesquelles le train est amené à rouler en <a target="_blank" href="lexique.php#services">service commercial</a>.</li>
                <li><strong>Rénovation</strong> : Rénovation la plus récente de la rame (voir les <a target="_blank" href="lexique.php#reno">types de rénovation)</a>.</li>
            </ul>
        </article>
        <p>
            Maintenant, vous savez tout sur les termes techniques du ferroviaire français. Vous pouvez ajouter votre train à L'Inventrain en revenant à votre onglet précédent.
        </p>
    </section>
    <section class="nextPrevious">
        <a href="./index.php" class="previous">Retour à la documentation</a>
        <a href="./lexique.php" class="next">Lexique</a>
    </section>
</main>
<?php
include $ext . "assets/includes/footer.php";
?>
<script src="<?= $ext; ?>js/docs.js"></script>
<script src="<?= $ext; ?>js/app.js"></script>
</body>
</html>
