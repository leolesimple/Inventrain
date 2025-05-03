<?php
include "./assets/includes/conn.php";

/*
 * Utilisation de l'IA pour la concaténation de la requête à la table de train_line uniquement.
 * Prompt : Comment puis-je récupérer toutes les informations sur les trains dans la base de données “inventrain”, y compris les lignes sur lesquelles chaque train circule, même si un train est affecté à plusieurs lignes ?
 * Modèle : GPT 4o (Version Plus)
 */

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
GROUP BY train.idTrain
ORDER BY train.idTrain DESC
LIMIT 3;";

$result = $conn->query($sql);
// Check if there are results
if ($result->num_rows > 0) {
    $jsonLines = file_get_contents('./assets/json/LineReferentiel.json');
    $lineData = json_decode($jsonLines, true);

    $jsonIcons = file_get_contents('./assets/json/serieInfos.json');
    $lineIcons = json_decode($jsonIcons, true);

    echo '<div class="tilesContainer">';

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
            $icon = "<img src='img/lignes/$lineIcon' height='30' alt='Ligne " . $lineData[$value]['letter'] . "' class='iconLigne'>";
            $htmlIcons .= $icon;
        }

        $livree = $row["livery_name"];
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

        $depot = $row["depot_name"];
        $date = $row["deliveryDate"];
        $date = date("d/m/Y", strtotime($date));
        $date = htmlspecialchars($date);

        echo '
        <div class="tile" role="button" aria-label="Voir le train ' . $number . '" tabindex="0" data-train="' . $row["idTrain"] . '">
        <div class="rameInfo">
            <img src="img/trains/' . $icon . '" class="rameIcon" alt="">
            <div>
                <h3>' . $number . '</h3>
                <div class="badgesContainer">
                    <span class="badge ' . $badgeColor . '">' . $serie . '</span>
                    <span class="badge ' . $badgeLivree . '">' . $livree . '</span>
                </div>
            </div>
        </div>
        <div class="infosSupp">
            <div class="dateContainer">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 23 28"
                         fill="none">
                        <path d="M11.5 14.3572L22 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                              style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                        <path d="M11.5 14.3572L1 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2"
                              style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                        <path d="M11.5 14.3572L1 8.10718L6.25 4.98218L11.5 1.85718L22 8.10718L16.75 11.2322L11.5 14.3572Z"
                              fill="#E3E7F2"
                              style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"/>
                        <path d="M11.5 14.3572L22 8.10718M11.5 14.3572V26.8572M11.5 14.3572L1 8.10718M11.5 14.3572L16.75 11.2322M22 8.10718V20.6072L11.5 26.8572M22 8.10718L11.5 1.85718L6.25 4.98218M22 8.10718L16.75 11.2322M11.5 26.8572L1 20.6072V8.10718M1 8.10718L6.25 4.98218M6.25 4.98218L16.75 11.2322"
                              stroke="#202124"
                              style="stroke:#202124;stroke:color(display-p3 0.1255 0.1294 0.1412);stroke-opacity:1;"
                              stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                    <h4 class="date">' . $date . '</h4>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" viewBox="0 0 81 72" fill="none">
                        <path xmlns="http://www.w3.org/2000/svg" d="M40.5527 4C40.6772 4.00001 40.8025 4.01937 40.8975 4.04883C40.9296 4.05882 40.9506 4.06861 40.9629 4.07422L76.791 35.5537L76.7979 35.5596C76.8794 35.6309 76.9374 35.6902 76.9785 35.7354V35.9229C76.9785 36.0442 76.9343 36.1644 76.8213 36.2754C76.6969 36.3974 76.5616 36.4355 76.4775 36.4355H72.9805C70.2974 36.4357 68.1096 38.5491 67.9863 41.1992L67.9805 41.458L68.0752 62.96C68.0752 63.1458 68.0612 63.3695 68.0293 63.6562L68.0049 63.877V66.376C68.0049 67.1557 67.9307 67.6134 67.8643 67.8584C67.619 67.9251 67.1604 68 66.3779 68H64.0342C64.0161 67.9999 64.0032 67.9992 63.9941 67.999L63.7021 67.9727L63.3789 67.9961C63.348 67.9983 63.2935 67.999 63.0742 67.999L58.5137 67.9863H55.125C54.3423 67.9863 53.8838 67.9115 53.6387 67.8447C53.5722 67.5998 53.499 67.1422 53.499 66.3623V53.9893L53.4863 53.2656C53.4231 51.5037 53.0656 49.2826 51.3848 47.6025C49.4646 45.6834 46.8384 45.4903 44.998 45.4902H35.9951C34.1547 45.4902 31.5287 45.6832 29.6084 47.6025C27.6874 49.5225 27.4942 52.1487 27.4941 53.9893V66.3623C27.4941 67.1426 27.4191 67.5999 27.3525 67.8447C27.107 67.9114 26.6484 67.9863 25.8672 67.9863H18.0049C17.9493 67.9863 17.8711 67.9824 17.6377 67.9668L17.3389 67.9463L17.04 67.9717C16.9961 67.9753 16.9638 67.9781 16.9336 67.9805C16.9046 67.9827 16.8843 67.9844 16.8691 67.9854C16.8509 67.9865 16.8443 67.9864 16.8467 67.9863H14.6143C13.8325 67.9863 13.3742 67.9114 13.1289 67.8447C13.0624 67.5998 12.9883 67.1424 12.9883 66.3623V50.5664L13.002 50.4434V41.4219C13.002 38.6605 10.7634 36.4219 8.00195 36.4219H4.50098C4.29804 36.4218 4.19078 36.3529 4.13184 36.2939C4.07309 36.2351 4 36.1229 4 35.9082C4.00004 35.7298 4.02804 35.6516 4.04004 35.6221C4.04948 35.5989 4.07861 35.5334 4.17773 35.4238L40.0859 4.14062L40.1895 4.05078L40.2256 4.01367C40.227 4.01351 40.229 4.01384 40.2305 4.01367C40.2986 4.00619 40.3984 4 40.5527 4Z" fill="#E3E7F2" stroke="#202124" style="fill:#E3E7F2;fill:color(display-p3 0.8902 0.9059 0.9490);fill-opacity:1;stroke:#202124;stroke:color(display-p3 0.1255 0.1294 0.1412);stroke-opacity:1;" stroke-width="8"/>
                    </svg>
                    <h4 class="date">' . $depot . '</h4>
                </div>
            </div>
            <div class="iconLigne">
                ' . $htmlIcons . '
            </div>
        </div>
    </div>';
    }
} else {
    echo "0 results";
}
echo '</div>';
// Close the connection
$conn->close();
?>