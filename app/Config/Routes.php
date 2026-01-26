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
    $routes->get('dashboard', 'Administradores\Dashboard::index');
});

// Grupo de Rutas User
$routes->group('user', ['filter' => 'authUser'], function ($routes) {
    $routes->get('dashboard', 'Usuarios\Dashboard::index');
});
