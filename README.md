# BlogPress

## Contexte du projet
En tant que développeur PHP junior, vous êtes chargé de créer **"BlogPress"**, une plateforme de blog moderne avec des fonctionnalités d'analyse. Le client souhaite une plateforme permettant aux utilisateurs de publier des articles et de suivre leur performance. Ce projet vous permettra d'appliquer vos connaissances en **PHP** et **MySQL** tout en explorant des concepts d'analyse de données simples.

---

## Fonctionnalités principales

### Système d'authentification :
- Inscription des utilisateurs
- Connexion/Déconnexion
- Gestion des rôles (auteur/visiteur)
- Protection des routes sensibles

### Page d'accueil avec :
- Liste des articles triés par popularité
- Affichage du nombre de vues et de commentaires
- Visualisation des données avec **Chart.js** (graphique des articles les plus populaires)

### Page d'article avec :
- Système de commentaires
- Compteur de vues
- Bouton "like" interactif
- Indicateur de temps de lecture

### Dashboard auteur avec :
- Statistiques des articles (vues, commentaires, likes)
- Gestion des articles (CRUD)
- Visualisation des données avec **Chart.js** (graphique de l'évolution des vues dans le temps)

---

## User Stories

### En tant que visiteur :
- Je veux pouvoir voir les articles les plus populaires
- Je veux pouvoir commenter les articles
- Je veux pouvoir voir les statistiques basiques d'un article

### En tant qu'auteur :
- Je veux pouvoir créer, modifier et supprimer mes articles
- Je veux pouvoir voir les statistiques de mes articles
- Je veux pouvoir gérer les commentaires sur mes articles
- Je veux pouvoir visualiser la performance de mes articles via des graphiques

### En tant que développeur :
- Je dois implémenter un système de comptage de vues
- Je dois gérer l'authentification des utilisateurs
- Je dois implémenter un système de statistiques simple
- Je dois intégrer **Chart.js** pour la visualisation des données
- Je dois assurer la sécurité des données
- Je dois concevoir les diagrammes **ERD** et **Use Case**

---

## Technologies utilisées
- **PHP**
- **MySQL**
- **HTML/CSS/JavaScript**
- **Chart.js**
- **Composer** (pour la gestion des dépendances)

---

## Installation

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/abdelkouddousalami/BloggerPress.git
   ```

2. Naviguez dans le dossier :
   ```bash
   cd blogpress
   ```

3. Installez les dépendances via Composer :
   ```bash
   composer install
   ```

4. Créez une base de données MySQL et importez le fichier **database.sql** fourni.

5. Configurez le fichier **.env** pour connecter l'application à la base de données.

6. Lancez le serveur local :
   ```bash
   php -S localhost:8000
   ```

7. Accédez à l'application via [http://localhost:8000](http://localhost:8000).

---

## Diagrammes
- **ERD (Entity-Relationship Diagram)** 

- **Diagramme de cas d'utilisation (Use Case)** 

---

## Contributions
Les contributions sont les bienvenues ! Veuillez suivre ces étapes pour contribuer :
1. Forkez le dépôt.
2. Créez une branche pour votre fonctionnalité ou correction de bug :
   ```bash
   git checkout -b feature/nom-de-la-fonctionnalite
   ```
3. Faites vos modifications et validez-les :
   ```bash
   git commit -m "Ajout de la fonctionnalité X"
   ```
4. Poussez les modifications :
   ```bash
   git push origin feature/nom-de-la-fonctionnalite
   ```
5. Ouvrez une pull request.

---


## Auteur
Développé par : Abdelkouddous
