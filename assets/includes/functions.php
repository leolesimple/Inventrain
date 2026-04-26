<?php
declare(strict_types=1);

function h(string $str): string
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function getBadgeByYear(int $year): string
{
    return match(true) {
        $year >= 1970 && $year <= 1979 => 'grayBadge',
        $year >= 1980 && $year <= 1994 => 'yellowBadge',
        $year >= 1995 && $year <= 2008 => 'redBadge',
        $year >= 2009 && $year <= 2019 => 'blueBadge',
        $year >= 2020                  => 'blueBadge',
        default                        => 'grayBadge',
    };
}

function getLiveryBadge(string $livery): string
{
    return match($livery) {
        'IDFM'                          => 'blueBadge',
        'STIF/Carmillon', 'Carmillon'   => 'redBerryBadge',
        'STIF/RATP'                     => 'stifRatpBadge',
        'RATP'                          => 'ratpBadge',
        'Transilien'                    => 'transilienBadge',
        'IDF'                           => 'redBadge',
        'STIF/RATP/SNCF',
        'IDFM/RATP/SNCF'               => 'stifCarmillonRatpBadge',
        'IDF/IDFM/RATP/SNCF'           => 'idfmLegerBadge',
        default                         => 'grayBadge',
    };
}

function getStatusBadge(string $status): string
{
    return match($status) {
        'En Service'            => 'greenBadge',
        'Maintenance'           => 'yellowBadge',
        'Rénovation'            => 'blueBadge',
        'En Cours de Livraison' => 'grayBadge',
        'Radiée'                => 'redBadge',
        default                 => 'grayBadge',
    };
}

function getIconKey(string $serie, string $livery): string
{
    $wildcard = ['mi84', 'mi79'];
    $noLivery = ['B 82500', 'U52600', 'U53600', 'U53700', 'U53800'];

    if (in_array($serie, $wildcard, true)) {
        $key = $serie . '_*';
    } elseif (in_array($serie, $noLivery, true)) {
        $key = $serie;
    } else {
        $key = $serie . '_' . $livery;
    }

    return strtolower($key);
}

function buildLineIconsHtml(array $lignes, array $lineData, string $height = '30'): string
{
    $html = '';
    foreach ($lignes as $ref) {
        if (!isset($lineData[$ref])) {
            continue;
        }
        $icon   = h($lineData[$ref]['icon']);
        $letter = h($lineData[$ref]['letter']);
        $html  .= "<img src='img/lignes/{$icon}' height='{$height}' alt='Ligne {$letter}' class='iconLigne'>";
    }
    return $html;
}
