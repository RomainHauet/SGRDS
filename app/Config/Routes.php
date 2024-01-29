<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/connexion', 'ConnexionController::index');
$routes->get('/connexionForm', 'ConnexionController::loginAuth');
$routes->get('/', 'ListeRattrapageController::index');
