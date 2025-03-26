<?php
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
session_start();

$passwd_enc = '$2y$10$kPWJDzrgO2iTr85l4eElEucUdXUjwPOQpM3dMqAWqN/bdcn0FV1oy';
$passwd_plus = 'admin';

function loginUser($passwd)
{
    global $passwd_enc;
    if (isset($_POST['passwd']) && password_verify($_POST['passwd'], $passwd_enc)) {
        session_regenerate_id(true);
        $_SESSION['login'] = true;
        header('Location: index.php');
        exit();
    } else {
        echo '<script>alert("Invalid password")</script>';
    }
}

function logout()
{
    session_destroy();
    header('Location: login.php');
    exit();
}

if (isset($_POST['submit'])) {
    loginUser($passwd_plus);
}

if (isset($_GET['logout'])) {
    logout();
}

?>

<!doctype html>
<html lang="fr">
<head>
    <!--Meta-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Ajouter un train à L'Inventrain via l'espace sécurisé.">
    <meta name="author" content="Léo LESIMPLE">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#F2F2F2">
    <meta name="msapplication-navbutton-color" content="#F2F2F2">
    <meta name="apple-mobile-web-app-status-bar-style" content="#F2F2F2">

    <!--Favicon-->

    <!--CSS-->
    <link rel="stylesheet" href="../css/app.css">

    <!--Title-->
    <title>Se Connecter - L'Inventrain</title>

    <!--Fonts-->

    <!--Scripts-->
</head>
<body>
<div id="loginView">
    <h1>
        Espace Sécurisé
    </h1>
    <form action="" method="post">
        <label for="passwd">Mot de Passe</label>
        <input type="password" id="passwd" name="passwd" placeholder="Mot de passe" required>
        <input type="submit" name="submit" value="Se connecter">
    </form>
</div>

</body>
</html>
