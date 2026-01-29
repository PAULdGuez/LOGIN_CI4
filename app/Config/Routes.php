<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rutas de Autenticación
$routes->get('/login', 'AuthController::login');
$routes->post('/auth/check', 'AuthController::check');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/', 'AuthController::login');
$routes->get('/dash', 'DashboardAdmin::index');

// Grupo de Rutas Admin
$routes->group('admin', ['filter' => 'authAdmin'], function ($routes) {
    // Listar
    $routes->get('dashboard', 'Administradores\Dashboard::index');
    $routes->get('users', 'Administradores\Users::index');
    
    // Crear
    $routes->get('users/new', 'Administradores\Users::new');
    $routes->post('users/create', 'Administradores\Users::create');
    
    // Editar
    $routes->get('users/edit/(:num)', 'Administradores\Users::edit/$1');
    $routes->post('users/update/(:num)', 'Administradores\Users::update/$1');
    
    // Borrar
    $routes->get('users/delete/(:num)', 'Administradores\Users::delete/$1');
});

// Grupo de Rutas User
$routes->group('user', ['filter' => 'authUser'], function ($routes) {
    $routes->get('dashboard', 'Usuarios\Dashboard::index');
});
