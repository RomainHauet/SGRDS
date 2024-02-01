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
$routes->get('/supprimer/(:num)', 'ListeRattrapageController::supprimerRattrapage/$1');
$routes->get('/valider/(:num)', 'ListeRattrapageController::valider/$1');
$routes->post('/valider/(:num)', 'ListeRattrapageController::validerRattrapage/$1');
$routes->get('/non_rattrapage/(:num)', 'ListeRattrapageController::nonRattrapage/$1');

$routes->get('/', 'ListeRattrapageController::index');

$routes->get('/ajout', 'AjoutRattrapageController::index');
$routes->post('/ajout', 'AjoutRattrapageController::ajoutRattrapage');

$routes->get('/oubli', 'ForgotPasswordController::index');
$routes->post('/oubli', 'ForgotPasswordController::sendResetLink');

$routes->get('/reset-password/(:any)', 'ResetPasswordController::index/$1');
$routes->post('/reset-password/(:any)', 'ResetPasswordController::updatePassword');

$routes->get('/ajout_enseignant', 'AjoutProfController::index/$1');
$routes->post('/ajout_enseignant', 'AjoutProfController::create');

$routes->get('/supprimerEnseignant/(:num)', 'AjoutProfController::supprimerEnseignant/$1');