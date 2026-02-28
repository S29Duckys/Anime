# TryAnime

Une application web de catalogage et de streaming d'anime, développée avec Laravel 12 et Tailwind CSS 4. Design dark moderne avec animations personnalisées.

---

## Sommaire

- [Technologies utilisées](#technologies-utilisées)
- [Architecture du projet](#architecture-du-projet)
- [Installation](#installation)
- [Structure des dossiers](#structure-des-dossiers)
- [Base de données](#base-de-données)
- [Fonctionnalités](#fonctionnalités)
- [État du développement](#état-du-développement)
- [Problèmes connus](#problèmes-connus)

---

## Technologies utilisées

### Backend
| Technologie | Version | Rôle |
|-------------|---------|------|
| **PHP** | ^8.2 | Langage serveur |
| **Laravel** | ^12.0 | Framework backend |
| **SQLite** | — | Base de données (développement) |
| **BCrypt** | 12 rounds | Hachage des mots de passe |

### Frontend
| Technologie | Version | Rôle |
|-------------|---------|------|
| **Vite** | 7.0.7 | Bundler / HMR |
| **Tailwind CSS** | 4.0.0 | Framework CSS utilitaire |
| **Axios** | 1.11.0 | Client HTTP JavaScript |

### Outils de développement
| Outil | Rôle |
|-------|------|
| **Laravel Pint** | Formatage / linting PHP |
| **PHPUnit 11.5** | Tests unitaires |
| **Laravel Sail** | Environnement Docker |
| **Laravel Pail** | Logs en temps réel |

### Fonts (Google Fonts)
- **Bebas Neue** — Titres et headings
- **Noto Sans JP** — Support des caractères japonais
- **Inter** — Texte courant

---

## Architecture du projet

Le projet suit l'architecture **MVC (Model - View - Controller)** de Laravel.

```
Anime/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Controller.php          # Contrôleur de base
│   │       └── UsersController.php     # Inscription & connexion
│   ├── Models/
│   │   ├── User.php                    # Modèle utilisateur (Authenticatable)
│   │   └── anime.php                   # Modèle anime (vide - en cours)
│   └── Providers/
│       └── AppServiceProvider.php
├── database/
│   ├── migrations/                     # Schéma de la BDD
│   ├── seeders/                        # Données de test
│   └── database.sqlite                 # Fichier BDD SQLite
├── resources/
│   ├── css/
│   │   ├── app.css                     # CSS principal + Tailwind
│   │   ├── root.css                    # Variables CSS (thème)
│   │   ├── reset.css                   # Reset CSS
│   │   └── pages/
│   │       ├── login.css
│   │       └── register.css
│   ├── js/
│   │   ├── app.js                      # Point d'entrée JS
│   │   ├── bootstrap.js
│   │   ├── components/
│   │   │   └── cursorAnimation.js      # Curseur personnalisé
│   │   └── pages/
│   │       ├── login.js                # Logique formulaire login
│   │       └── register.js             # Formulaire multi-étapes
│   └── views/
│       ├── welcome.blade.php           # Page d'accueil
│       └── auth/
│           ├── login.blade.php         # Page de connexion
│           └── register.blade.php      # Page d'inscription
├── routes/
│   └── web.php                         # Définition des routes HTTP
├── composer.json
├── package.json
└── vite.config.js
```

---

## Installation

### Prérequis
- PHP 8.2+
- Composer
- Node.js & npm

### Étapes

```bash
# 1. Cloner le dépôt
git clone <url-du-repo>
cd Anime

# 2. Installer les dépendances PHP
composer install

# 3. Installer les dépendances Node
npm install

# 4. Copier et configurer le fichier d'environnement
cp .env.example .env
php artisan key:generate

# 5. Créer la base de données et exécuter les migrations
touch database/database.sqlite
php artisan migrate

# 6. (Optionnel) Remplir la BDD avec les données de test
php artisan db:seed --class=InfoAnimeSeeder

# 7. Lancer les serveurs de développement
php artisan serve          # Backend Laravel (port 8000)
npm run dev                # Frontend Vite (HMR)
```

L'application sera disponible sur **http://localhost:8000**.

---

## Base de données

Le projet utilise **SQLite** par défaut (fichier `database/database.sqlite`).

### Tables

#### `users`
| Colonne | Type | Description |
|---------|------|-------------|
| id | bigint | Clé primaire |
| pseudo | string | Pseudonyme unique |
| prenom | string | Prénom |
| nom | string | Nom de famille |
| email | string | Email unique |
| password | string | Mot de passe haché (BCrypt) |
| email_verified_at | timestamp | Vérification email |
| remember_token | string | Token "se souvenir de moi" |
| timestamps | — | created_at, updated_at |

#### `info_anime`
| Colonne | Type | Description |
|---------|------|-------------|
| id | bigint | Clé primaire |
| title | string | Titre de l'anime |
| image_url | string | URL de l'affiche |
| release_date | date | Date de sortie |
| genre | string | Genre(s) |
| sinopsis | text | Synopsis |
| timestamps | — | created_at, updated_at |

#### `sessions` / `cache` / `jobs`
Tables Laravel standard pour la gestion des sessions, du cache et des files d'attente.

### Seeder disponible
`InfoAnimeSeeder` — insère 4 animes de test (données issues d'Anime-Sama).

---

## Fonctionnalités

### Routes disponibles

| Méthode | URL | Nom | Description |
|---------|-----|-----|-------------|
| GET | `/` | — | Page d'accueil |
| GET | `/register` | `register` | Afficher le formulaire d'inscription |
| POST | `/register` | `register` | Traiter l'inscription |
| GET | `/login` | `login` | Afficher le formulaire de connexion |
| POST | `/login` | `login` | Traiter la connexion |

### Design & UI

- **Thème dark** avec palette rouge/orange anime
  - Background principal : `#080810`
  - Accent rouge : `#e63946`
  - Accent orange : `#ff6b35`
- **Curseur personnalisé** avec animation dot + ring
- **Animations fluides** sur les boutons et cards
- **Design responsive**

### Page d'accueil (`/`)
- Navigation avec liens login/register
- Section hero avec branding anime
- Section "Trending" avec cards anime (statiques pour l'instant)
- Section "Featured" pour un anime mis en avant
- Grille d'exploration par genres (6 genres)
- Statistiques : 12K+ animes, 48K membres, 850+ studios

### Inscription (`/register`)
- Formulaire **multi-étapes** (2 étapes)
  - Étape 1 : prénom, nom, pseudo, email
  - Étape 2 : mot de passe + confirmation
- Barre de progression visuelle
- Indicateur de force du mot de passe
- Bouton toggle visibilité du mot de passe
- Validation côté serveur (Laravel)
- Boutons OAuth Google / GitHub (UI uniquement)

### Connexion (`/login`)
- Champs email + mot de passe
- Case "Se souvenir de moi"
- Lien "Mot de passe oublié"
- Toggle visibilité du mot de passe
- Boutons OAuth (UI uniquement)

---

## État du développement

### Terminé
- [x] Page d'accueil animée
- [x] Formulaire d'inscription (UI + backend complet)
- [x] Validation des données utilisateur
- [x] Hachage des mots de passe
- [x] Création d'utilisateur en BDD
- [x] Page de connexion (UI)
- [x] Table `info_anime` + seeder
- [x] Pipeline Vite + Tailwind CSS 4

### En cours / À faire
- [ ] Logique de connexion (authentification)
- [ ] Création de session après login
- [ ] Routes protégées (middleware auth)
- [ ] Déconnexion
- [ ] Dashboard utilisateur
- [ ] Affichage du catalogue anime depuis la BDD
- [ ] Page de détail d'un anime
- [ ] Recherche et filtres
- [ ] Watchlist utilisateur
- [ ] Vérification email
- [ ] Réinitialisation du mot de passe
- [ ] Intégration OAuth (Google, GitHub)

---

## Problèmes connus

1. **Décalage de schéma** — La migration `create_users_table` crée une colonne `name` mais le modèle `User` utilise `pseudo`, `prenom`, `nom`. La migration personnalisée semble gérer ça séparément, à vérifier.

2. **Login non fonctionnel** — Les méthodes `showLoginForm()` et `login()` dans `UsersController` sont déclarées mais pas encore implémentées.

3. **Modèle `anime.php` vide** — Aucune relation ou méthode définie.

4. **Contenu statique** — Les cards d'anime sur la homepage sont des placeholders codés en dur, pas reliés à la BDD.

5. **OAuth non implémenté** — Les boutons Google/GitHub sont présents dans l'UI mais ne font rien.

---

## Conventions de code

- **PHP** : PSR-12, formaté avec Laravel Pint
- **Commits** : Conventional Commits (`feat:`, `fix:`, `refactor:`)
- **Vues** : Blade templates Laravel
- **CSS** : Tailwind CSS + fichiers CSS personnalisés par page

---

*Projet en cours de développement actif.*
