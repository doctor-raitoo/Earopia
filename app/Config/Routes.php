<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/produk', 'ProdukUserController::index');
$routes->post('/cart/add', 'CartController::add');
$routes->get('/cart', 'CartController::index');
$routes->get('/cart/delete/(:num)', 'CartController::delete/$1');
$routes->post('/cart/update', 'CartController::updateQty');
$routes->get('/produk/(:num)', 'ProdukUserController::detail/$1');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::processLogin');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::processRegister');