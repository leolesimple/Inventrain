<?php
$ext = "./";
?>

<!doctype html>
<html lang="fr">
<head>
    <?php
    $pageTitle = "Detail du train - L'Inventrain";
    $pageDescription = "Details d'un train dans L'Inventrain";
    $includeToast = true;
    include "./assets/includes/head.php";
    ?>
</head>
<body>
<div id="overlay"></div>
<?php
include "./assets/includes/nav.php";
?>
<main class="noCenter" id="content">
    <?php
    include "./logic/details.php";
    ?>
</main>
<?php
include "./assets/includes/footer.php"
?>
</body>
</html>