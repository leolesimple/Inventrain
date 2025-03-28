<?php
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
session_start();

$alert = '';

$passwd_enc = '$2y$10$kPWJDzrgO2iTr85l4eElEucUdXUjwPOQpM3dMqAWqN/bdcn0FV1oy';
$passwd_plus = 'admin';

function loginUser($passwd)
{
    global $passwd_enc,$alert;
    if (isset($_POST['passwd']) && password_verify($_POST['passwd'], $passwd_enc)) {
        session_regenerate_id(true);
        $_SESSION['login'] = true;
        header('Location: index.php');
        exit();
    } else {
        $alert = 'Mot de passe incorrect.';
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

    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://leolesimple.com/toastLibrary/toast.css">

    <title>Se Connecter - L'Inventrain</title>

    <!--Scripts-->
    <script src="https://leolesimple.com/toastLibrary/toast.js"></script>
</head>
<body class="loginPage">
<main id="loginView">
    <h1>
        Espace Sécurisé
    </h1>
    <form action="" class="loginForm" method="post">
        <div>
            <label class="max" for="passwd">Mot de Passe</label>
            <input type="password" id="passwd" name="passwd" placeholder="" required>
            <?php echo '<p class="alertText"><small>' . $alert . '</small></p>' ?>
        </div>
        <input type="submit" name="submit" value="Se connecter">
    </form>
</main>
<script src="../js/app.js"></script>
</body>
</html>
