<?php
declare(strict_types=1);
include './assets/includes/conn.php';

$search = $_GET['search'] ?? '';
$search = preg_replace('/[^a-zA-Z0-9\-_\/\s]/', '', trim($search));

$sql = "SELECT
  train.idTrain,
  train.number,
  series.serieName,
  series.serviceStartYear,
  livery.liveryName,
  manufacturer.fabricant,
  train.deliveryDate,
  status.state,
  depot.depotName,
  renovation.renovationType,
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
WHERE train.number LIKE :search
ORDER BY train.idTrain DESC";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':search', '%' . $search . '%');
$stmt->execute();

$rows = $stmt->fetchAll();

$result = [];
foreach ($rows as $row) {
    $id = $row['idTrain'];
    if (!isset($result[$id])) {
        $result[$id] = $row;
        $result[$id]['lignes_affectees'] = [];
    }
    $result[$id]['lignes_affectees'][] = $row['LineRef'];
}

$result = array_values($result);

if (count($result) > 0) {
    $liveries = [];

    $count = count($result);
    echo '<div class="resultCount">' . ($count === 1 ? '1 train trouvé' : $count . ' trains trouvés') . '</div>';

    foreach ($result as $row) {
        $number   = $row['number'];
        $serie    = $row['serieName'];
        $livree   = $row['liveryName'];
        $status   = $row['state'];
        $depot    = $row['depotName'];
        $date     = formatDateFr($row['deliveryDate']);

        $badgeColor  = getBadgeByYear((int) $row['serviceStartYear']);
        $badgeLivree = getLiveryBadge($livree);
        $statusClass = getStatusBadge($status);
        $iconKey     = getIconKey($serie, $livree);
        $icon        = LINE_ICONS[$iconKey]['src'] ?? 'default_icon.svg';
        $htmlIcons   = buildLineIconsHtml($row['lignes_affectees'] ?? [], LINE_DATA);

        if (!in_array($livree, $liveries, true)) {
            $liveries[] = $livree;
        }

        echo '<div class="tile tileResult" role="button" aria-label="Voir le train ' . h($number) . '" tabindex="0" data-rame="' . h($number) . '" data-livraison="' . h($date) . '" data-livery="' . h($livree) . '" data-train="' . h((string)$row['idTrain']) . '">
                <div class="rame">
                    <div class="rameInfo">
                        <img src="../img/trains/' . h($icon) . '" class="rameIcon" alt="Illustration du train ' . h($number) . '">
                        <div>
                            <h3>' . h($number) . '</h3>
                        </div>
                    </div>
                    <div class="badgesContainer">
                        <span class="badge badgeMD ' . $badgeColor . '">' . h($serie) . '</span>
                        <span class="badge badgeMD ' . $badgeLivree . '">' . h($livree) . '</span>
                    </div>
                    <div class="dateContainer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="28" viewBox="0 0 23 28" fill="none">
                                <path d="M11.5 14.3572L22 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2" style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"></path>
                                <path d="M11.5 14.3572L1 8.10718V20.6072L11.5 26.8572V14.3572Z" fill="#E3E7F2" style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"></path>
                                <path d="M11.5 14.3572L1 8.10718L6.25 4.98218L11.5 1.85718L22 8.10718L16.75 11.2322L11.5 14.3572Z" fill="#E3E7F2" style="fill:#E3E7F2;fill:color(display-p3 0.8883 0.9051 0.9476);fill-opacity:1;"></path>
                                <path d="M11.5 14.3572L22 8.10718M11.5 14.3572V26.8572M11.5 14.3572L1 8.10718M11.5 14.3572L16.75 11.2322M22 8.10718V20.6072L11.5 26.8572M22 8.10718L11.5 1.85718L6.25 4.98218M22 8.10718L16.75 11.2322M11.5 26.8572L1 20.6072V8.10718M1 8.10718L6.25 4.98218M6.25 4.98218L16.75 11.2322" stroke="#202124" style="stroke:#202124;stroke:color(display-p3 0.1255 0.1294 0.1412);stroke-opacity:1;" stroke-width="2" stroke-linejoin="round"></path>
                            </svg>
                            <h4 class="date">' . h($date) . '</h4>
                        </div>
                        <div>
                            <div class="badge badgeMD ' . $statusClass . '">
                                ' . h($status) . '
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

    echo '<script>let livrees = ' . json_encode($liveries, JSON_HEX_TAG) . ';</script>';
} else {
    echo '<div class="emptyState">
        <p>Aucun train trouvé pour « ' . h($search) . ' ».</p>
        <p>Vérifiez le numéro de rame ou <a href="index.php">retournez à l\'accueil</a>.</p>
    </div>';
}

$conn = null;
