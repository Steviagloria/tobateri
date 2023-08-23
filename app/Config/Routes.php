<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

 $filterLogin = ['filter' => 'authAdmin'];

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', $filterLogin);
$routes->get('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/barang', 'Barang::index', $filterLogin);
$routes->get('/barang/tambah', 'Barang::tambah', $filterLogin);
$routes->get('/barang/ubah/(:num)', 'Barang::ubah/$1', $filterLogin);

$routes->get('/satuan', 'Satuan::index', $filterLogin);
$routes->get('/satuan/tambah', 'Satuan::tambah', $filterLogin);
$routes->get('/satuan/ubah/(:num)', 'Satuan::ubah/$1', $filterLogin);

$routes->get('/supplier', 'Supplier::index', $filterLogin);
$routes->get('/supplier/tambah', 'Supplier::tambah', $filterLogin);
$routes->get('/supplier/ubah/(:num)', 'Supplier::ubah/$1', $filterLogin);

$routes->get('/transaksi/masuk', 'Transaksi::masuk', $filterLogin);
$routes->get('/transaksi/masuk/add', 'Transaksi::addTransaksiMasuk', $filterLogin);
$routes->get('/transaksi/masuk/ubah/(:num)', 'Transaksi::changeTransaksiMasuk/$1', $filterLogin);

$routes->get('/transaksi/keluar', 'Transaksi::keluar', $filterLogin);
$routes->get('/transaksi/keluar/add', 'Transaksi::addTransaksiKeluar', $filterLogin);
$routes->get('/transaksi/keluar/ubah/(:num)', 'Transaksi::changeTransaksiKeluar/$1', $filterLogin);

$routes->get('/api/v1/barang', 'API\BarangAPI::list', $filterLogin);
$routes->post('/api/v1/barang/add', 'API\BarangAPI::add', $filterLogin);
$routes->post('/api/v1/barang/edit', 'API\BarangAPI::put', $filterLogin);
$routes->post('/api/v1/barang/delete', 'API\BarangAPI::delete', $filterLogin);

$routes->post('/api/v1/satuan/add', 'API\SatuanAPI::add', $filterLogin);
$routes->post('/api/v1/satuan/edit', 'API\SatuanAPI::put', $filterLogin);
$routes->post('/api/v1/satuan/delete', 'API\SatuanAPI::delete', $filterLogin);

$routes->post('/api/v1/supplier/add', 'API\SupplierAPI::add', $filterLogin);
$routes->post('/api/v1/supplier/edit', 'API\SupplierAPI::put', $filterLogin);
$routes->post('/api/v1/supplier/delete', 'API\SupplierAPI::delete', $filterLogin);

$routes->post('/api/v1/transaksi/masuk/add', 'API\TransaksiAPI::newTransaksiMasuk', $filterLogin);
$routes->post('/api/v1/transaksi/masuk/delete', 'API\TransaksiAPI::deleteTransaksiMasuk', $filterLogin);
$routes->post('/api/v1/transaksi/masuk/edit', 'API\TransaksiAPI::changeTransaksiMasuk', $filterLogin);

$routes->post('/api/v1/transaksi/keluar/add', 'API\TransaksiAPI::newTransaksiKeluar', $filterLogin);
$routes->post('/api/v1/transaksi/keluar/delete', 'API\TransaksiAPI::deleteTransaksiKeluar', $filterLogin);
$routes->post('/api/v1/transaksi/keluar/edit', 'API\TransaksiAPI::changeTransaksiKeluar', $filterLogin);

$routes->post('/api/v1/auth/login', 'API\AuthAPI::login');

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
