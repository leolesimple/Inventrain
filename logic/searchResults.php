<?php
include './assets/includes/conn.php';


/*
 * Utilisation de l'IA pour la concaténation de la requête à la table de train_line uniquement.
 * Prompt : Comment puis-je récupérer toutes les informations sur les trains dans la base de données “inventrain”, y compris les lignes sur lesquelles chaque train circule, même si un train est affecté à plusieurs lignes ?
 * Modèle : GPT 4o (Version Plus)
 */
$search = $_GET['search'] ?? '';

// Anti injection SQL
$search = htmlspecialchars($search, ENT_QUOTES, 'UTF-8');
$search = preg_replace('/[^a-zA-Z0-9_]/', '', $search);

$sql = "SELECT
  train.idTrain,
  train.number,
  series.name AS serie_name,
  series.altName AS serie_alt_name,
  series.serviceStartYear,
  series.capacity,
  series.maxSpeed,
  series.masse,
  automation.goaLevel,
  automation.type AS automation_type,
  trainSystem.name AS system_name,
  livery.name AS livery_name,
  manufacturer.name AS manufacturer_name,
  train.deliveryDate,
  network.name AS network_name,
  status.state AS status,
  depot.name AS depot_name,
  renovation.renovationType,
GROUP_CONCAT(DISTINCT line.LineRef ORDER BY line.LineRef SEPARATOR ', ') AS lignes_affectees,
train.incidents
FROM train
LEFT JOIN series ON train.idSerie = series.idSerie
LEFT JOIN automation ON series.idAutomation = automation.idAutomation
LEFT JOIN trainSystem ON series.idSystem = trainSystem.idSystem
LEFT JOIN livery ON train.idLivery = livery.idLivery
LEFT JOIN manufacturer ON train.idManufacturer = manufacturer.idManufacturer
LEFT JOIN network ON train.idNetwork = network.idNetwork
LEFT JOIN status ON train.idStatus = status.idStatus
LEFT JOIN depot ON train.idDepot = depot.idDepot
LEFT JOIN renovation ON train.idRenovation = renovation.idRenovation
LEFT JOIN train_line ON train.idTrain = train_line.idTrain
LEFT JOIN line ON train_line.idLine = line.idLine
WHERE train.number LIKE '%" . $conn->real_escape_string($search) . "%'
GROUP BY train.idTrain
ORDER BY train.idTrain DESC";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $jsonLines = file_get_contents('./assets/json/LineReferentiel.json');
    $lineData = json_decode($jsonLines, true);

    $jsonIcons = file_get_contents('./assets/json/serieInfos.json');
    $lineIcons = json_decode($jsonIcons, true);

    $livery = [];

    // Affichage du nombre de résultats
    echo '<div class="resultCount">';
    if ($result->num_rows == 1) {
        echo '1 train trouvé';
    } else {
        echo $result->num_rows . ' trains trouvés';
    }
    echo '</div>';

    while ($row = $result->fetch_assoc()) {
        // Données à afficher
        $number = $row["number"];
        $serie = $row["serie_name"];
        $startYear = $row["serviceStartYear"];
        $lignes_affectees = $row["lignes_affectees"];
        if ($lignes_affectees) {
            $lignes_affectees = explode(", ", $lignes_affectees);
            $lignes_affectees = array_map('trim', $lignes_affectees);
        } else {
            $lignes_affectees = [];
        }

        // Badge Color en fonction de l'année de début de service en fonction de la série de livrées.
        if ($startYear >= 1970 && $startYear <= 1979) {
            $badgeColor = "grayBadge";
        } elseif ($startYear >= 1980 && $startYear <= 1994) {
            $badgeColor = "yellowBadge";
        } elseif ($startYear >= 1995 && $startYear <= 2008) {
            $badgeColor = "redBadge";
        } elseif ($startYear >= 2009 && $startYear <= 2019) {
            $badgeColor = "blueBadge";
        } elseif ($startYear >= 2020 && $startYear <= 2029) {
            $badgeColor = "blueBadge";
        } else {
            $badgeColor = "grayBadge";
        }

        $htmlIcons = "";
        foreach ($lignes_affectees as $key => $value) {
            if (isset($lineData[$value])) {
                $lineIcon = $lineData[$value]['icon'];
            } else {
                $lineIcon = "default_icon.svg"; // Fallback
            }
            $icon = "<img src='https://infostation.fr/img/lignes/$lineIcon' height='30' alt='Ligne " . $lineData[$value]['letter'] . "' class='iconLigne'>";
            $htmlIcons .= $icon;
        }

        $livree = $row["livery_name"];

        if (!in_array($livree, $livery)) {
            $livery[] = $livree;
        }
        if ($serie == "mi84" or $serie == "mi79") {
            $icon_array = $serie . "_*";
        } elseif ($serie == "B 82500" or $serie == "U52600" or $serie == "U53600" or $serie == "U53700" or $serie == "U53800") {
            $icon_array = $serie;
        } else {
            $icon_array = $serie . "_" . $livree;
        }
        $icon_array = strtolower($icon_array);
        $icon = $lineIcons[$icon_array]['src'] ?? 'default_icon.svg';

        if ($livree == "IDFM") {
            $badgeLivree = "blueBadge";
        } elseif ($livree == "STIF/Carmillon") {
            $badgeLivree = "redBerryBadge";
        } else if ($livree == "Carmillon") {
            $badgeLivree = "redBerryBadge";
        } else if ($livree == "STIF/RATP") {
            $badgeLivree = "stifRatpBadge";
        } else if ($livree == "RATP") {
            $badgeLivree = "ratpBadge";
        } else if ($livree == "Transilien") {
            $badgeLivree = "transilienBadge";
        } else if ($livree == "IDF") {
            $badgeLivree = "redBadge";
        } else if ($livree == "STIF/RATP/SNCF") {
            $badgeLivree = "stifCarmillonRatpBadge";
        } else if ($livree == "IDFM/RATP/SNCF") {
            $badgeLivree = "stifCarmillonRatpBadge";
        } else if ($livree == "IDF/IDFM/RATP/SNCF") {
            $badgeLivree = "idfmLegerBadge";
        } else {
            $badgeLivree = "grayBadge";
        }

        $status = $row["status"];
        if ($status == "En Service") {
            $statusClass = "greenBadge";
        } elseif ($status == "Maintenance") {
            $statusClass = "yellowBadge";
        } elseif ($status == "Rénovation") {
            $statusClass = "blueBadge";
        } elseif ($status == "En Cours de Livraison") {
            $statusClass = "grayBadge";
        } elseif ($status == "Radiée") {
            $statusClass = "redBadge";
        } else {
            $statusClass = "grayBadge";
        }

        $depot = $row["depot_name"];
        $date = $row["deliveryDate"];
        $date = date("d/m/Y", strtotime($date));
        $date = htmlspecialchars($date);

        echo '<div class="tile tileResult" role="button" aria-label="Voir le train ' . $number . '" tabindex="0" data-rame="' . $number . '" data-livraison="' . $date . '" data-livery="' . $livree . '" data-train="' . $row["idTrain"] . '">
                <div class="rame">
                    <div class="rameInfo">
                        <img src="../img/trains/' . $icon . '" class="rameIcon" alt="">
                        <div>
                            <h3>' . $number . '</h3>
                        </div>
                    </div>
                    <div class="badgesContainer">
                        <span class="badge badgeMD ' . $badgeColor . '">' . $serie . '</span>
                        <span class="badge badgeMD ' . $badgeLivree . '">' . $livree . '</span>
                    </div>
                    <div class="dateContainer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 23 28" fill="none">
                                <path d="M11.5 14.3572L22 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2" style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"></path>
                                <path d="M11.5 14.3572L1 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2" style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"></path>
                                <path d="M11.5 14.3572L1 8.10718L6.25 4.98218L11.5 1.85718L22 8.10718L16.75 11.2322L11.5 14.3572Z" fill="#E3E7F2" style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"></path>
                                <path d="M11.5 14.3572L22 8.10718M11.5 14.3572V26.8572M11.5 14.3572L1 8.10718M11.5 14.3572L16.75 11.2322M22 8.10718V20.6072L11.5 26.8572M22 8.10718L11.5 1.85718L6.25 4.98218M22 8.10718L16.75 11.2322M11.5 26.8572L1 20.6072V8.10718M1 8.10718L6.25 4.98218M6.25 4.98218L16.75 11.2322" stroke="#202124" style="stroke:#202124;stroke:color(display-p3 0.1255 0.1294 0.1412);stroke-opacity:1;" stroke-width="2" stroke-linejoin="round"></path>
                            </svg>
                            <h4 class="date">' . $date . '</h4>
                        </div>
                        <div>
                            <div class="badge badgeMD ' . $statusClass . '">
                                ' . $status . '
                            </div>
                        </div>
                    </div>
                </div>
                <div class="infosSupp">
                    <div class="iconLigne">
                        ' . $htmlIcons . '
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="23" viewBox="0 0 13 23" fill="none">
                        <path d="M1.48289 19.6234C1.02155 20.7652 0.642586 21.8908 0.346007 23H7.26616C7.7275 20.7816 8.41952 18.8241 9.34221 17.1277C10.2649 15.3986 11.4842 14.1426 13 13.3596V9.54255C11.9785 9.05319 11.0887 8.31915 10.3308 7.34042C9.57288 6.3617 8.93029 5.25248 8.40304 4.01277C7.90875 2.74042 7.52978 1.40284 7.26616 0H0C0.362484 1.0766 0.774398 2.1695 1.23574 3.27872C1.73004 4.35532 2.33967 5.36667 3.06464 6.31276C5 8.83845 8 11.5 8 11.5C8 11.5 4.5 14.5 3.1635 16.4915C2.50444 17.4376 1.94423 18.4816 1.48289 19.6234Z" fill="#262E41" style="fill:#262E41;fill:color(display-p3 0.1490 0.1804 0.2549);fill-opacity:1;"></path>
                    </svg>
                </div>
            </div>';
    }
    echo "<script>let livrees = " . json_encode($livery) . ";</script>";
} else {
    echo "0 éléments trouvés";
}
// Close the connection
$conn->close();
?>