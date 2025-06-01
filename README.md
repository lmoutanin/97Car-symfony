# 974CAR — Application de gestion de garage

Application Symfony pour gérer les clients, véhicules, réparations et factures du garage 974CAR.

---

## ⚙️ Stack technique

- PHP 8.2+ avec Symfony
- PostgreSQL 16
- Docker & Docker Compose
- Adminer

---

## ▶️ Lancement

### 1. Cloner le projet

```bash
git clone https://github.com/lmoutanin/97Car-symfony.git
cd 97Car-symfony
```

### 2. Lancer les conteneurs

```bash
docker-compose up -d --build
```

### 3. Accéder aux services

- Application web : [http://localhost](http://localhost)
- Adminer (interface de gestion PostgreSQL) : [http://localhost:8181](http://localhost:8181)

**Informations de connexion à la base :**

| Service     | Valeur     |
|-------------|------------|
| SGBD        | PostgreSQL |
| Serveur     | database   |
| Utilisateur | user       |
| Mot de passe| password   |
| Base        | 97Car      |

---

## 📦 Installation des dépendances front-end

```bash
composer req easycorp/easyadmin-bundle:4.x-dev -W

apt update && apt install -y postgresql-client

mv assets/styles/app.css assets/styles/app.scss

curl -o /usr/local/bin/n https://raw.githubusercontent.com/visionmedia/n/master/bin/n
chmod +x /usr/local/bin/n
n stable

npm install sass-loader@^16.0.1 sass --save-dev
npm install bootstrap @popperjs/core bs-custom-file-input --save-dev
npm install
```

---

## 🚀 Compilation des assets

```bash
symfony run npm run dev
symfony run -d npm run watch
```

---

## 🗃️ Import du trigger SQL

Un fichier SQL est disponible dans `assets/import/`.  
Pour activer le trigger de mise à jour automatique des montants des factures :

1. Rendez-vous sur Adminer : [http://localhost:8181](http://localhost:8181)  
2. Connectez-vous à la base `97Car`  
3. Importez manuellement le fichier SQL situé dans `assets/import/`

---
