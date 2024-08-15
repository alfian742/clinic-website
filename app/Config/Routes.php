<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'Home::home');

$routes->group('master', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Master::index');
    $routes->get('detail/(:segment)', 'Master::detail/$1');
    $routes->get('print/(:segment)', 'Master::print/$1');
    $routes->get('generate-excel', 'Master::generateExcelReport');
    $routes->get('create', 'Master::create');
    $routes->post('save/(:segment)', 'Master::save/$1');
    $routes->get('edit/(:segment)', 'Master::edit/$1');
    $routes->post('update/(:segment)', 'Master::update/$1');
    $routes->delete('(:segment)', 'Master::delete/$1');
});

$routes->group('pasien', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Pasien::index');
    $routes->get('detail/(:segment)', 'Pasien::detail/$1');
    $routes->get('create', 'Pasien::create');
    $routes->post('save/(:segment)', 'Pasien::save/$1');
    $routes->get('edit/(:segment)', 'Pasien::edit/$1');
    $routes->post('update/(:segment)', 'Pasien::update/$1');
    $routes->delete('(:num)', 'Pasien::delete/$1');
});

$routes->group('tenaga-medis', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'TenagaMedis::index');
    $routes->get('detail/(:segment)', 'TenagaMedis::detail/$1');
    $routes->get('create', 'TenagaMedis::create');
    $routes->post('save/(:segment)', 'TenagaMedis::save/$1');
    $routes->get('edit/(:segment)', 'TenagaMedis::edit/$1');
    $routes->post('update/(:segment)', 'TenagaMedis::update/$1');
    $routes->delete('(:num)', 'TenagaMedis::delete/$1');
});

$routes->group('layanan', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Layanan::index');
    $routes->get('detail/(:segment)', 'Layanan::detail/$1');
    $routes->get('create', 'Layanan::create');
    $routes->post('save/(:segment)', 'Layanan::save/$1');
    $routes->get('edit/(:segment)', 'Layanan::edit/$1');
    $routes->post('update/(:segment)', 'Layanan::update/$1');
    $routes->delete('(:num)', 'Layanan::delete/$1');
});

$routes->group('transaksi', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Transaksi::index');
    $routes->get('print/(:segment)', 'Transaksi::print/$1');
    $routes->post('report', 'Transaksi::printReport');
});

$routes->group('user', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'User::index');
    $routes->get('edit(:segment)', 'User::edit/$1');
});
