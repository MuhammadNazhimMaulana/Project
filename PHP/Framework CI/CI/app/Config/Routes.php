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
$routes->setDefaultController('Users');
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
$routes->get('/', 'Users::index', ['filter' => 'noauth']);
$routes->get('/logout', 'Users::logout');
$routes->get('/kategori/docter', 'Users::docter');
$routes->get('/kategori/daftar_obat', 'Users::daftar_obat');
$routes->get('/kategori/Membayar', 'Users::Membayar');
$routes->get('/kategori/beli_obat', 'Users::beli_obat');
$routes->get('/kategori/jadwal', 'Users::jadwal');
$routes->get('/Admin', 'Admin::index', ['filter' => 'noauth']);
$routes->get('/kategori/pendaftaran', 'Users::pendaftaran');
$routes->get('/admin/data/tambah_dokter', 'Admin::nambah');
$routes->match(['get', 'post'], 'register', 'Users::register', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'lupa_password', 'Users::lupa_password', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'profile', 'Users::profile', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'profile_lupa', 'Users::profile_lupa', ['filter' => 'auth']);
$routes->get('/admin/dashboard_admin', 'Admin::dashboard', ['filter' => 'noauth']);
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);


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
