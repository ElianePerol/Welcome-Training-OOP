# Cahier des charges - Application web de gestion de classes avec signature en ligne

## 1. Objectifs de l'application
L'application doit permettre les fonctionnalités suivantes :
- **Gestion des utilisateurs** : enseignants, élèves et administrateurs.
- **Organisation des classes** : CRUD des affectations des élèves et des enseignants aux classes.
- **Gestion des matières et des emplois du temps** : configuration des matières et des horaires pour chaque classe.
- **Signature en ligne** : les utilisateurs pourront signer électroniquement pour valider leur présence.

## 2. Fonctionnalités

### 2.1 Profils utilisateurs

   **Administrateur :**
   - Gestion complète du système : création et gestion des utilisateurs (enseignants, élèves) et des classes.
   - Gestion des matières et des emplois du temps.
   - Gestion des signatures de présence.

   **Enseignant :**
   - Consultation des emplois du temps et des classes.
   - Génération, consultation et validation des signatures de présence.

   **Élève :**
   - Consultation de l'emploi du temps.
   - Signature de présence et consultation de l'historique.

#### 2.2 Connexion / Authentification
   - **Système d'authentification sécurisé** : basé sur des emails et des mots de passe chiffrés (utilisation de la fonction `password_hash()`).
   - **Gestion des rôles** : administrateur, enseignant et élève avec des fonctionnalités spécifiques.
   - **Récupération de mot de passe** : réinitialisation du mot de passe via un email sécurisé.

### 2.3 Classes
   - **CRUD des classes ** Administrateur :
      - Nom de la classe (ex. : BTS SIO 2 SLAM).
      - Année scolaire (ex : 2024-2025)
      - Liste des matières enseignées.

   - **Affectation des enseignants et élèves ** Administrateur :
      - Assigner des enseignants à une classe.
      - Assigner des élèves à une classe.

   - **Visualisation des classes ** Administrateur & enseignants :
      - Consulter les informations sur les classes : liste des élèves, matières, emploi du temps.

### 2.4 Matières et emploi du temps
   - **Gestion des matières** Administrateur
      - CRUD les matières pour chaque classe.
      - Assignées à enseignants.

   - **Emploi du temps :**
      - Administrateur : définir des créneaux horaires pour chaque matière pour chaque classe.
      - Enseignants et élèves : visualisation de l'emploi du temps (format hebdomadaire) via espace personnel.

### 2.5 Signature en ligne

   - **Signature électronique** :
      - La demande de signature sera déclenchée par l'enseignant et envoyée via l'espace personnel et/ou mail.
      - La signature devra être **sécurisée** et accompagnée d’un horodatage pour assurer la validité du processus.
      - La signature sera assignée à son enseignant, élève, matière et créneaux horaire.
      - Chaque utilisateur pourra consulter l'historique de ses signatures.

   - **Archivage** :
      - Les signatures seront archivés et resteront disponibles pour consultation.

## 3. Exigences techniques

### 3.1 Langages de développement
   - **Backend :** PHP natif sans frameworks (ou en utilisant des bibliothèques PHP simples pour des fonctionnalités spécifiques).
   - **Frontend :** 
         HTML5 pour la structure des pages
         CSS3 pour la mise en forme, utilisation obligatoire du framework Bootstrap
         JavaScript pour les interactions dynamiques (possibilité d'utiliser des bibliothèques légères comme jQuery).
   - **Base de données :** MySQL avec des tables bien structurées et des relations entre les classes, élèves, enseignants, matières et évaluations.

### 3.2 Hébergement
   - Hébergement sur un serveur Apache compatible avec **PHP 7+**.
   - Base de données **MySQL** hébergée sur le même serveur.

### 3.3 Sécurité
   - **Sessions sécurisées** pour la gestion des utilisateurs et des connexions.
   - Utilisation de **HTTPS** pour garantir la confidentialité des échanges.
   - **Cryptage des mots de passe** (avec des fonctions comme `password_hash()`).
   - **Vérification des signatures numériques** : utilisation d’horodatage et de systèmes de chiffrement pour assurer l’authenticité des signatures électroniques.

### 3.4 Compatibilité
   - Compatibilité avec les navigateurs web modernes : **Google Chrome**, **Mozilla Firefox**, **Microsoft Edge**.
   - **Responsive Design** : l’interface doit être adaptée aux différents types d’appareils (ordinateurs, tablettes, smartphones).

## 4. Interfaces utilisateur

### 4.1 Tableau de bord de l'administrateur
   - Vue d’ensemble des utilisateurs (enseignants, élèves).
   - Gestion des classes et des matières.
   - Accès aux archives des signatures.
   - Statistiques générales (nombre d'élèves, d’enseignants, de classes).

### 4.2 Interface enseignant
   - Consultation de l'emploi du temps.
   - Liste des classes et des élèves.
   - Création et gestion des signature.

### 4.3 Interface élève
   - Consultation de l'emploi du temps.
   - Signature et acccès à leurs archives.

## 5. Livrables attendus
   - Code source complet et documenté de l'application.
   - **Documentation technique** expliquant l’installation et l’administration du système.
   - **Documentation utilisateur** pour les enseignants, élèves, et administrateurs.
   - Base de données MySQL préconfigurée avec les tables et relations nécessaires.