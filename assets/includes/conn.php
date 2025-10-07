<?php
$dsn = "mysql:host=localhost;port=3306;dbname=inventrain;charset=utf8";
$username = "leo";
$password = "040506";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

function formatDateFr(string $date): string
{
    $mois = [
        'January' => 'janvier',
        'February' => 'février',
        'March' => 'mars',
        'April' => 'avril',
        'May' => 'mai',
        'June' => 'juin',
        'July' => 'juillet',
        'August' => 'août',
        'September' => 'septembre',
        'October' => 'octobre',
        'November' => 'novembre',
        'December' => 'décembre'
    ];

    $dt = new DateTime($date);
    $jour = $dt->format('j');
    $moisAnglais = $dt->format('F');
    $annee = $dt->format('Y');

    return $jour . ' ' . $mois[$moisAnglais] . ' ' . $annee;
}
