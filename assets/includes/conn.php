<?php
if ($_SERVER['HTTP_HOST'] == "localhost:63342") {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "inventrain";
    $conn = new mysqli($servername, $username, $password, $dbname, 8889);
} else {
    $servername = "localhost";
    $username = "lesimple_admin";
    $password = "=KsIPkBQafDC";
    $dbname = "lesimple_inventrain";
    $conn = new mysqli($servername, $username, $password, $dbname, 3306);
}


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");