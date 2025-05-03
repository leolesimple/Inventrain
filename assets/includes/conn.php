<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "inventrain";
$conn = new mysqli($servername, $username, $password, $dbname, 8889);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");