# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**L'Inventrain** is a vanilla PHP web application for cataloging Île-de-France regional trains (RER, Transilien, Tram-Train). No framework, no Composer, no npm — pure PHP with PDO and Apache.

## Local Development

Requires Apache + MySQL (XAMPP/MAMP/WAMP). Place files in `htdocs/` or `www/`, import the SQL dump, and configure `assets/includes/conn.php` with local credentials. Apache mod_rewrite must be enabled for `.htaccess` to work.

There are no build steps, no package manager, and no test suite.

## Architecture

### Request Flow

```
PHP page (index.php, search.php, detailsTrain.php, …)
  └── includes assets/includes/conn.php (PDO connection + formatDateFr())
  └── includes assets/includes/nav.php + footer.php
  └── includes logic/*.php (runs SQL, echoes HTML)
      └── client-side JS in js/ enhances interactivity
```

### Key Files

| File | Role |
|---|---|
| `assets/includes/conn.php` | PDO connection, `formatDateFr()` helper. **Gitignored** — must be created locally. |
| `logic/lastTrains.php` | Queries and renders the latest-trains section on the homepage |
| `logic/searchResults.php` | Processes `?search=` and filter params, renders result tiles |
| `logic/details.php` | Fetches joined train detail data and renders the detail page |
| `admin/index.php` | Protected form for inserting new trains; auth via `.htpasswd` |
| `assets/json/LineReferentiel.json` | Line reference data (ODbL licensed, read-only) |
| `assets/json/serieInfos.json` | Series information used in detail pages |

### URL / Routing

File-based, no router:
- `index.php` — homepage
- `search.php?search=<query>` — search
- `detailsTrain.php?id=<trainId>` — detail view
- `admin/index.php` — add trains (htaccess-protected)
- `docs/` — documentation site

### Database (MySQL, PDO)

Database name: `inventrain`. Core tables: `train`, `series`, `train_line`, `line`, `livery`, `manufacturer`, `depot`, `status`, `automation`, `trainSystem`, `network`, `owner`, `renovation`.

All queries use **prepared statements**. Input is sanitized with `htmlspecialchars` and `preg_replace` before use.

### Frontend

- **CSS:** Modular files in `css/` (`app.css`, `admin.css`, `docs.css`, `fonts.css`, `texts.css`). Use `rem` units only — no `px`. CSS custom properties for theming.
- **JS:** Vanilla JS in `js/` (`app.js`, `form.js`, `docs.js`). No bundler.
- **External:** Mapbox GL JS (v3.10.0) on `plan.php`, Font Awesome via kit, custom toast lib from leolesimple.com.

### Accessibility

WCAG 2.1 target. Always maintain: semantic HTML, proper heading hierarchy, skip-to-content links, ARIA roles where needed, `prefers-reduced-motion` support, visible focus outlines.

## Security Notes

- `conn.php` is gitignored; never commit DB credentials.
- Admin panel auth relies on `.htpasswd` (also gitignored).
- Always use PDO prepared statements — never string-interpolate user input into SQL.

## Ignored / Sensitive Files

`.htaccess`, `conn.php`, SQL dumps, `.htpasswd`, and `lines_alleged.geojson` are all gitignored. Do not recreate or commit them.
