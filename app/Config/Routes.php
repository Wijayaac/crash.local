<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// client routes
$routes->get('/', 'Home::index');
$routes->get('/home/detail/(:segment)', 'Home::detail/$1');

// Login and register routes
$routes->get('register', 'Register::index');
$routes->get('register/save', 'Register::save');
$routes->get('login', 'Login::index');
$routes->get('login/seller', 'Login::sellerauth');
$routes->get('login/adminauth', 'Login::adminauth');

// admin routes
$routes->get('admin/view', 'Productadmin::index', ['filter' => 'authadmin']);
$routes->delete('admin/view/(:segment)', 'Productadmin::delete/$1', ['filter' => 'authadmin']);
$routes->get('admin/approve/(:segment)', 'Productadmin::approve/$1', ['filter' => 'authadmin']);
$routes->get('admin/detail/(:segment)', 'Productadmin::detail/$1', ['filter' => 'authadmin']);

// seller routes
$routes->get('seller/view', 'Productseller::index', ['filter' => 'auth']);
$routes->get('/productseller/save', 'Productseller::save', ['filter' => 'auth']);
$routes->get('seller/create', 'Productseller::create', ['filter' => 'auth']);
$routes->delete('seller/view/(:segment)', 'Productseller::delete/$1', ['filter' => 'auth']);
$routes->get('/productseller/update/(:any)', 'Productseller::update/$1', ['filter' => 'auth']);
$routes->get('/seller/edit/(:segment)', 'Productseller::edit/$1', ['filter' => 'auth']);
$routes->get('/seller/detail/(:segment)', 'Productseller::detail/$1', ['filter' => 'auth']);
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
