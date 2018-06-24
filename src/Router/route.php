<?php
/**
 * Created by PhpStorm.
 * UserController: Azzedine
 * Date: 23/04/2018
 * Time: 15:20
 */

$routes = [
    'home' =>
        [
            'url' => '',
            'controller' => '\App\Controller\HomeController',
            'action' => 'home'
        ],
    'recette' =>
        [
            'url' => 'recette/{id}',
            'controller' => '\App\Controller\RecetteController',
            'action' => 'show',
            'params' => 'id',

        ],

    'register' =>
        [
            'url' => 'register',
            'controller' => '\App\Controller\RegisterController',
            'action' => 'register'
        ],


    'addCount' =>
        [
            'url' => 'inscrit',
            'controller' => '\App\Controller\RegisterController',
            'action' => 'subscriber',
            'method' => 'post'
        ],
    'connexion' =>
        [
            'url' => 'connexion',
            'controller' => '\App\Controller\ConnexionController',
            'action' => 'connexion',

        ],
    'login' =>
        [
            'url' => 'login',
            'controller' => '\App\Controller\ConnexionController',
            'action' => 'login',
            'method' => 'post'
        ],
    'deconnexion' =>
        [
            'url' => 'deconnexion',
            'controller' => '\App\Controller\ConnexionController',
            'action' => 'disconnect',
            'method' => 'post'
        ],
    'addRecipe' =>
        [
            'url' => 'recipeAdd',
            'controller' => '\App\Controller\RecetteController',
            'action' => 'recipAdd',
            'method' => 'post'
        ],
    'dashboard' =>
        [
            'url' => 'dashboard',
            'controller' => '\App\Controller\UserController',
            'action' => 'dashboard'
        ],
    'delete' =>
        [
            'url' => 'delete/{id}',
            'controller' => '\App\Controller\RecetteController',
            'action' => 'removeRecipe',
            'params' => 'id'
        ],
    'update' =>
        [
            'url' => 'update/{id}',
            'controller' => '\App\Controller\RecetteController',
            'action' => 'updateRecipe',
            'params' => 'id',
        ],
    'updateRecipe' =>
        [
            'url' => 'updateRecipe',
            'controller' => '\App\Controller\RecetteController',
            'action' => 'recipeUpdated',
            'method' => 'post',

        ],
    'updated' =>
        [
            'url' => 'updated/{id}',
            'controller' => '\App\Controller\UserController',
            'action' => 'updateProfil',
            'params' => 'id',
        ],
    'updateProfil' =>
        [
            'url' => 'updateProfil',
            'controller' => '\App\Controller\UserController',
            'action' => 'profilUpdated',
            'method' => 'post',

        ],
    'deleteProfil' =>
        [
            'url' => 'deleteProfil/{id}',
            'controller' => '\App\Controller\UserController',
            'action' => 'removeProfil',
            'params' => 'id'
        ],

    'admin_dashboard' =>
        [
            'url' => 'admin/dashboard',
            'controller' => '\App\Controller\AdminController',
            'action' => 'dashboard'
        ],

    'api_recette_all' =>
        [
            'url' => 'api/recette',
            'controller' => '\App\Controller\ApiController',
            'action' => 'all',
        ],
    'api_recette_detail' =>
        [
            'url' => 'api/recette/{id}',
            'controller' => '\App\Controller\ApiController',
            'action' => 'detail',
            'params' => 'id',
        ],


];
return $routes;
