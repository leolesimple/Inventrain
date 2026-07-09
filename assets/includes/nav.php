<?php
if (!isset($ext)) {
    $ext = './';
}
?>

<header class="navHeader">
    <a href="#content" class="skip-link">Aller au contenu</a>
    <a href="#search" class="skip-link">Aller à la recherche</a>
    <nav>
        <ul>
            <li>
                <a href="<?php echo $ext; ?>index.php">
                    Accueil
                </a>
            </li>
        </ul>
        <div class="logoDetail">
            <img src="<?php echo $ext; ?>img/logo_MI09/MI09_v2.svg" alt="" height="55">
            <?php include __DIR__ . '/wordmark.php'; ?>
        </div>
        <ul class="nav-right">
            <li>
                <a href="<?php echo $ext; ?>search.php#homeBar" id="search">
                    <img class="iconNav" src="<?php echo $ext; ?>img/icons/magnifying_glass_fill.svg" alt="">
                    <span class="sr-only">
                        Rechercher un train
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo $ext; ?>admin/">
                    <img class="iconNav" src="<?php echo $ext; ?>img/icons/plus_fill.svg"
                         alt="">
                    <span class="sr-only">
                        Ajouter un train (admin seulement)
                    </span>
                </a>
            </li>
        </ul>
    </nav>
</header>