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

$routes->get('/login', 'Admin\Login_Admin::index');

// Sebagai catatan setelah koma itu mengatur tujuannya (nama file lalu setelah titik dua nama function)
// (:any) untuk variabel

// $routes->get('dokter', 'admin\dokter::select');
// $routes->get('dokter/(:any)', 'admin\dokter::selectWhere/$1');

$routes->group('admin', ['filter' => 'Auth'], function ($routes) {

	$routes->add('/', 'Admin\Admin_Page::index');
	$routes->add('dokter', 'Admin\Dokter::read');
	$routes->add('dokter/create', 'Admin\Dokter::create');
	$routes->add('dokter/find/(:any)', 'Admin\Dokter::find/$1');
	$routes->add('ruang', 'Admin\Ruang::read');
	$routes->add('ruang/create', 'Admin\Ruang::create');
	$routes->add('ruang/find/(:any)', 'Admin\Ruang::find/$1');
	$routes->add('obat', 'Admin\Obat::read');
	$routes->add('obat/create', 'Admin\Obat::create');
	$routes->add('obat/find/(:any)', 'Admin\Obat::find/$1');
	$routes->add('laporan_pengunjung', 'Admin\Laporan_Pengunjung::read');
	$routes->add('laporan_pengunjung/create', 'Admin\Laporan_Pengunjung::create');
	$routes->add('laporan_pengunjung/find/(:any)', 'Admin\Laporan_Pengunjung::find/$1');
	$routes->add('pembelian_obat', 'Admin\Pembelian_Obat::read');
	$routes->add('pembelian_obat/create', 'Admin\Pembelian_Obat::create');
	$routes->add('pembelian_obat/find/(:any)', 'Admin\Pembelian_Obat::find/$1');
	$routes->add('pendaftaran', 'Admin\Pendaftaran::read');
	$routes->add('pendaftaran/create', 'Admin\Pendaftaran::create');
	$routes->add('pendaftaran/find/(:any)', 'Admin\Pendaftaran::find/$1');
	$routes->add('pasien', 'Admin\Pasien::read');
	$routes->add('pasien/create', 'Admin\Pasien::create');
	$routes->add('pasien/find/(:any)', 'Admin\Pasien::find/$1');
	$routes->add('transaksi', 'Admin\Transaksi::read');
	$routes->add('transaksi/create', 'Admin\Transaksi::create');
	$routes->add('transaksi/find/(:any)', 'Admin\Transaksi::find/$1');
	$routes->add('users', 'Admin\Users::read');
	$routes->add('users/create', 'Admin\Users::create');
	$routes->add('users/find/(:any)', 'Admin\Users::find/$1');
});

$routes->get('/login_pengguna', 'User\Login_User::index');
$routes->get('/utama', 'User\User_Page::index');

$routes->group('user', ['filter' => 'Auth_User'], function ($routes) {

	$routes->add('home_user', 'User\User_Page::masuk');
	$routes->add('dokter', 'User\Dokter_User::read');
	$routes->add('pendaftaran', 'User\Pendaftaran_User::read');
	$routes->add('pendaftaran/create', 'User\Pendaftaran_User::index');
	$routes->add('pendaftaran/find/(:any)', 'User\Pendaftaran_User::find/$1');
	$routes->add('jadwal', 'User\Pasien_User::index');
	$routes->add('transaksi', 'User\Transaksi_User::index');
	$routes->add('beli_obat', 'User\Pembelian_Obat_User::index');
	$routes->add('dokter_user', 'User\Dokter_User::index');
	$routes->add('obat_user', 'User\Obat_User::index');
	$routes->add('ruang_user', 'User\Ruang_User::index');
});


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
