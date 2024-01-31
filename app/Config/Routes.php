<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/connexion', 'ConnexionController::index');
$routes->get('/deconnexion', 'ConnexionController::deconnexion');
$routes->post('/connexion', 'ConnexionController::loginAuth');
$routes->get('/modifier/(:num)', 'ListeRattrapageController::modifier/$1');
$routes->post('/modifier/(:num)', 'ListeRattrapageController::modifierRattrapage/$1');
$routes->get('/supprimer/(:num)', 'ListeRattrapageController::supprimer/$1');
$routes->post('/supprimer/(:num)', 'ListeRattrapageController::supprimerRattrapage/$1');

$routes->get('/', 'ListeRattrapageController::index');

$routes->get('/ajout', 'AjoutRattrapageController::index');
$routes->post('/ajout', 'AjoutRattrapageController::ajoutRattrapage');

$routes->get('/oubli', 'ForgotPasswordController::index');
$routes->post('/oubli', 'ForgotPasswordController::sendResetLink');