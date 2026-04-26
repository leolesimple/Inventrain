# Proposition d'amélioration — L'Inventrain

> Analyse réalisée sur la branche `main` au 26 avril 2026.  
> Classement par priorité au sein de chaque axe : 🔴 Critique · 🟠 Haute · 🟡 Moyenne · 🟢 Basse

---

## Vue d'ensemble

L'Inventrain est un projet PHP vanilla propre dans son intention et cohérent dans son design. La stack choisie (PHP + PDO + Apache, sans framework) est un choix valide pour un projet de cette taille, mais elle génère des dettes structurelles : duplication de code, absence de couche de validation centralisée, sécurité applicative insuffisante. Le projet souffre surtout d'un **manque de séparation des responsabilités** (logique, présentation, données sont mélangées) et d'un panneau admin trop rudimentaire pour un usage réel.

Les propositions ci-dessous sont réparties en six axes : Sécurité, Architecture & Bonnes pratiques PHP, Admin & Fonctionnalités, Performance, Accessibilité, et Design & UX.

---

## 1. Sécurité

### 🔴 Credentials base de données en clair dans le code

**Fichier :** `assets/includes/conn.php`

```php
// Actuel — à ne jamais faire
$dsn      = "mysql:host=localhost;port=3306;dbname=inventrain;charset=utf8";
$username = "leolesimple";
$password = "040506";
```

Les credentials sont dans le dépôt git, donc dans l'historique git, même si le fichier est gitignored aujourd'hui. Il faut les sortir du code.

**Proposition :** créer un fichier `.env` (gitignored), le charger manuellement ou via une micro-lib :

```php
// .env (jamais commité)
DB_HOST=localhost
DB_NAME=inventrain
DB_USER=leolesimple
DB_PASS=040506

// conn.php
$env = parse_ini_file(__DIR__ . '/../../.env');
$dsn = "mysql:host={$env['DB_HOST']};dbname={$env['DB_NAME']};charset=utf8mb4";
$conn = new PDO($dsn, $env['DB_USER'], $env['DB_PASS'], [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
]);
```

Ajouter `.env` et `.env.example` au dépôt (`.env.example` avec des valeurs vides pour guider la configuration).

---

### 🔴 Panneau admin sans authentification applicative

**Fichier :** `admin/index.php`

L'accès repose uniquement sur `.htpasswd`, ce qui est valable mais insuffisant : pas de session PHP, pas de CSRF, pas de token. Si Apache est mal configuré ou si `.htpasswd` est absent, le formulaire est accessible à tout le monde.

**Proposition :** ajouter une authentification double :
- conserver `.htpasswd` comme première ligne de défense,
- ajouter une session PHP dans `admin/index.php` :

```php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login.php');
    exit;
}
```

- créer une page `login.php` simple avec formulaire (identifiant + mot de passe hashé en `password_hash`),
- stocker les credentials admin dans la base ou dans un fichier de config ignoré par git.

---

### 🔴 Absence de protection CSRF sur le formulaire admin

**Fichier :** `admin/index.php` — `if (isset($_POST['add']))`

N'importe quelle page tierce peut soumettre une requête POST à ce formulaire (Cross-Site Request Forgery).

**Proposition :**

```php
// Génération du token (lors du rendu du formulaire)
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Dans le formulaire HTML
<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

// Vérification en début de traitement POST
if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
    http_response_code(403);
    die('Requête invalide.');
}
```

---

### 🟠 XSS dans un contexte JavaScript

**Fichier :** `logic/details.php`

```php
// Vulnérable : htmlspecialchars encode pour HTML, pas pour JS
echo '<script>document.title = "' . htmlspecialchars($serie) . '";</script>';
```

Si `$serie` contient `"; alert(1);//`, `htmlspecialchars` ne protège pas ici.

**Proposition :**

```php
echo '<script>document.title = ' . json_encode($serie . ' ' . $number . ' - L\'Inventrain', JSON_HEX_TAG) . ';</script>';
```

---

### 🟠 Echappement manquant dans les boucles de rendu

**Fichier :** `logic/lastTrains.php`

```php
// $number n'est pas échappé ici
<div class="tile" ... aria-label="Voir le train <?= $number ?>">
```

**Proposition :** systématiser `htmlspecialchars($var, ENT_QUOTES, 'UTF-8')` (ou un alias `h()`) sur **toute** variable affichée, sans exception, même si la donnée vient de la base.

---

### 🟠 En-têtes HTTP de sécurité absents

**Fichier :** `.htaccess`

