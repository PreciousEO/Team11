<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('/spalten', 'Spalten::index');
//$routes->get('/spalten/erstellen', 'Spalten::erstellen');
//$routes->get('create_spalten', 'Spalten::erstellen');
$routes->get('tasks','Tasks::index');
$routes->get('personen','Personen::index');
$routes->get('tasks/new', 'Tasks::new');
$routes->post('tasks/create', 'Tasks::create');
$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1');
$routes->post('tasks/update/(:num)', 'Tasks::update/$1');
$routes->post('tasks/delete/(:num)', 'Tasks::delete/$1');
$routes->get('spalten', 'Spalten::index');
$routes->get('spalten/new', 'Spalten::new');
$routes->post('spalten/create', 'Spalten::create');
$routes->get('spalten/edit/(:num)', 'Spalten::edit/$1');
$routes->post('spalten/update/(:num)', 'Spalten::update/$1');
$routes->post('spalten/delete/(:num)', 'Spalten::delete/$1');
$routes->get('boards', 'Boards::index');
$routes->get('boards/new', 'Boards::new');
$routes->post('boards/create', 'Boards::create');
$routes->get('boards/edit/(:num)', 'Boards::edit/$1');
$routes->post('boards/update/(:num)', 'Boards::update/$1');
$routes->post('boards/delete/(:num)', 'Boards::delete/$1');
$routes->post('tasks/updateSort', 'Tasks::updateSort');





