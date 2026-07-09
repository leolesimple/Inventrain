<?php

function generateCsrfToken()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validateCsrfToken($token)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
        return false;
    }
    unset($_SESSION['csrf_token']);
    return true;
}

function getBadgeLivreeClass($livree)
{
    $map = [
        'IDFM' => 'blueBadge',
        'STIF/Carmillon' => 'redBerryBadge',
        'Carmillon' => 'redBerryBadge',
        'STIF/RATP' => 'stifRatpBadge',
        'RATP' => 'ratpBadge',
        'Transilien' => 'transilienBadge',
        'IDF' => 'redBadge',
        'STIF/RATP/SNCF' => 'stifCarmillonRatpBadge',
        'IDFM/RATP/SNCF' => 'stifCarmillonRatpBadge',
        'IDF/IDFM/RATP/SNCF' => 'idfmLegerBadge',
    ];
    return $map[$livree] ?? 'grayBadge';
}

function getBadgeStatusClass($status)
{
    $map = [
        'En Service' => 'greenBadge',
        'Maintenance' => 'yellowBadge',
        'Renovation' => 'blueBadge',
        'En Cours de Livraison' => 'grayBadge',
        'Radiee' => 'redBadge',
        'Radiée' => 'redBadge',
    ];
    return $map[$status] ?? 'grayBadge';
}

function getTrainIconKey($serie, $livree)
{
    if ($serie == 'mi84' || $serie == 'mi79') {
        return strtolower($serie . '_*');
    }
    if (in_array($serie, ['B 82500', 'U52600', 'U53600', 'U53700', 'U53800'])) {
        return strtolower($serie);
    }
    return strtolower($serie . '_' . $livree);
}

function formatDateFr($date)
{
    if (empty($date)) {
        return '';
    }
    $timestamp = strtotime($date);
    $months = [
        '01' => 'janvier', '02' => 'fevrier', '03' => 'mars',
        '04' => 'avril', '05' => 'mai', '06' => 'juin',
        '07' => 'juillet', '08' => 'aout', '09' => 'septembre',
        '10' => 'octobre', '11' => 'novembre', '12' => 'decembre',
    ];
    $day = date('d', $timestamp);
    $month = $months[date('m', $timestamp)];
    $year = date('Y', $timestamp);
    return $day . ' ' . $month . ' ' . $year;
}
