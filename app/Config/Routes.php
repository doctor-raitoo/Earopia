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

$routes->get('/checkout', 'CheckoutController::index');

$routes->post('/checkout/process', 'CheckoutController::process');
$routes->get('/invoice/(:num)', 'CheckoutController::invoice/$1');

$routes->get('/transaksi-saya', 'TransaksiUserController::index');
$routes->get('/transaksi-saya/detail/(:num)', 'TransaksiUserController::detail/$1');

//admin
$routes->get('/admin/dashboard', 'AdminController::dashboard');
$routes->get('/admin/transaksi', 'AdminController::transaksi');
$routes->get('/admin/transaksi/detail/(:num)', 'AdminController::detail/$1');
$routes->get('/admin/verifikasi/(:num)', 'AdminController::verifikasi/$1');
$routes->get('/admin/status-barang/(:num)/(:any)', 'AdminController::updateStatusBarang/$1/$2');

$routes->get('/admin/produk', 'AdminProdukController::index');
$routes->post('/admin/produk/store', 'AdminProdukController::store');
$routes->post('/admin/produk/update/(:num)', 'AdminProdukController::update/$1');
$routes->get('/admin/produk/delete/(:num)', 'AdminProdukController::delete/$1');

$routes->get('/admin/kategori', 'AdminKategoriController::index');
$routes->post('/admin/kategori/store', 'AdminKategoriController::store');
$routes->post('/admin/kategori/update/(:num)', 'AdminKategoriController::update/$1');
$routes->get('/admin/kategori/delete/(:num)', 'AdminKategoriController::delete/$1');



