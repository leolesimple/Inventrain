# Ajouter des trains

Comme le sujet est assez compliqué lorsque l'on va dans les détails autres que c'est un train de la ligne A, j'ai trouvé
utile d'expliquer que mettre et où trouver vos informations pour ajouter un train dans **L'Inventrain**.

## Quels trains ajouter/modifier ?

### Mise en service en cours

- RER NG (sur les RER D et E) <br> Les RER NG ou Z58000 et Z58500 sont en cours de mise en service sur les lignes D et E
  depuis 2023, vous trouverez la liste des mises en service sur le site
  trainsso. <br> [Liste des RER D](https://trainsso.fr/Z58500.pdf) et [Liste des RER E](https://trainsso.fr/Z58000.pdf).
  <br><br>

- Regio 2N (sur la ligne D) <br> Les Regio 2N ou Z57000 sont en cours de mise en service sur la ligne D. La liste sur
  trainsso.<br>[Liste des Z57000](https://trainsso.fr/Z57000.pdf).

### Rénovation :

- MI2N Altéo (sur le RER A) <br> Les MI2N Altéo sont en OPMV (Opération Mie-Vie) La liste Wikipédia (remplie par la RATP
  sous pseudonymes) <br> [Liste des MI2N Altéo](https://fr.wikipedia.org/wiki/Liste_des_Alt%C3%A9o).


- Z2N (sur les RER C, D et Transilien P, U, V). <br> **Aucune source ne permet de donner de date de rénovation au
  03/03/2025.**


- MI79/MI84 (sur le RER B) <br> [Liste des MI79/MI84](https://fr.wikipedia.org/wiki/Liste_des_Z_8100).<br> **Les
  rénovations des MI84 se terminent en juin 2025.**

### Retrait de service

- Z22500 (MI2N Eole, RER E) → Suite à une trop grande incompatibilitée avec le RER NG, la radiation des MI2N Eole a été
  avancée de 6 mois. <br> [Liste des Z22500](https://fr.wikipedia.org/wiki/Liste_des_Z_22500).


- VB2N (Transilien J) → Le prolongement du RER E à Mantes la Jolie arrive. Ces rames des années 70 partent à la
  retraite. <br> [Liste des VB2N](https://fr.wikipedia.org/wiki/Liste_des_VB2N).


- MI79/MI84 (RER B) → Les MI84 ont déjà été en partie radiés mais le reste le sera à partir de
  \2027. <br> [Liste des MI79/MI84](https://fr.wikipedia.org/wiki/Liste_des_Z_8100).

## Documentation des champs :

### **Informations générales :**

| **Attribut**                             | **Exemple**                                                 | **Explication**                                                                           |
|------------------------------------------|-------------------------------------------------------------|-------------------------------------------------------------------------------------------|
| **Numéro du train**                      | Z 50 001/2                                                  | Numéro unique d'identification du train                                                   |
| **Nom de la série**                      | Z 20500, Z50 000, MI09…                                     | Nom de la série à laquelle appartient le train                                            |
| **Propriétaire**                         | SNCF Voyageurs, Île-de-France Mobilités, RATP               | Acheteur du train (Les trains livrés ou renovés après 1990 appartiennent à IDFM d'office) |
| **Livrée appliquée**                     | Carmillon, Île-de-France Mobilités, STIF/RATP               | Design extérieur du train                                                                 |
| **Constructeur**                         | Alstom, Bombardier, Siemens                                 | Entreprise qui a fabriqué le train                                                        |
| **Année de mise en service de la série** | 2009-2022                                                   | Année où la série de trains a commencé à être utilisée                                    |
| **Date de livraison**                    | 2 décembre 2022                                             | Date à laquelle le train a été livré                                                      |
| **Ancienneté du train**                  | (calcul automatique à partir de la date de mise en service) | Âge du train calculé à partir de sa date de mise en service                               |

### **Caractéristiques techniques :**

| **Attribut**                          | **Exemple**           | **Explication**                                                                               |
|---------------------------------------|-----------------------|-----------------------------------------------------------------------------------------------|
| **Tension d’alimentation électrique** | 1,5 kV, 25 kV, 750 V… | Tension électrique utilisée par le train (dépend du réseau)                                   |
| **Puissance**                         | 2 000 kW              | Puissance du train en kilowatts                                                               |
| **Capacité en passagers**             | 1500pax               | Nombre de passagers que le train peut transporter (en service commercial ≠ service technique) |
| **Vitesse maximale**                  | 160km/h               | Vitesse maximale que le train peut atteindre (en général 160km/h sur le RFN)                  |
| **Accélération**                      | m3/s                  | Capacité d'accélération du train                                                              |

### **Affectation et exploitation :**

| **Attribut**                      | **Exemple**                                                        | **Explication**                                           |
|-----------------------------------|--------------------------------------------------------------------|-----------------------------------------------------------|
| **Réseau concerné**               | SNCF, RATP                                                         | Réseau ferroviaire où le train est utilisé                |
| **Ligne(s) d’affectation**        | RER A, Transilien J…                                               | Lignes spécifiques où le train est en service (1 et plus) |
| **Établissement d'attache (STF)** | Technicentre de Clichy (SLJ)                                       | Dépôt où le train est rattaché                            |
| **Statut actuel**                 | En service, Rénové, Hors service, Démoli, En attente de rénovation | État actuel du train                                      |

### **Évolution du matériel :**

| **Attribut**           | **Exemple**             | **Explication**                                       |
|------------------------|-------------------------|-------------------------------------------------------|
| **Date de rénovation** |                         | Date à laquelle le train a été rénové (si applicable) |
| **Type de rénovation** | OPMV, Rénovation Légère | Type de travaux effectués lors de la rénovation       |

### **Gestion et maintenance :**

| **Attribut**                      | **Exemple**                           | **Explication**                                                                                                                                                                                      |
|-----------------------------------|---------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| **Incidents majeurs répertoriés** | déraillements, pannes, modernisations | Incidents importants survenus au train (si connu)                                                                                                                                                    |
| **Système de conduite**           | Conducteur, SACEM, NExTEO, KVB        | Système de conduite du train (conduite à vue ou automatique, semi-automatique)                                                                                                                       |
| **Niveau d'automatisation**       | GOA0, GOA1, 2, ...                    | Niveau d'automatisation du train (de 0 à 4) [Tableau des niveaux](https://fr.wikipedia.org/wiki/Transports_guid%C3%A9s_urbains_automatiques#Tableau_r%C3%A9capitulatif_des_niveaux_d'automatisation) |
