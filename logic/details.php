<?php
declare(strict_types=1);
include "./assets/includes/conn.php";

if (!isset($_GET['id'])) {
    echo "<p>ID de train non spécifié.</p>";
    http_response_code(404);
    return;
}

$id   = (int) $_GET['id'];
$sql  = "SELECT
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
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll();

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

if (count($result) === 0) {
    echo "<p>Aucun train trouvé.</p>";
    http_response_code(404);
    return;
}

foreach ($result as $row) {
    $serie  = $row['serieName'];
    $number = $row['number'];
    $livree = $row['liveryName'];
    $status = $row['state'];

    $badgeLivree = getLiveryBadge($livree);
    $statusClass = getStatusBadge($status);
    $iconKey     = getIconKey($serie, $livree);
    $icon        = LINE_ICONS[$iconKey]['src'] ?? 'default_icon.svg';
    $htmlIcons   = buildLineIconsHtml($row['lignes_affectees'] ?? [], LINE_DATA, '30');

    $deliveryDate      = formatDateFr($row['deliveryDate']);
    $deliveryYear      = (int) date('Y', strtotime($row['deliveryDate']));
    $yearsSinceDelivery = (int) date('Y') - $deliveryYear;
    $bDay = match(true) {
        $yearsSinceDelivery === 0 => '< 1 an',
        $yearsSinceDelivery === 1 => '1 an',
        default                   => $yearsSinceDelivery . ' ans',
    };

    $radiationDate = $row['radiationDate'] !== null
        ? date('d/m/Y', strtotime($row['radiationDate']))
        : 'N/A';

    $incidents = '';
    if (!empty($row['incidents'])) {
        $incidents = '<h2 class="tableCategory">Commentaires</h2><p>' . h($row['incidents']) . '</p>';
    }

    $breadcrumb = '<div class="fil-ariane"><a href="./index.php">Accueil</a> &gt; <a href="./detailsTrain.php?">Détails du train</a> &gt; <a href="./detailsTrain.php?id=' . $row['idTrain'] . '">' . h($serie) . ' n°' . h($number) . '</a></div>';
    echo $breadcrumb;
    echo '<h1 class="bigTitle">Détails</h1>';
    echo '<script>document.title = ' . json_encode($serie . ' ' . $number . ' - L\'Inventrain', JSON_HEX_TAG) . ';</script>';

    echo '<div class="trainInfo">
                    <img src="./img/trains/' . h($icon) . '" class="imgTrainBig" alt="Illustration du ' . h($serie) . ' ' . h($number) . '">
                <div class="trainInfosDetails">
                    <h1 class="trainNumber">' . h($number) . '</h1>
                    <div class="detailsBadge">
                        <span class="badgeXL ' . $badgeLivree . '">' . h($serie) . '</span>
                        <span class="badgeXL ' . $statusClass . '">' . h($status) . '</span>
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
                                    <td class="tableContent">' . h($row['serieName']) . '</td>
                                </tr>
                                <tr>
                                    <td class="tableContent">Constructeur</td>
                                    <td class="tableContent">' . h($row['fabricant']) . '</td>
                                </tr>
                                <tr>
                                    <td class="tableContent">Mise en Service</td>
                                    <td class="tableContent">' . h((string)$row['serviceStartYear']) . '</td>
                                </tr>
                                <tr>
                                    <td class="tableContent">Surnom</td>
                                    <td class="tableContent">' . h((string)($row['altName'] ?? '')) . '</td>
                                </tr>
                                <tr>
                                    <td class="tableContent">Automatisation</td>
                                    <td class="tableContent">' . h($row['goaLevel']) . ' (' . h($row['type']) . ')</td>
                                </tr>
                                <tr>
                                    <td class="tableContent">Système de conduite</td>
                                    <td class="tableContent">' . h($row['system']) . '</td>
                                </tr>
                                <tr>
                                    <td class="tableContent">Propriétaire</td>
                                    <td class="tableContent">' . h($row['ownerName']) . '</td>
                                </tr>
                                <tr>
                                    <td class="tableContent">Capacité</td>
                                    <td class="tableContent">' . h((string)$row['capacity']) . ' pax</td>
                                </tr>
                                <tr>
                                    <td class="tableContent">Vitesse Maximale</td>
                                    <td class="tableContent">' . h((string)$row['maxSpeed']) . ' km/h</td>
                                </tr>
                                <tr>
                                    <td class="tableContent">Masse</td>
                                    <td class="tableContent">' . h((string)$row['masse']) . ' t</td>
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
                                    <td class="tableContent">' . h($number) . '</td>
                                </tr>
                                 <tr>
                                    <td class="tableContent">Date de livraison</td>
                                    <td class="tableContent">' . h($deliveryDate) . ' (' . h($bDay) . ')</td>
                                </tr>
                                 <tr>
                                    <td class="tableContent">Réseau</td>
                                    <td class="tableContent">' . h($row['railNetwork']) . '</td>
                                </tr>
                                 <tr>
                                    <td class="tableContent">Livrée</td>
                                    <td class="tableContent">' . h($livree) . '</td>
                                </tr>
                                 <tr>
                                    <td class="tableContent">Établissement d\'attache</td>
                                    <td class="tableContent">' . h($row['depotName']) . ' - <strong>(' . h($row['code']) . ')</strong></td>
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
                                    <td class="tableContent">' . h((string)($row['renovationType'] ?? 'N/A')) . '</td>
                                </tr>
                                <tr>
                                    <td class="tableContent">Date de Radiation</td>
                                    <td class="tableContent">' . h($radiationDate) . '</td>
                                </tr>
                            </table>
                        </div>
                        <h3>Ligne d\'Affectation</h3>
                        ' . $htmlIcons . '
                    </div>
                </section>';

    echo $incidents;
}

$conn = null;
