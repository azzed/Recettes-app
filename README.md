# Projet-recette
                                              **blog de recettes de cuisines**
                    
                 
                 
###Présentation :

Ce projet personnel a été conçu pour la validation de la formation développeur web junior.
Il représente un blog de partage de recette de cuisine.


###Fonctionnement :

Dans ce blog toutes personnes  pourras visualiser les recettes qui ont été creer.
Pour ajouter une recette il faut s'inscrire, une fois inscrite la personne pourra ajouter ses recettes, les modifier ou les supprime ainsi que modifiée son pseudo et son mail
Pour des raisons de sécurité un espace admin est créé en cas d'ajout de mauvais contenus.
Toutes toutes personnes souhaitent recupere les données de chaque recette afin de de l'utiliser sur son site j'ai créé une URL pour la récupération de c'est donnée en format json.


###Installation :
####Prérequis : 

* PHP 7
* MYSQL
* MAMP ,XAMPP ou WAMP selon votre OS

####Installation

Télécharger le projet dans le dossier :
     
   * var/www pour ubuntu
   * wampserver/www  pour windows

En ligne de commande  dans le dossier du projet entrer cette commande :
        
        $ php composer.phar update
        
Pour la base de donnee :
    
   * importer le fichier bdd-projec5.sql dans la base de donnee

   * Ouvrir le fichier config.php modifier vos parametre :
        
        *  'dsn' =>  'votre port utiliser'
        *  'user' => 'votre identifiant'
        *  'pwd' => 'votre mot de passe'





