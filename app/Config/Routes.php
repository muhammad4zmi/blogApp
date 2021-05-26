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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/')
$routes->get('/', 'Pages::index');
$routes->get('/admin/dashboard/', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/dashboard/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/profil/', 'Profil::index', ['filter' => 'role:admin']);
$routes->get('/admin/profil/index', 'Profil::index', ['filter' => 'role:admin']);
$routes->get('/admin/category/', 'Category::index', ['filter' => 'role:admin']);
$routes->get('/admin/category/index', 'Category::index', ['filter' => 'role:admin']);
$routes->get('/admin/blog/index', 'Blog::index', ['filter' => 'role:admin']);
$routes->get('/admin/blog/', 'Blog::index', ['filter' => 'role:admin']);
$routes->get('/admin/portofolio/', 'Portofolio::index', ['filter' => 'role:admin']);
$routes->get('/admin/portofolio/index', 'Portofolio::index', ['filter' => 'role:admin']);
$routes->get('/admin/portofolio/create', 'Portofolio::create', ['filter' => 'role:admin']);
$routes->get('/admin/blog/create', 'Blog::create', ['filter' => 'role:admin']);
$routes->get('/admin/blog/edit/(:segment)', 'Blog::edit/$1', ['filter' => 'role:admin']);
$routes->get('/admin/portofolio/edit/(:segment)', 'Portofolio::edit/$1', ['filter' => 'role:admin']);
$routes->delete('/admin/blog/(:num)', 'Blog::delete/$1', ['filter' => 'role:admin']);
$routes->delete('/admin/portofolio/(:num)', 'Portofolio::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/category/update', 'Category::update', ['filter' => 'role:admin']);
//$routes->get('/admin/profil/update/(:segment)', 'Profil::update/$1', ['filter' => 'role:admin']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
