<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    define('AUTH_NO_REDIRECT', true);
    require_once __DIR__ . '/../assets/includes/auth.php';
    if (password_verify($_POST['password'] ?? '', ADMIN_PASSWORD_HASH)) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php');
        exit;
    }
    $error = 'Mot de passe incorrect.';
}

$ext = '../';
$pageTitle = "Connexion - L'Inventrain";
$pageDescription = "Espace d'administration de L'Inventrain";
$pageRobots = 'noindex, nofollow';
$cssFiles = ['app.css', 'admin.css'];
?>
<!doctype html>
<html lang="fr">
<head>
    <?php include $ext . 'assets/includes/head.php'; ?>
</head>
<body>
<?php include $ext . 'assets/includes/nav.php'; ?>
<main id="content">
    <div class="titleContainer adminTitle">
        <h1>Connexion</h1>
        <p>Espace reserve a l'administration de L'Inventrain.</p>
    </div>
    <form action="" method="post" class="adminSearch" style="max-width: 400px; margin: 0 auto;">
        <?php if ($error): ?>
            <div class="error-message redError" role="alert">
                <p><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php endif; ?>
        <div class="inputContainer">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required autofocus>
        </div>
        <input type="submit" value="Se connecter">
    </form>
</main>
<?php include $ext . 'assets/includes/footer.php'; ?>
</body>
</html>
