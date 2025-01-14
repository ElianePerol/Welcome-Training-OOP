# Welcome Training - Gestion de Classes et Présences (Version POO)

## Contexte
Ce projet a été réalisé dans le cadre de mon **BTS SIO SLAM**. Il s'agit d'une application web permettant la gestion des classes, des emplois du temps, et des présences pour une école supérieure.  
Cette version est développée en **PHP orienté objet (POO)**, offrant une meilleure structure du code et facilitant sa maintenance et son évolutivité.

## Fonctionnalités Principales
- **Gestion des utilisateurs** : Création, modification et suppression des enseignants, élèves et administrateurs.
- **Gestion des classes et des matières** : Assigner des enseignants et des élèves aux classes, gérer les matières et l'emploi du temps.
- **Présence** : Permet aux enseignants de faire l'appel et aux élèves de valider leur présence en cours, avec horodatage.
- **Authentification sécurisée** : Connexion avec mot de passe chiffré et gestion des rôles (administrateur, enseignant, élève).

## Architecture
Le projet est structuré autour des concepts fondamentaux de la **programmation orientée objet** :
- Classes PHP pour représenter les entités principales : `User`, `Class`, `Schedule`, `Attendance`, etc.
- Gestion centralisée des connexions à la base de données.
- Utilisation des interfaces et des classes abstraites pour standardiser les comportements.
- Séparation des préoccupations grâce à une organisation modulaire des fichiers.

## Technologies Utilisées
- **Backend** : PHP natif (procédural)
- **Frontend** : HTML5, CSS3 (avec Bootstrap), JavaScript
- **Base de données** : MySQL
- **Sécurité** : Cryptage des mots de passe avec `password_hash()`, gestion des sessions sécurisées, HTTPS
