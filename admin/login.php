<?php
declare(strict_types=1);
session_start();

if (isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $env = parse_ini_file(__DIR__ . '/../.env');

    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if (
        $env !== false &&
        hash_equals($env['ADMIN_USER'], $user) &&
        password_verify($pass, $env['ADMIN_PASS_HASH'])
    ) {
        session_regenerate_id(true);
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php');
        exit;
    }

    $error = "Identifiant ou mot de passe incorrect.";
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#F2F2F2">
    <title>Connexion Admin — L'Inventrain</title>
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<main id="content" class="loginPage">
    <div class="titleContainer adminTitle">
        <h1>Espace Administration</h1>
        <p>Connexion requise pour accéder au panneau d'ajout.</p>
    </div>

    <?php if ($error !== ''): ?>
        <div class="docAlert red" role="alert">
            <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
        </div>
    <?php endif; ?>

    <form method="post" action="" class="adminSearch loginForm">
        <div class="inputContainer">
            <label for="username">Identifiant</label>
            <input
                type="text"
                id="username"
                name="username"
                autocomplete="username"
                required
                autofocus
            >
        </div>
        <div class="inputContainer">
            <label for="password">Mot de passe</label>
            <input
                type="password"
                id="password"
                name="password"
                autocomplete="current-password"
                required
            >
        </div>
        <input type="submit" value="Se connecter">
    </form>
</main>
</body>
</html>