Aucun header de sécurité n'est positionné. Cela expose l'application au clickjacking, au MIME sniffing, et fragilise la politique HTTPS.

**Proposition :** ajouter dans `.htaccess` :

```apache
<IfModule mod_headers.c>
    Header set X-Frame-Options "DENY"
    Header set X-Content-Type-Options "nosniff"
    Header set Referrer-Policy "strict-origin-when-cross-origin"
    Header set Permissions-Policy "geolocation=(), microphone=(), camera=()"
    Header set Strict-Transport-Security "max-age=31536000; includeSubDomains; preload"
    # CSP à ajuster selon les CDN utilisés
    Header set Content-Security-Policy "default-src 'self'; script-src 'self' https://api.mapbox.com https://kit.fontawesome.com; style-src 'self' 'unsafe-inline'; img-src 'self' data: blob: https://*.mapbox.com; connect-src 'self' https://*.mapbox.com;"
</IfModule>
```

---

### 🟠 Filtre trop restrictif sur la recherche

**Fichier :** `logic/searchResults.php`

```php
$search = preg_replace('/[^a-zA-Z0-9_]/', '', $search);
```

Ce filtre supprime les tirets et slashes, rendant impossible la recherche de numéros comme `3546/002` ou `Z-55500`. Les numéros de train franciliens utilisent ces caractères.

**Proposition :**

```php
// Autoriser les caractères légitimes d'un numéro de train
$search = preg_replace('/[^a-zA-Z0-9\-_\/\s]/', '', $search);
$search = trim($search);
```

La protection contre l'injection SQL est assurée par les prepared statements PDO, pas par ce filtre.

---

### 🟡 Intégrité des ressources externes (SRI)

Les scripts Mapbox, FontAwesome et la lib toast sont chargés depuis des CDN sans attribut `integrity`. Une compromission du CDN permettrait d'injecter du code malveillant.

