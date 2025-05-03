<?php
global $conn;
$ext = "../";

include "../assets/includes/conn.php";

// If add button is clicked
if (isset($_POST['add'])) {

    $serie = $_POST['serie'];
    $num = $_POST['num'];
    $livree = $_POST['livree'];
    $fab = $_POST['fab'];
    $livraison = $_POST['livraison'];
    if (isset($_POST['radiation']) && $_POST['radiation'] != "") {
        $radiation = $_POST['radiation'];
    } else {
        $radiation = null;
    }
    $reseau = $_POST['reseau'];
    $status = $_POST['status'];
    $depot = $_POST['depot'];
    if (isset($_POST['reno']) && $_POST['reno'] != "") {
        $reno = $_POST['reno'];
    } else {
        $reno = null;
    }
    $owner = $_POST['owner'];
    $comment = $_POST['comment'];

    // If one of the fields contains 0, die
    if ($serie == 0 || $livree == 0 || $fab == 0 || $reseau == 0 || $status == 0 || $depot == 0 || $owner == 0) {
        echo "<script>toast('error', 'Erreur', 'Veuillez remplir tous les champs.');</script>";
    } else {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO train (idSerie, number, idLivery, idManufacturer, deliveryDate, radiationDate, idNetwork, idStatus, idDepot, idRenovation, idOwner, incidents) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sisissiiisss", $serie, $num, $livree, $fab, $livraison, $radiation, $reseau, $status, $depot, $reno, $owner, $comment);
        $stmt->execute();
        // Ajout du traitement pour les lignes d'affectation
        $train_id = $conn->insert_id;
        if (isset($_POST['lines']) && is_array($_POST['lines'])) {
            $line_stmt = $conn->prepare("INSERT INTO train_line (idTrain, idLine) VALUES (?, ?)");
            foreach ($_POST['lines'] as $line_id) {
                $line_stmt->bind_param("ii", $train_id, $line_id);
                $line_stmt->execute();
            }
            $line_stmt->close();
        }


        if (isset($_POST['lines']) && is_array($_POST['lines']) && isset($_POST['idTrain'])) {
            $train_id = intval($_POST['idTrain']);
            $lines = $_POST['lines'];

            $stmt = $conn->prepare("INSERT INTO train_line (idTrain, idLine) VALUES (?, ?)");

            foreach ($lines as $line_id) {
                $line_id = intval($line_id);
                $stmt->bind_param("ii", $train_id, $line_id);
                $stmt->execute();
            }

            $stmt->close();
        }
    }
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

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $ext; ?>img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $ext; ?>img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $ext; ?>img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $ext; ?>img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $ext; ?>img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $ext; ?>img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $ext; ?>img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $ext; ?>img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $ext; ?>img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $ext; ?>img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $ext; ?>img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $ext; ?>img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $ext; ?>img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $ext; ?>img/favicon/manifest.json">
    <meta name="msapplication-TileImage" content="<?php echo $ext; ?>img/favicon/ms-icon-144x144.png">

    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/admin.css">

    <link rel="stylesheet" href="https://leolesimple.com/toastLibrary/toast.css">

    <title>Ajouter un train - L'Inventrain</title>

    <!--Scripts-->
    <script src="https://leolesimple.com/toastLibrary/toast.js"></script>
</head>
<body>
<?php
include "../assets/includes/nav.php";
?>
<main id="content">
    <div class="titleContainer adminTitle">
        <h1>
            Ajouter un train
        </h1>
        <p>
            Besoin d'aide ? Consultez la <a target="_blank" href="<?php echo $ext; ?>docs/add_trains.php">documentation
                associée.</a>
        </p>
    </div>
    <form action="" method="post" class="adminSearch">
        <div class="inputContainer">
            <label for="serie">Série</label>
            <?php
            $series = $conn->query("SELECT * FROM series")->fetch_all(MYSQLI_ASSOC);
            echo '<select name="serie" id="serie" required>';
            echo '<option value="0" disabled selected>Choisir...</option>';
            foreach ($series as $s) {
                if ($s['altName'] == "") {
                    echo "<option value=\"{$s['idSerie']}\">{$s['name']}</option>";
                } else {
                    echo "<option value=\"{$s['idSerie']}\">{$s['name']} ({$s['altName']})</option>";
                }
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="num">Numéro</label>
            <input type="text" name="num" id="num" placeholder="34C, 3546, 001L" required>
        </div>
        <div class="inputContainer">
            <label for="livree">Livrée</label>
            <?php
            $livery = $conn->query("SELECT * FROM livery")->fetch_all(MYSQLI_ASSOC);
            echo '<select name="livree" id="livree" required>';
            echo '<option value="0" disabled selected>Choisir...</option>';
            foreach ($livery as $l) {
                echo "<option value=\"{$l['idLivery']}\">{$l['name']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="fab">Fabricant</label>
            <?php
            $manufacturer = $conn->query("SELECT * FROM manufacturer")->fetch_all(MYSQLI_ASSOC);
            echo '<select name="fab" id="fab" required>';
            echo '<option value="0" disabled selected>Choisir...</option>';
            foreach ($manufacturer as $m) {
                echo "<option value=\"{$m['idManufacturer']}\">{$m['name']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="livraison">Date de Livraison</label>
            <input type="date" name="livraison" id="livraison" required>
        </div>
        <div class="inputContainer">
            <label for="radiation">Date de Radiation</label>
            <input type="date" name="radiation" id="radiation">
        </div>
        <div class="inputContainer">
            <label for="reseau">Réseau d'Affectation</label>
            <?php
            $network = $conn->query("SELECT * FROM network")->fetch_all(MYSQLI_ASSOC);
            echo '<select name="reseau" id="reseau" required>';
            echo '<option value="0" disabled selected>Choisir...</option>';
            foreach ($network as $n) {
                echo "<option value=\"{$n['idNetwork']}\">{$n['name']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="status">Statut</label>
            <?php
            $status = $conn->query("SELECT * FROM status")->fetch_all(MYSQLI_ASSOC);
            echo '<select name="status" id="status" required>';
            echo '<option value="0" disabled selected>Choisir...</option>';
            foreach ($status as $st) {
                echo "<option value=\"{$st['idStatus']}\">{$st['state']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="depot">Dépôt</label>
            <?php
            $depot = $conn->query("SELECT * FROM depot")->fetch_all(MYSQLI_ASSOC);
            echo '<select name="depot" id="depot" required>';
            echo '<option value="0" disabled selected>Choisir...</option>';
            foreach ($depot as $d) {
                echo "<option value=\"{$d['idDepot']}\">{$d['name']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="reno">Rénovation</label>
            <?php
            $reno = $conn->query("SELECT * FROM renovation")->fetch_all(MYSQLI_ASSOC);
            echo '<select name="reno" id="reno">';
            echo '<option value="0" disabled selected>Choisir...</option>';
            foreach ($reno as $r) {
                echo "<option value=\"{$r['idRenovation']}\">{$r['renovationType']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="owner">Propriétaire</label>
            <?php
            $owner = $conn->query("SELECT * FROM owner")->fetch_all(MYSQLI_ASSOC);
            echo '<select name="owner" id="owner" required>';
            echo '<option value="0" disabled selected>Choisir...</option>';
            foreach ($owner as $o) {
                echo "<option value=\"{$o['idOwner']}\">{$o['name']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="line">Ligne d'Affectation</label>
            <?php
            $lines = $conn->query("SELECT * FROM line")->fetch_all(MYSQLI_ASSOC);
            foreach ($lines as $line) {
                echo '<div class="checkbox-group">';
                echo '<input type="checkbox" id="line_' . $line['idLine'] . '" name="lines[]" value="' . $line['idLine'] . '">';
                echo '<label for="line_' . $line['idLine'] . '">' . $line['name'] . '</label>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="inputContainer">
            <label for="comment">Commentaire</label>
            <textarea name="comment" id="comment" cols="30" rows="8"></textarea>
        </div>
        <input type="submit" name="add" value="Envoyer">
    </form>
</main>
<?php
include "../assets/includes/footer.php";
?>
<script src="../js/app.js"></script>
</body>
</html>
