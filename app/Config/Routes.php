<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
/* ================ USER ROUTES ==================== */
$routes->get('/', 'HomeController::index');
$routes->get('productlist/(:num)', 'HomeController::productList/$1');
$routes->get('details/(:num)', 'HomeController::details/$1');
$routes->match(['get', 'post'], 'addToCart', 'HomeController::addToCart', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'decrement', 'HomeController::decrement', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'cart', 'HomeController::cart', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'checkout', 'HomeController::checkout', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'addShoppingAddress', 'HomeController::addShoppingAddress', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'proceedToOrder', 'HomeController::proceedToOrder', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'orderSuccess/(:any)', 'HomeController::orderSuccess/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'removeItem', 'HomeController::removeItem', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/login', 'AuthController::index', ['filter' => 'noauth']);
$routes->match(['get', 'post'], '/signup', 'AuthController::signup', ['filter' => 'noauth']);
$routes->get('/logout', 'AuthController::logout');

/* ================ ADMIN ROUTES ==================== */
$routes->match(['get', 'post'], '/admin', 'AuthController::adminLogin', ['filter' => 'noauth']);
$routes->get('/dashboard', 'AdminController::index', ['filter' => 'auth']);
$routes->get('/adminLogout', 'AuthController::adminLogout');

// Product
$routes->get('/product', 'ProductController::index', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/product/create', 'ProductController::create', ['filter' => 'auth']);
$routes->get('/product/delete/(:num)', 'ProductController::delete/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/product/update/(:num)', 'ProductController::update/$1', ['filter' => 'auth']);

// Category 
$routes->get('/category', 'CategoryController::index', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/category/create', 'CategoryController::create', ['filter' => 'auth']);
$routes->get('/category/delete/(:num)', 'CategoryController::delete/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/category/update/(:num)', 'CategoryController::update/$1', ['filter' => 'auth']);

// Orders Item
$routes->get('/order', 'OrderItemController::index', ['filter' => 'auth']);
$routes->get('/order-pending', 'OrderItemController::pendingOrder', ['filter' => 'auth']);
$routes->get('/order-accepted', 'OrderItemController::acceptedOrder', ['filter' => 'auth']);
$routes->get('/order-out-for-delivery', 'OrderItemController::outForDelivery', ['filter' => 'auth']);
$routes->get('/order-delivered', 'OrderItemController::deliveredOrder', ['filter' => 'auth']);
$routes->get('/generateOrderReport', 'OrderItemController::generateOrderReport', ['filter' => 'auth']);

/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
