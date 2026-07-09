<footer>
    <div class="brandContainer">
        <img src="<?php echo $ext ?? './'; ?>img/logo_MI09/MI09_v1.svg" alt="">
        <div class="brandText">
            <?php include __DIR__ . '/wordmark.php'; ?>
            <p class="tagLine">Inventoriez le matériel férré d’Île-de-France</p>
        </div>
    </div>
    <div class="linkContainer">
        <h4 class="catTitle">
            Liens Utiles
        </h4>
        <div class="linkRow">
            <ul>
                <li><a href="<?= $ext; ?>/">Accueil</a></li>
                <li><a href="<?= $ext; ?>/admin">Ajout de Train</a></li>
                <li><a href="<?= $ext; ?>/docs/">Documentation</a></li>
                <li><a href="<?= $ext; ?>/plan.php">Plan du Site</a></li>
            </ul>
            <ul>
                <li><a href="<?= $ext; ?>/legal/mentions.php">Mentions Légales</a></li>
                <li><a href="<?= $ext; ?>/legal/propIntell.php">Propriété Intellectuelle</a></li>
                <li><a href="<?= $ext; ?>/about.php">À Propos</a></li>
            </ul>
        </div>
    </div>
</footer>