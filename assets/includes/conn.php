<?php
if ($_SERVER['HTTP_HOST'] == "localhost:63342") {
    $dsn = "mysql:host=localhost;port=8889;dbname=inventrain;charset=utf8";
    $username = "root";
    $password = "root";
} else {
    $dsn = "mysql:host=localhost;port=3306;dbname=lesimple_inventrain;charset=utf8";
    $username = "lesimple_admin";
    $password = "=KsIPkBQafDC";
}

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}