**Proposition :** ajouter `integrity="sha384-..."` et `crossorigin="anonymous"` sur chaque ressource externe. Les hashes sont générés via [srihash.org](https://www.srihash.org).

---

## 2. Architecture & Bonnes pratiques PHP

### 🔴 Duplication massive de la logique de badge

La logique de couleur de badge (par décennie de mise en service) et de badge de livrée est copiée-collée dans **trois fichiers** : `lastTrains.php`, `searchResults.php`, `details.php`. C'est la dette technique la plus importante du projet.

**Proposition :** créer `assets/includes/functions.php` avec des fonctions réutilisables :

```php
<?php
declare(strict_types=1);

function getBadgeByYear(int $year): string {
    return match(true) {
        $year >= 1970 && $year <= 1979 => 'grayBadge',
        $year >= 1980 && $year <= 1994 => 'yellowBadge',
        $year >= 1995 && $year <= 2009 => 'greenBadge',
        $year >= 2010 && $year <= 2019 => 'blueBadge',
        $year >= 2020              => 'purpleBadge',
        default                    => 'grayBadge',
    };
}

function getLiveryBadge(string $livery): string {
    return match($livery) {
        'IDFM'       => 'blueBadge',
        'RATP'       => 'redBadge',
        'Transilien' => 'grayBadge',
        default      => 'grayBadge',
    };
}

function h(string $str): string {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
```

---

### 🟠 Absence de gestion d'erreur uniformisée

**Fichier :** `logic/lastTrains.php`

```php
} catch (PDOException $e) {
    echo "Erreur PDO : " . $e->getMessage(); // Message technique affiché à l'utilisateur
}
```

Les autres fichiers de logique (`searchResults.php`, `details.php`) n'ont même pas de try/catch.

**Proposition :**

```php
// conn.php — configurer un handler global
set_exception_handler(function (Throwable $e) {
    error_log($e->getMessage()); // log serveur
    http_response_code(500);
    include __DIR__ . '/../../errors/500.php';
    exit;
});

// Dans tous les logic/*.php — supprimer les echo d'erreur, laisser remonter
$stmt->execute(); // PDO lèvera une exception si échec
```

---

### 🟠 Nommage incohérent et variables abrégées

**Fichier :** `admin/index.php`

```php
$fab  // → $manufacturer
$reno // → $renovation
$st   // → $status
$m    // → $manufacturer (encore une variante !)
```

Ces abréviations rendent le code difficile à lire. Utiliser des noms explicites.

---

### 🟠 `declare(strict_types=1)` absent partout

Aucun fichier PHP ne déclare le mode strict. Sans lui, PHP effectue des conversions de types silencieuses qui peuvent masquer des bugs.

**Proposition :** ajouter `declare(strict_types=1);` en première ligne de chaque fichier PHP.

---

### 🟡 Lecture répétée des fichiers JSON à chaque requête

**Fichiers :** `lastTrains.php`, `searchResults.php`, `details.php`

```php
$jsonLines = file_get_contents('./assets/json/LineReferentiel.json');
$lineData  = json_decode($jsonLines, true);
```

Ce fichier est lu et décodé à chaque page, plusieurs fois par requête potentiellement.

**Proposition :** charger une seule fois dans `conn.php` et stocker dans une variable globale, ou mieux, utiliser une constante :

```php
// conn.php
define('LINE_DATA', json_decode(
    file_get_contents(__DIR__ . '/../../assets/json/LineReferentiel.json'),
    true
));
```

---

### 🟡 Chemins relatifs fragiles

`$ext = "./"` ou `$ext = "../"` est défini page par page. Un fichier déplacé casse tous ses chemins. Plusieurs fichiers ont aussi des **points-virgules manquants** sur cette ligne (`search.php`, `docs/index.php`, `about.php`).

**Proposition :** définir un chemin absolu une fois dans `conn.php` :

```php
define('BASE_PATH', rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/inventrain/');
define('BASE_URL', '/inventrain/');
```

---

### 🟡 Code commenté laissé en production

```php
/*LIMIT 100;*/          // searchResults.php
//echo $icon_array;     // searchResults.php
```

Le code mort doit être supprimé (git garde l'historique).

---

### 🟢 Aucune déclaration de type sur les fonctions

Seule `formatDateFr()` a des types déclarés. Toutes les autres fonctions du projet n'en ont pas. Ajouter des types (`string`, `int`, `array`, `?string`) améliore la fiabilité et la lisibilité.

---

## 3. Admin & Fonctionnalités

### 🟠 Panneau admin limité au seul ajout de trains

Actuellement l'admin ne permet que d'**ajouter** un train. Il est impossible de corriger une erreur ou de supprimer un train sans intervention directe en base.

**Proposition — tableau de bord admin :**

| Page | Fonctionnalité |
|---|---|
| `admin/index.php` | Liste paginée de tous les trains avec recherche |
| `admin/add.php` | Formulaire d'ajout (actuel) |
| `admin/edit.php?id=X` | Formulaire de modification pré-rempli |
| `admin/delete.php?id=X` | Suppression avec confirmation |

Structure SQL associée :
```sql
-- Optionnel : table de log pour l'audit
CREATE TABLE audit_log (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    action      ENUM('ADD', 'EDIT', 'DELETE') NOT NULL,
    train_id    INT,
    description TEXT,
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

---

### 🟠 Message d'erreur admin non exploitable

```php
echo "Houston, we have a problem !"; // admin/index.php
```

L'utilisateur ne sait pas quel champ est manquant.

**Proposition :** validation champ par champ avec messages explicites :

```php
$errors = [];
if (empty($serie))   $errors[] = "La série est obligatoire.";
if (empty($livree))  $errors[] = "La livrée est obligatoire.";
// ...

if (!empty($errors)) {
    foreach ($errors as $err) {
        echo '<p class="error">' . h($err) . '</p>';
    }
}
```

---

### 🟠 Formulaire admin non réinitialisé après soumission réussie

Après un ajout réussi, le formulaire garde ses valeurs. L'utilisateur peut accidentellement soumettre deux fois.

**Proposition :** rediriger après succès (pattern PRG — Post/Redirect/Get) :

```php
if ($success) {
    $_SESSION['flash'] = "Train ajouté avec succès.";
    header('Location: index.php?success=1');
    exit;
}
```

---

### 🟡 Aucune pagination sur les résultats de recherche

```php
/*LIMIT 100;*/ // Commenté dans searchResults.php
```

Si la base contient des centaines de trains, tout est retourné d'un coup.

**Proposition :** pagination classique :

```php
$page    = max(1, (int)($_GET['page'] ?? 1));
$perPage = 20;
$offset  = ($page - 1) * $perPage;

// Dans la requête SQL
LIMIT :limit OFFSET :offset
```

Avec des boutons "Précédent / Suivant" et l'affichage du total.

---

### 🟡 Aucune suggestion / autocomplétion sur la recherche

La recherche ne propose rien pendant la saisie. Pour un inventaire de trains avec des numéros précis, c'est un frein à l'usage.

**Proposition :** endpoint JSON léger :

```php
// api/suggest.php?q=355
header('Content-Type: application/json');
$q    = preg_replace('/[^a-zA-Z0-9\-\/]/', '', $_GET['q'] ?? '');
$stmt = $conn->prepare("SELECT number FROM train WHERE number LIKE ? LIMIT 10");
$stmt->execute(["$q%"]);
echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));
```

Côté JS, un `<datalist>` ou un composant custom simple.

---

### 🟢 Aucun export des données

Il n'est pas possible d'exporter l'inventaire en CSV ou JSON, ce qui est utile pour un projet étudiant (vérifications, imports, partage).

**Proposition :** un bouton "Exporter en CSV" dans l'admin :

```php
// admin/export.php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="inventrain_export.csv"');
// SELECT avec jointures → fputcsv()
```

---

### 🟢 Sitemap XML dynamique absent

Le fichier `plan.php` est une page HTML. Un `sitemap.xml` dynamique améliorerait le référencement de chaque fiche train.

```php
// sitemap.php
header('Content-Type: application/xml; charset=utf-8');
// Générer <url> pour chaque train avec lastmod
```

---

## 4. Performance

### 🟡 Aucun attribut `loading="lazy"` sur les images

Toutes les images (icônes de trains, logos de lignes) sont chargées immédiatement, même celles hors écran.

**Proposition :** ajouter `loading="lazy"` sur toutes les `<img>` dans les boucles de rendu (`lastTrains.php`, `searchResults.php`).

---

### 🟡 Event listeners multiples au lieu de la délégation

**Fichier :** `js/app.js`

```javascript
document.querySelectorAll('.tile[role="button"]').forEach(tile => {
    tile.addEventListener('click', ...);
});
```

Avec 50 tuiles, cela crée 50 listeners. 

**Proposition :** délégation d'événement :

```javascript
document.querySelector('.tilesGrid')?.addEventListener('click', (e) => {
    const tile = e.target.closest('.tile[role="button"]');
    if (!tile) return;
    window.location.href = `detailsTrain.php?id=${tile.dataset.train}`;
});
```

---

### 🟡 `console.log` en production

**Fichier :** `search.php` (section `<script>` inline)

```javascript
console.log("Train cliqué :", idTrain, "-", number);
```

À supprimer.

---

### 🟢 Compression des assets CSS/JS

`.htaccess` compresse le `.geojson.gz` mais pas les CSS/JS.

**Proposition :**

```apache
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/css application/javascript text/html
</IfModule>
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
    ExpiresByType image/svg+xml "access plus 1 week"
