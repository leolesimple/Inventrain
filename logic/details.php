<?php
include "./assets/includes/conn.php";

$jsonIcons = file_get_contents('./assets/json/serieInfos.json');
$lineIcons = json_decode($jsonIcons, true);
$jsonLines = file_get_contents('./assets/json/LineReferentiel.json');
$lineData = json_decode($jsonLines, true);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT
                train.idTrain,
                train.number,
                series.serieName,
                series.altName,
                series.serviceStartYear,
                series.capacity,
                series.maxSpeed,
                series.masse,
                automation.goaLevel,
                automation.type,
                train.radiationDate,
                trainSystem.system,
                livery.liveryName,
                manufacturer.fabricant,
                train.deliveryDate,
                network.railNetwork,
                status.state,
                depot.depotName,
                depot.code,
                depot.city,
                renovation.renovationType,
                owner.ownerName,
                line.LineRef,
                train.incidents
                FROM train
                JOIN train_line ON train.idTrain = train_line.idTrain
                JOIN line ON train_line.idLine = line.idLine
                LEFT JOIN series ON train.idSerie = series.idSerie
                LEFT JOIN automation ON series.idAutomation = automation.idAutomation
                LEFT JOIN trainSystem ON series.idSystem = trainSystem.idSystem
                LEFT JOIN livery ON train.idLivery = livery.idLivery
                LEFT JOIN manufacturer ON train.idManufacturer = manufacturer.idManufacturer
                LEFT JOIN network ON train.idNetwork = network.idNetwork
                LEFT JOIN status ON train.idStatus = status.idStatus
                LEFT JOIN depot ON train.idDepot = depot.idDepot
                LEFT JOIN renovation ON train.idRenovation = renovation.idRenovation
                LEFT JOIN owner ON train.idOwner = owner.idOwner
                WHERE train.idTrain = :id
                ORDER BY train.idTrain DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $result = [];
    foreach ($rows as $row) {
        $trainId = $row['idTrain'];
        if (!isset($result[$trainId])) {
            $result[$trainId] = $row;
            $result[$trainId]['lignes_affectees'] = [];
        }
        $result[$trainId]['lignes_affectees'][] = $row['LineRef'];
    }

    $result = array_values($result);

    if (count($result) > 0) {
        foreach ($result as $row) {
            $lignes_affectees = $row["lignes_affectees"] ?? [];
            $serie = $row["serieName"];
            $number = $row["number"];
            $breadcrumb = '<div class="fil-ariane"><a href="./index.php">Accueil</a> > <a href="./detailsTrain.php?">Détails du train</a> > <a href="./detailsTrain.php?id=' . $row["idTrain"] . '">' . $serie . " n°" . htmlspecialchars($number) . '</a></div>';
            echo $breadcrumb;
            echo '<h1 class="bigTitle">Détails</h1>';
            echo '<script>document.title = "' . htmlspecialchars($serie) . ' ' . htmlspecialchars($number) . ' - L\'Inventrain";</script>';

            $livree = $row["liveryName"];
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

            $status = $row["state"];
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

            $livree = $row["liveryName"];
            $deliveryDate = $row["deliveryDate"];
            $deliveryDate = formatDateFr($deliveryDate);

            $currentYear = date("Y");
            $deliveryYear = date("Y", strtotime($row["deliveryDate"]));
            $yearsSinceDelivery = $currentYear - $deliveryYear;
            if ($yearsSinceDelivery == 0) {
                $bDay = "< 1an";
            } elseif ($yearsSinceDelivery == 1) {
                $bDay = "1 an";
            } else {
                $bDay = $yearsSinceDelivery . " ans";
            }

            $radiationDate = $row["radiationDate"];
            if ($radiationDate == null) {
                $radiationDate = "N/A";
            } else {
                $radiationDate = date("d/m/Y", strtotime($radiationDate));
            }

            $incidents = $row["incidents"];
            if ($incidents == null) {
                $incidents = '';
            } else {
                $incidents = '<h2 class="tableCategory">Commentaires</h2>
<p>' . $row['incidents'] . '</p>';
            }

            $htmlIcons = "";
            foreach ($lignes_affectees as $key => $value) {
                if (isset($lineData[$value])) {
                    $lineIcon = $lineData[$value]['icon'];
                } else {
                    $lineIcon = "default_icon.svg"; // Fallback
                }
                $affectationLineicon = "<img src='img/lignes/$lineIcon' height='30' alt='Ligne " . $lineData[$value]['letter'] . "' class=''>";
                $htmlIcons .= $affectationLineicon;
            }

            echo '<div class="trainInfo">
                            <img src="./img/trains/' . $icon . '" class="imgTrainBig" alt="">
                        <div class="trainInfosDetails">
                            <h1 class="trainNumber">' . htmlspecialchars($row['number']) . '</h1>
                            <div class="detailsBadge">
                                <span class="badgeXL ' . $badgeLivree . '">' . $serie . '</span>
                                <span class="badgeXL ' . $statusClass . '">' . $status . '</span>
                            </div>
                        </div>
                      </div>';

            echo '    <section class="tableContainer">
                            <div>
                                <h2 class="tableCategory">Général</h2>
                                <div class="tableWrapper">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="tableTitle">Type</th>
                                            <th class="tableTitle">Valeur</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="tableContent">Série</td>
                                            <td class="tableContent">' . $row['serieName'] . '</td>
                                        </tr>
                                        <tr>
                                            <td class="tableContent">Constructeur</td>
                                            <td class="tableContent">' . $row['fabricant'] . '</td>
                                        </tr>
                                        <tr>
                                            <td class="tableContent">Mise en Service</td>
                                            <td class="tableContent">' . $row['serviceStartYear'] . '</td>
                                        </tr>
                                        <tr>
                                            <td class="tableContent">Surnom</td>
                                            <td class="tableContent">' . $row['altName'] . '</td>
                                        </tr>
                                        <tr>
                                            <td class="tableContent">Automatisation</td>
                                            <td class="tableContent">' . $row['goaLevel'] . ' (' . $row['type'] . ')</td>
                                        </tr>
                                        <tr>
                                            <td class="tableContent">Système de conduite</td>
                                            <td class="tableContent">' . $row['system'] . '</td>
                                        </tr>
                                        <tr>
                                            <td class="tableContent">Propriétaire</td>
                                            <td class="tableContent">' . $row['ownerName'] . '</td>
                                        </tr>
                                        <tr>
                                            <td class="tableContent">Capacité</td>
                                            <td class="tableContent">' . $row['capacity'] . ' pax</td>
                                        </tr>
                                        <tr>
                                            <td class="tableContent">Vitesse Maximale</td>
                                            <td class="tableContent">' . $row['maxSpeed'] . ' km/h</td>
                                        </tr>
                                        <tr>
                                            <td class="tableContent">Masse</td>
                                            <td class="tableContent">' . $row['masse'] . ' t</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>  
                            <div>
                                <h2 class="tableCategory">Caractéristiques du train</h2>
                                <div class="tableWrapper">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="tableTitle">Type</th>
                                            <th class="tableTitle">Valeur</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <tr>
                                            <td class="tableContent">Numéro</td>
                                            <td class="tableContent">' . $row['number'] . '</td>
                                        </tr>
                                         <tr>
                                            <td class="tableContent">Date de livraison</td>
                                            <td class="tableContent">' . $deliveryDate . " (" . $bDay . ')</td>
                                        </tr>
                                         <tr>
                                            <td class="tableContent">Réseau</td>
                                            <td class="tableContent">' . $row['railNetwork'] . '</td>
                                        </tr>
                                         <tr>
                                            <td class="tableContent">Livrée</td>
                                            <td class="tableContent">' . $row['liveryName'] . '</td>
                                        </tr>
                                         <tr>
                                            <td class="tableContent">Établissement d\'attache</td>
                                            <td class="tableContent">' . $row['depotName'] . " - <strong>(" . $row['code'] . ')</strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <h2 class="tableCategory">Rénovation/Radiation</h2>
                                <div class="tableWrapper">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="tableTitle">Type</th>
                                            <th class="tableTitle">Valeur</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="tableContent">Dernière Rénovation</td>
                                            <td class="tableContent">' . $row['renovationType'] . '</td>
                                        </tr>
                                        <tr>
                                            <td class="tableContent">Date de Radiation</td>
                                            <td class="tableContent">' . $radiationDate . '</td>
                                        </tr>
                                    </table>
                                </div>
                                <h3>Ligne d\'Affectation</h3>
                                ' . $htmlIcons . '
                            </div>
                        </section>';
        }
    } else {
        echo "<p>Aucun train trouvé.</p>";
        return;
    }
} else {
    echo "<p>ID de train non spécifié.</p>";
    return;
}

