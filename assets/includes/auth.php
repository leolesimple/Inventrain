<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('ADMIN_PASSWORD_HASH', '$2y$12$pknWzsdr92NZjXzjUHj5k.v3PGlvJjMez2DcoqAPTldpkINf30wlW');

if (defined('AUTH_NO_REDIRECT') && AUTH_NO_REDIRECT === true) {
    return;
}

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