</IfModule>
```

---

## 5. Accessibilité

### 🟠 Logo sans texte alternatif

**Fichier :** `assets/includes/nav.php`

```php
<img src="..." alt=""> // Logo L'Inventrain — alt vide
```

Un lecteur d'écran ignore cette image alors qu'elle représente la marque du site.

**Proposition :** `alt="L'Inventrain — accueil"`.

---

### 🟠 Icônes de trains sans alternative textuelle

**Fichier :** `logic/lastTrains.php`, `searchResults.php`

```php
<img src="img/trains/<?= $icon ?>" class="rameIcon" alt="">
```

**Proposition :** `alt="Illustration du <?= h($serie) ?> <?= h($number) ?>"`. Si l'image est purement décorative, ajouter `role="presentation"` et laisser `alt=""`.

---

### 🟠 Tuiles cliquables sans gestion clavier

Les `<div role="button">` sans `tabindex="0"` et sans handler `keydown` ne sont pas accessibles au clavier.

**Proposition :**

```html
<div class="tile" role="button" tabindex="0" data-train="<?= h($id) ?>">
```

```javascript
tile.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        window.location.href = `detailsTrain.php?id=${tile.dataset.train}`;
    }
});
```

Ou mieux : remplacer ces `<div>` par de vrais `<a href="...">` stylisés en bloc — c'est sémantiquement correct et nativement accessible.

---

### 🟡 Boutons de tri sans état ARIA

**Fichier :** `search.php`

Les boutons de tri n'indiquent pas l'état actif (`aria-pressed`, `aria-sort`) aux lecteurs d'écran.

**Proposition :**

```html
<button class="TriBtn active" aria-pressed="true" name="rame" id="filterRame">Rame</button>
```

Géré par JS : toggler `aria-pressed` à chaque clic.

---

### 🟡 Balises méta Open Graph absentes

Aucune page n'a de tags `og:title`, `og:description`, `og:image`. Le partage sur les réseaux sociaux affiche un aperçu vide.

**Proposition :** dans `<head>` de chaque page :

```html
<meta property="og:title" content="<?= h($pageTitle) ?> — L'Inventrain">
<meta property="og:description" content="Fiche du train <?= h($number) ?>, série <?= h($serie) ?>">
<meta property="og:image" content="https://linventrain.leolesimple.fr/img/trains/<?= h($icon) ?>">
<meta property="og:type" content="website">
```

---

### 🟡 Descriptions méta génériques sur toutes les pages

Toutes les pages ont la même `<meta name="description">`. Google pénalise les descriptions dupliquées et l'utilisateur ne voit pas de différence dans les résultats de recherche.

**Proposition :** une description unique par page, générée dynamiquement pour les fiches train.

---

### 🟢 Contraste des badges à vérifier

Les badges colorés (grayBadge, yellowBadge, etc.) n'ont pas de vérification documentée de leur ratio de contraste texte/fond. À tester avec WAVE ou l'inspecteur d'accessibilité de Firefox pour valider WCAG AA (4.5:1).

---

## 6. Design & UX

### 🟠 État vide de la recherche non mis en forme

```php
echo "0 éléments trouvés"; // Texte brut, sans style
```

**Proposition :** un bloc HTML dédié avec message explicatif et suggestion :

```html
<div class="emptyState">
    <p>Aucun train trouvé pour « <?= h($search) ?> ».</p>
    <p>Vérifiez le numéro de rame ou <a href="index.php">retournez à l'accueil</a>.</p>
