<?php
global $conn;
$ext = "../";
$success = false;

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
        echo "Houston, we have a problem !";
    } else {
        $stmt = $conn->prepare("INSERT INTO train (idSerie, number, idLivery, idManufacturer, deliveryDate, radiationDate, idNetwork, idStatus, idDepot, idRenovation, idOwner, incidents) 
VALUES (:serie, :num, :livree, :fab, :livraison, :radiation, :reseau, :status, :depot, :reno, :owner, :comment)");

        $stmt->bindValue(':serie', $serie, PDO::PARAM_INT);
        $stmt->bindValue(':num', $num, PDO::PARAM_STR);
        $stmt->bindValue(':livree', $livree, PDO::PARAM_INT);
        $stmt->bindValue(':fab', $fab, PDO::PARAM_INT);
        $stmt->bindValue(':livraison', $livraison);
        $stmt->bindValue(':radiation', $radiation);
        $stmt->bindValue(':reseau', $reseau, PDO::PARAM_INT);
        $stmt->bindValue(':status', $status, PDO::PARAM_INT);
        $stmt->bindValue(':depot', $depot, PDO::PARAM_INT);
        $stmt->bindValue(':reno', $reno);
        $stmt->bindValue(':owner', $owner, PDO::PARAM_INT);
        $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

        $stmt->execute();
        $train_id = $conn->lastInsertId();
        if (isset($_POST['lines']) && is_array($_POST['lines'])) {
            $line_stmt = $conn->prepare("INSERT INTO train_line (idTrain, idLine) VALUES (:train_id, :line_id)");
            foreach ($_POST['lines'] as $line_id) {
                $line_stmt->bindValue(':train_id', $train_id, PDO::PARAM_INT);
                $line_stmt->bindValue(':line_id', $line_id, PDO::PARAM_INT);
                $line_stmt->execute();
            }
        }

        $success = true;
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
    <link rel="stylesheet" href="../css/docs.css">

    <link rel="stylesheet" href="https://leolesimple.com/toastLibrary/toast.css">

    <title>Ajouter un train - L'Inventrain</title>

    <!--Scripts-->
    <script src="https://leolesimple.com/toastLibrary/toast.js"></script>
</head>
<body>
<?php
include "../assets/includes/nav.php";
?>
<?php
if ($success) {
    echo "  
    <div class='docAlert green'>
        <h2>Train ajouté !</h2>
        <p>Le train a été ajouté avec succès. Le formulaire est pré-rempli si besoin d'ajouter un autre train.</p>
        <a href=\"/detailsTrain.php?id=$train_id\">Voir le train</a>
        </div>
    ";
}
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
            $series = $conn->query("SELECT * FROM series")->fetchAll(PDO::FETCH_ASSOC);
            echo '<select name="serie" id="serie" required>';
            echo '<option value="0" disabled selected hidden' . (!isset($_POST['serie']) ? ' selected' : '') . '>Choisir...</option>';
            foreach ($series as $s) {
                echo "<option value=\"{$s['idSerie']}\" " . (isset($_POST['serie']) && $_POST['serie'] == $s['idSerie'] ? 'selected' : '') . ">";
                if ($s['altName'] == "") {
                    echo "{$s['serieName']}</option>";
                } else {
                    echo "{$s['serieName']} ({$s['altName']})</option>";
                }
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="num">Numéro <small>(max. 50 caractères)</small></label>
            <input type="text" name="num" id="num" maxlength="50" placeholder="34C, 3546, 001L" required
                   value="<?php echo htmlspecialchars($_POST['num'] ?? '', ENT_QUOTES); ?>">
        </div>
        <div class="inputContainer">
            <label for="livree">Livrée</label>
            <?php
            $livery = $conn->query("SELECT * FROM livery")->fetchAll(PDO::FETCH_ASSOC);
            echo '<select name="livree" id="livree" required>';
            echo '<option value="0" disabled selected hidden' . (!isset($_POST['livree']) ? ' selected' : '') . '>Choisir...</option>';
            foreach ($livery as $l) {
                echo "<option value=\"{$l['idLivery']}\" " . (isset($_POST['livree']) && $_POST['livree'] == $l['idLivery'] ? 'selected' : '') . ">{$l['liveryName']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="fab">Fabricant</label>
            <?php
            $manufacturer = $conn->query("SELECT * FROM manufacturer")->fetchAll(PDO::FETCH_ASSOC);
            echo '<select name="fab" id="fab" required>';
            echo '<option value="0" disabled selected hidden' . (!isset($_POST['fab']) ? ' selected' : '') . '>Choisir...</option>';
            foreach ($manufacturer as $m) {
                echo "<option value=\"{$m['idManufacturer']}\" " . (isset($_POST['fab']) && $_POST['fab'] == $m['idManufacturer'] ? 'selected' : '') . ">{$m['fabricant']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="livraison">Date de Livraison</label>
            <input type="date" name="livraison" id="livraison" required
                   value="<?php echo htmlspecialchars($_POST['livraison'] ?? '', ENT_QUOTES); ?>">
        </div>
        <div class="inputContainer">
            <label for="radiation">Date de Radiation</label>
            <input type="date" name="radiation" id="radiation"
                   value="<?php echo htmlspecialchars($_POST['radiation'] ?? '', ENT_QUOTES); ?>">
        </div>
        <div class="inputContainer">
            <label for="reseau">Réseau d'Affectation</label>
            <?php
            $network = $conn->query("SELECT * FROM network")->fetchAll(PDO::FETCH_ASSOC);
            echo '<select name="reseau" id="reseau" required>';
            echo '<option value="0" disabled selected hidden' . (!isset($_POST['reseau']) ? ' selected' : '') . '>Choisir...</option>';
            foreach ($network as $n) {
                echo "<option value=\"{$n['idNetwork']}\" " . (isset($_POST['reseau']) && $_POST['reseau'] == $n['idNetwork'] ? 'selected' : '') . ">{$n['railNetwork']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="status">Statut</label>
            <?php
            $status = $conn->query("SELECT * FROM status")->fetchAll(PDO::FETCH_ASSOC);
            echo '<select name="status" id="status" required>';
            echo '<option value="0" disabled selected hidden' . (!isset($_POST['status']) ? ' selected' : '') . '>Choisir...</option>';
            foreach ($status as $st) {
                echo "<option value=\"{$st['idStatus']}\" " . (isset($_POST['status']) && $_POST['status'] == $st['idStatus'] ? 'selected' : '') . ">{$st['state']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="depot">Dépôt</label>
            <?php
            $depot = $conn->query("SELECT * FROM depot")->fetchAll(PDO::FETCH_ASSOC);
            echo '<select name="depot" id="depot" required>';
            echo '<option value="0" disabled selected hidden' . (!isset($_POST['depot']) ? ' selected' : '') . '>Choisir...</option>';
            foreach ($depot as $d) {
                echo "<option value=\"{$d['idDepot']}\" " . (isset($_POST['depot']) && $_POST['depot'] == $d['idDepot'] ? 'selected' : '') . ">{$d['depotName']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="reno">Rénovation</label>
            <?php
            $reno = $conn->query("SELECT * FROM renovation")->fetchAll(PDO::FETCH_ASSOC);
            echo '<select name="reno" id="reno">';
            echo '<option value="0" disabled selected hidden' . (!isset($_POST['reno']) ? ' selected' : '') . '>Choisir...</option>';
            foreach ($reno as $r) {
                echo "<option value=\"{$r['idRenovation']}\" " . (isset($_POST['reno']) && $_POST['reno'] == $r['idRenovation'] ? 'selected' : '') . ">{$r['renovationType']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <div class="inputContainer">
            <label for="owner">Propriétaire</label>
            <?php
            $owner = $conn->query("SELECT * FROM owner")->fetchAll(PDO::FETCH_ASSOC);
            echo '<select name="owner" id="owner" required>';
            echo '<option value="0" disabled selected hidden' . (!isset($_POST['owner']) ? ' selected' : '') . '>Choisir...</option>';
            foreach ($owner as $o) {
                echo "<option value=\"{$o['idOwner']}\" " . (isset($_POST['owner']) && $_POST['owner'] == $o['idOwner'] ? 'selected' : '') . ">{$o['ownerName']}</option>";
            }
            echo '</select>';
            ?>
        </div>
        <fieldset class="inputContainer">
            <legend for="line">Ligne d'Affectation</legend>
            <?php
            $lines = $conn->query("SELECT * FROM line")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($lines as $line) {
                echo '<div class="checkbox-group">';
                echo '<input type="checkbox" id="line_' . $line['idLine'] . '" name="lines[]" value="' . $line['idLine'] . '" ' . (isset($_POST['lines']) && in_array($line['idLine'], $_POST['lines']) ? 'checked' : '') . '>';
                echo '<label for="line_' . $line['idLine'] . '">' . $line['lineName'] . '</label>';
                echo '</div>';
            }
            ?>
        </fieldset>
        <div class="inputContainer">
            <label for="comment">Commentaire</label>
            <textarea name="comment" id="comment" cols="30"
                      rows="8"><?php echo htmlspecialchars($_POST['comment'] ?? '', ENT_QUOTES); ?></textarea>
        </div>
        <input type="submit" name="add" value="Envoyer" disabled>
        <div id="formSummary" class="error-message" role="alert" style="margin-bottom: 10px;" hidden></div>
    </form>
</main>
<script>
    const form = document.querySelector("form");
    const requiredFields = form.querySelectorAll("input[required], select[required], textarea[required]");
    const submitBtn = form.querySelector('input[type="submit"]');
    const inputNum = document.querySelector("#num");
    const errorNum = document.createElement("div");
    errorNum.id = "numError";
    errorNum.className = "error-message";
    errorNum.setAttribute("role", "alert");
    errorNum.hidden = true;
    inputNum.setAttribute("aria-describedby", "numError");
    inputNum.insertAdjacentElement("afterend", errorNum);

    const summary = document.querySelector("#formSummary");

    let formWasSubmitted = false;

    // Validation du numéro de train selon des patterns spécifiques
    function validateNum() {
        let value = inputNum.value.replace(/\s+/g, "");
        inputNum.value = value;

        const letterCount = (value.match(/[a-zA-Z]/g) || []).length;
        const digitCount = (value.match(/\d/g) || []).length;
        const patterns = [
            /^\d{4}$/,
            /^\d{4}\/\d{1,3}$/,
            /^\d{1,5}[a-zA-Z]{1,2}$/,
            /^\d{5}$/,
            /^TT\d{3,5}$/
        ];

        const isValid =
            value.length > 0 &&
            letterCount <= 2 &&
            digitCount <= 14 &&
            patterns.some((r) => r.test(value));

        if (inputNum.classList.contains("was-touched") || formWasSubmitted) {
            if (isValid) {
                inputNum.classList.add("is-valid");
                inputNum.classList.remove("is-invalid");
                inputNum.setAttribute("aria-invalid", "false");
                errorNum.textContent = "Votre numéro est conforme.";
                errorNum.classList.add("noError");
                errorNum.hidden = true;
            } else {
                inputNum.classList.add("is-invalid");
                inputNum.classList.remove("is-valid");
                inputNum.setAttribute("aria-invalid", "true");
                errorNum.textContent = "Numéro invalide. Exemple : 3546, 3546/002, 123AB, TT456";
                errorNum.hidden = false;
            }
        } else {
            inputNum.classList.remove("is-valid", "is-invalid");
            errorNum.hidden = true;
        }

        return isValid;
    }

    /*
    * Récupération des champs invalides
    * Utilisation de Set pour éviter les doublons
    * Renvoie un objet contenant deux tableaux : empty et invalid, permet de différencier les actions à faire.
    */
    function getInvalidFields() {
        const emptyFields = new Set();
        const invalidFields = new Set();

        requiredFields.forEach((field) => {
            const value = field.value.trim();
            const isInvalid =
                field.tagName === "SELECT"
                    ? field.value === "0"
                    : value === "";

            if ((formWasSubmitted || field.classList.contains("was-touched")) || isInvalid) {
                const label = form.querySelector(`label[for="${field.id}"]`);
                const name = label ? label.textContent.trim().replace(/\s*\(.*?\)/g, '') : field.name;

                if (isInvalid) {
                    emptyFields.add(name);
                }
            }
        });

        const numValue = inputNum.value.trim();
        const letterCount = (numValue.match(/[a-zA-Z]/g) || []).length;
        const digitCount = (numValue.match(/\d/g) || []).length;
        const numValid = numValue.length > 0 && letterCount <= 2 && digitCount <= 14 && [/^\d{4}$/, /^\d{4}\/\d{1,3}$/, /^\d{1,5}[a-zA-Z]{1,2}$/, /^\d{5}$/, /^TT\d{3,5}$/].some((r) => r.test(numValue));

        const label = form.querySelector(`label[for="num"]`);
        const numName = label ? label.textContent.trim().replace(/\s*\(.*?\)/g, '') : "Numéro";

        if ((formWasSubmitted || inputNum.classList.contains("was-touched")) || !numValid) {
            if (numValue === "") {
                emptyFields.add(numName);
            } else if (!numValid) {
                invalidFields.add(numName);
            }
        }

        return {
            empty: Array.from(emptyFields),
            invalid: Array.from(invalidFields)
        };
    }

    function updateSummary() {
        const { empty, invalid } = getInvalidFields();

        let html = "";
        if (empty.length > 0) {
            html += "<div class='redError'><h3>Champs requis non remplis :</h3><ul>";
            for (let i = 0; i < empty.length; i++) {
                html += "<li>" + empty[i] + "</li>";
            }
            html += "</ul></div>";
        }

        if (invalid.length > 0 && submitBtn.disabled) {
            if (html !== "") html += "<br>";
            html += "<div class='orangeError'><h3>Champs remplis mais invalides :</h3><ul>";
            for (let i = 0; i < invalid.length; i++) {
                html += "<li>" + invalid[i] + "</li>";
            }
            html += "</ul></div>";
        }

        if (html !== "") {
            summary.innerHTML = html;
            summary.hidden = false;
        } else if (!submitBtn.disabled) {
            summary.innerHTML = "";
            summary.hidden = true;
        } else {
            summary.innerHTML = "";
            summary.hidden = true;
        }
    }

    function checkFormValidity() {
        let isComplete = true;

        requiredFields.forEach((field) => {
            const value = field.value.trim();
            const isInvalid = field.tagName === "SELECT" ? field.value === "0" : value === "";

            if (field.classList.contains("was-touched") || formWasSubmitted) {
                if (isInvalid) {
                    field.classList.add("is-invalid");
                } else {
                    field.classList.remove("is-invalid");
                }
            }

            if (isInvalid) {
                isComplete = false;
            }
        });

        if (!validateNum()) isComplete = false;

        submitBtn.disabled = !isComplete;
        updateSummary();
    }

    // Écouteurs
    inputNum.addEventListener("input", () => {
        inputNum.classList.add("was-touched");
        validateNum();
        checkFormValidity();
    });

    requiredFields.forEach((field) => {
        field.addEventListener("input", () => {
            field.classList.add("was-touched");
            checkFormValidity();
        });

        field.addEventListener("change", () => {
            field.classList.add("was-touched");
            checkFormValidity();
        });
    });

    form.addEventListener("submit", (e) => {
        formWasSubmitted = true;
        checkFormValidity();

        if (submitBtn.disabled) {
            e.preventDefault();
        }
    });

    window.addEventListener("DOMContentLoaded", () => {
        checkFormValidity();
        validateNum();
    });
</script>
<?php
include "../assets/includes/footer.php";
?>
<script src="../js/form.js"></script>
</body>
</html>
