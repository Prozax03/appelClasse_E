# Appel Classe

Table of contents:
* [Introduction](#introduction)
* [Installation](#installation)
* [Utilisation](#utilisation)

## Introduction

Appel Classe est une application web permettant de faire l'appel dans une école.

VERSION P - Personnel (https://github.com/Prozax03/appelClasse_P)
Cette version suffit pour un utilisateur qui a installé un serveur web sur son poste de travail.

VERSION E - Etablissement (Plusieurs utilisateurs) -- EN COURS DE DEV
Cette version nécessite un serveur afin que vous utilisateurs puissent se connecter dessus. 
Au moins un administrateur devra être défini.

## Installation

Connexion par defaut : 
    - DB Name : appelclasse_E
    - User : root
    - Pass : 
    
ATTENTION, si vous changez les identifiants, il faut également les modifer dans les fichiers suivants : 

    - model/db.php


Dans le projet, la base de données s'importe automatiquement dès que le fichier install.txt est présent dans la racine.
Si besoin, la BDD se trouve dans "Import/appelclasse.sql" (tant que vous n'utilisez pas la fonction d'import).

## Utilisation

Démarrez votre serveur web et accédez au repertoire du projet pour accéder à la page par défaut (index.php).
ex : http://localhost/appelClasse/ -> redirigera automatiquement sur index.php 