</div>
```

---

### 🟠 Pas d'état de chargement sur le formulaire admin

Le bouton de soumission reste actif après clic. Un double-clic soumet deux fois.

**Proposition :**

```javascript
form.addEventListener('submit', () => {
    submitBtn.disabled = true;
    submitBtn.value = 'Envoi en cours…';
});
```

---

### 🟡 Fil d'Ariane absent sur les pages principales

`index.php` et `search.php` n'ont pas de breadcrumb. Les pages `detailsTrain.php` et les pages doc en ont. Cela crée une incohérence de navigation.

**Proposition :** standardiser la présence du breadcrumb selon le modèle existant sur toutes les pages de second niveau.

---

### 🟡 Comportement du bouton submit conditionné au JS sans fallback

**Fichier :** `admin/index.php`

```html
<input type="submit" name="add" value="Envoyer" disabled>
```

Le bouton est désactivé par défaut et activé par JS. Si JS est absent, le formulaire est inutilisable. L'activiation doit être décoratives, pas fonctionnelle.

**Proposition :** laisser le bouton actif, valider en PHP à la soumission et afficher les erreurs. Le JS peut améliorer l'expérience (validation en temps réel) sans en être le gardien.

---

### 🟢 Absence de page de statistiques

Pas de dashboard avec le nombre de trains par réseau, par état, par décennie. Ce serait une vitrine valorisante pour le projet.

**Proposition :** une page `stats.php` avec des requêtes d'agrégation SQL et des visualisations SVG ou canvas simples (sans dépendance externe).

---

## Récapitulatif priorisé

### À faire en premier (bloquant ou risque réel)

1. Déplacer les credentials dans un `.env`
2. Ajouter l'authentification par session dans l'admin
3. Ajouter la protection CSRF sur le formulaire admin
4. Corriger l'XSS dans le contexte JavaScript (`details.php`)
5. Uniformiser l'échappement HTML avec `htmlspecialchars` partout
6. Ajouter les en-têtes de sécurité HTTP dans `.htaccess`

### À faire ensuite (dette technique et qualité)

7. Extraire la logique de badges dans `functions.php`
8. Ajouter try/catch uniformes et supprimer les messages d'erreur techniques à l'écran
9. Ajouter `declare(strict_types=1)` partout
10. Corriger les points-virgules manquants
11. Renommer les variables abrégées dans l'admin
12. Charger le JSON une seule fois dans `conn.php`

### Amélioration de l'admin (fonctionnel)

13. Ajouter edit + delete + liste dans le tableau de bord admin
14. Implémenter le pattern PRG (redirection après POST)
15. Remplacer le message "Houston" par une vraie validation

### Accessibilité et UX

16. Ajouter `alt` sur le logo et les icônes de trains
17. Rendre les tuiles navigables au clavier (tabindex + keydown ou `<a>`)
18. Ajouter `aria-pressed` sur les boutons de tri
19. Ajouter les balises Open Graph
20. Mettre en forme l'état vide de recherche

### Optimisation (à planifier)

21. Pagination des résultats
22. Délégation d'événement pour les tuiles
23. `loading="lazy"` sur les images
24. Compression CSS/JS dans `.htaccess`
25. Suppression du `console.log` de production

---

*Ce document est une base de discussion. Aucune modification n'a été apportée au code. À valider avec toi avant toute implémentation.*
