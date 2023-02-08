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
$routes->setDefaultController('Home');
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
$routes->get('/', 'Home::index');
$routes->post('/proses', 'Home::proses');
$routes->get('/logout', 'Home::logout');
$routes->get('/contoh', 'Admin\Contoh::index');

$routes->get('/dashboard', 'Admin\Dashboard::index', ['filter' => 'adminFilter']);

//suplier
$routes->get('/suplier', 'Admin\Suplier::index', ['filter' => 'adminFilter']);
$routes->post('/suplier/tambah', 'Admin\Suplier::tambah', ['filter' => 'adminFilter']);
$routes->get('/suplier/hapus/(:num)', 'Admin\Suplier::hapus/$1', ['filter' => 'adminFilter']);
$routes->get('/suplier/edit/(:num)', 'Admin\Suplier::edit/$1', ['filter' => 'adminFilter']);
$routes->post('/suplier/editproses', 'Admin\Suplier::editproses', ['filter' => 'adminFilter']);

$routes->get('/satuan', 'Admin\Satuan::index', ['filter' => 'adminFilter']);
$routes->post('/satuan/tambah', 'Admin\Satuan::tambah', ['filter' => 'adminFilter']);
$routes->post('/satuan/edit', 'Admin\Satuan::edit', ['filter' => 'adminFilter']);
$routes->get('/satuan/hapus/(:num)', 'Admin\Satuan::hapus/$1', ['filter' => 'adminFilter']);

$routes->get('/jenis', 'Admin\Jenis::index', ['filter' => 'adminFilter']);
$routes->post('/jenis/tambah', 'Admin\Jenis::tambah', ['filter' => 'adminFilter']);
$routes->post('/jenis/edit', 'Admin\Jenis::edit', ['filter' => 'adminFilter']);
$routes->get('/jenis/hapus/(:num)', 'Admin\Jenis::hapus/$1', ['filter' => 'adminFilter']);

$routes->get('/gudang', 'Admin\Gudang::index', ['filter' => 'adminFilter']);
$routes->post('/gudang/tambah', 'Admin\Gudang::tambah', ['filter' => 'adminFilter']);
$routes->post('/gudang/edit', 'Admin\Gudang::edit', ['filter' => 'adminFilter']);
$routes->get('/gudang/hapus/(:num)', 'Admin\Gudang::hapus/$1', ['filter' => 'adminFilter']);

$routes->get('/inventory', 'Admin\Inventory::index', ['filter' => 'adminFilter']);
$routes->post('/inventory/tambah', 'Admin\Inventory::tambah', ['filter' => 'adminFilter']);
$routes->get('/inventory/ubah/(:any)', 'Admin\Inventory::ubah/$1', ['filter' => 'adminFilter']);
$routes->post('/inventory/edit', 'Admin\Inventory::edit', ['filter' => 'adminFilter']);
$routes->get('/inventory/hapus/(:any)', 'Admin\Inventory::hapus/$1', ['filter' => 'adminFilter']);

$routes->get('/barangmasuk', 'Admin\BarangMasuk::index', ['filter' => 'adminFilter']);
$routes->post('/barangmasuk/tambah', 'Admin\BarangMasuk::tambah', ['filter' => 'adminFilter']);
$routes->get('/barangmasuk/hapus/(:any)', 'Admin\BarangMasuk::hapus/$1', ['filter' => 'adminFilter']);

$routes->get('/barangkeluar', 'Admin\BarangKeluar::index', ['filter' => 'adminFilter']);
$routes->post('/barangkeluar/tambah', 'Admin\BarangKeluar::tambah', ['filter' => 'adminFilter']);
$routes->get('/barangkeluar/hapus/(:any)', 'Admin\BarangKeluar::hapus/$1', ['filter' => 'adminFilter']);

$routes->get('/laporan', 'Admin\Laporan::index', ['filter' => 'adminFilter']);
$routes->post('/report', 'Admin\Laporan::report', ['filter' => 'adminFilter']);

$routes->get('/prediksi', 'Admin\Prediksi::index', ['filter' => 'adminFilter']);
$routes->post('/prosesprediksi', 'Admin\Prediksi::proses', ['filter' => 'adminFilter']);
$routes->get('/deleteprediksi/(:num)', 'Admin\Prediksi::delete/$1', ['filter' => 'adminFilter']);

$routes->get('/usermanagement', 'Admin\User::index', ['filter' => 'adminFilter']);
$routes->post('/usermanagement/tambah', 'Admin\User::tambah', ['filter' => 'adminFilter']);
$routes->get('/usermanagement/hapus/(:num)', 'Admin\User::hapus/$1', ['filter' => 'adminFilter']);

$routes->get('/profile', 'Admin\Profile::index', ['filter' => 'adminFilter']);
$routes->post('/profile/editpass', 'Admin\Profile::editpass', ['filter' => 'adminFilter']);
$routes->post('/profile/edit', 'Admin\Profile::edit', ['filter' => 'adminFilter']);


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
