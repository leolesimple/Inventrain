<img alt="L&#39;Inventrain" height="150" src="img/Logo.svg"/>

## 🧾 Présentation
L'Inventrain permet d'inventorier tous les trains du réseau ferré francilien (RER, Transilien, Tram-Train) et de les visualiser avec divers filtres et tris. Tout cela dans une WebApp simple et intuitive (et bien sûr accessible 😉). <br>
L'Inventrain inventorie les trains de manière précise avec des informations telles que le numéro de la rame, le type de train, sa ligne et son dépôt d'attache, sa date de mise en service, radiation, son état de service, et tellement plus ! <br>

## 👨🏼‍💻 Accès au site 
[👉 L'Inventrain](https://webinventory.lesimple.projetsmmichamps.fr/) <br>

## 🖥️ Installer le site
- Une fois XAMPP, MAMP, WAMP ouvert.

- Lancer les services Apache (serveur web) et MySQL (base de données).

- Copier les fichiers du site (HTML, PHP, JS, CSS, etc.) dans le dossier, généralement nommé htdocs ou www, selon le logiciel.  

- Créer un sous-dossier `inventrain/`, pour accéder ensuite au site via :
👉 http://localhost/inventrain/

- Accèder à phpMyAdmin via http://localhost/phpmyadmin ou http://localhost:8888/phpMyAdmin (variable selon l'outil utilisé). 

- Créer une base de données nommée ``lesimple_inventrain``

- Dans phpMyAdmin, sélectionner la base nouvellement créée, cliquer sur l’onglet Importer, puis choisir le fichier inventrain.sql fourni et valider.

- Dans le fichier du site `assets/conn.php`, vérifier et adapter les paramètres de connexion :

  - Hôte : localhost
  - Port : 3306 (ou 8889 selon l’outil utilisé)
  - Nom de la base : lesimple_inventrain
  - Nom d'utilisateur : root
  - Mot de passe : souvent vide, ou root selon la config

- Lancer ton navigateur et saisis l’URL suivante :
👉 http://localhost/monsite/ 
- Le site est maintenant opérationnel en local.

## 📋 Accessibilité & qualité (Opquast/a11y)
[👉 Consulter le tableur](https://docs.google.com/spreadsheets/d/1fMyE432mOvpnpSP1UVwFlVAKF-D4SXZhio5wEj2JJ4M/edit?usp=sharing) <br>

---

## ➕ Ajout de trains
Conscient que certains termes techniques peuvent présenter un problème de compréhension, j’ai pris la décision de rédiger une documentation dédiée à la manipulation des données techniques présentes dans le projet. Un lexique est également disponible pour aider la compréhension.

> [!WARNING]  
> Les données existantes présentes dans le projet proviennent de sources officielles et sont publiques. <br>
> Les données confidentielles appartenant aux exploitants ne sont pas autorisées à être publiées. <br>

## 📄 Licences
### 📄 Licence du projet
- Licence principale : **AGPL-3.0**

### ✒️ Polices
- **Meshed Display** : [Licence Propriétaire](legal/licenses/License_Meshed_Display.pdf)
- ~~**PT Sans** : [SIL Open Font License](legal/licenses/OFL.txt)~~
- **IBM Plex Sans** : [SIL Open Font License](legal/licenses/OFL.txt)

### 🗺️ Référentiel & icônes de lignes
- **LineReferentiel.json & lines_alleged.geojson** : [License ODbL](https://opendatacommons.org/licenses/odbl/1.0/)
- **img/lines/** (icônes officielles IDFM optimisées) : [License ODbL](https://opendatacommons.org/licenses/odbl/1.0/) <br>


### ℹ️ Infos complémentaires
- Les données du fichier lineReferentiel.json proviennent du référentiel des lignes publié par Île-de-France Mobilités sur [PRIM](https://prim.iledefrance-mobilites.fr/) et l'[OpenData](https://opendata.iledefrance-mobilites.fr/) sous licence ODbL.
-	Les indices visuels des lignes sont ceux d’Île-de-France Mobilités, diffusés en [OpenData](https://opendata.iledefrance-mobilites.fr/) sous licence ODbL.