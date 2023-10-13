<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
// Kategori Page 
$routes->get('/kategori/index', 'Kategori::index');
$routes->post('/kategori/index', 'Kategori::index');
$routes->get('/kategori/formtambah', 'Kategori::formtambah');
$routes->post('/kategori/simpandata', 'Kategori::simpandata');
$routes->get('/kategori/formedit/(:segment)', 'Kategori::formedit/$1');
$routes->post('/kategori/updatedata', 'Kategori::updatedata');
$routes->delete('/kategori/hapus/(:segment)', 'Kategori::hapus/$1');
$routes->get('/kategori/hapus/(:segment)', 'Kategori::index');


// Satuan Page 
$routes->get('/satuan/index', 'Satuan::index');
$routes->get('/satuan/formtambah', 'Satuan::formtambah');
$routes->post('/satuan/simpandata', 'Satuan::simpandata');
$routes->get('/satuan/formedit/(:segment)', 'Satuan::formedit/$1');
$routes->post('/satuan/updatedata', 'Satuan::updatedata');
$routes->delete('/satuan/hapus/(:segment)', 'Satuan::hapus/$1');
$routes->get('/satuan/hapus/(:segment)', 'Satuan::index');



$routes->get('/barang/index', 'Barang::index');
$routes->post('/barang/index', 'Barang::index');
$routes->get('/barang/tambah', 'Barang::tambah');
$routes->post('/barang/simpandata', 'Barang::simpandata');
$routes->get('/barang/edit/(:segment)', 'Barang::edit/$1');
$routes->post('/barang/updatedata', 'Barang::updatedata');
$routes->delete('/barang/hapus/(:segment)', 'Barang::hapus/$1');
$routes->get('/barang/hapus/(:segment)', 'Barang::index');


// Barang Masuk 
$routes->get('/barangmasuk/index', 'Barangmasuk::index');
$routes->post('/barangmasuk/dataTemp', 'Barangmasuk::dataTemp');
$routes->get('/barangmasuk/dataTemp', 'Barangmasuk::dataTemp');
$routes->post('/barangmasuk/ambilDataBarang', 'Barangmasuk::ambilDataBarang');
$routes->get('/barangmasuk/ambilDataBarang', 'Barangmasuk::ambilDataBarang');
$routes->post('/barangmasuk/simpanTemp', 'Barangmasuk::simpanTemp');
$routes->post('/barangmasuk/dataTemp', 'Barangmasuk::dataTemp');
$routes->post('/barangmasuk/hapus', 'Barangmasuk::hapus');
$routes->get('/barangmasuk/cariDataBarang', 'Barangmasuk::cariDataBarang');
$routes->post('/barangmasuk/detailCariBarang', 'Barangmasuk::detailCariBarang');
$routes->post('/barangmasuk/selesaiTransaksi', 'Barangmasuk::selesaiTransaksi');
$routes->get('/barangmasuk/data', 'Barangmasuk::data');
$routes->post('/barangmasuk/data', 'Barangmasuk::data');
$routes->post('/barangmasuk/detailItem', 'Barangmasuk::detailItem');
$routes->get('/barangmasuk/edit/(:segment)', 'Barangmasuk::edit/$1');
$routes->post('/barangmasuk/dataDetail', 'Barangmasuk::dataDetail');
$routes->post('/barangmasuk/editItem', 'Barangmasuk::editItem');
$routes->post('/barangmasuk/simpanDetail', 'Barangmasuk::simpanDetail');
$routes->post('/barangmasuk/updateItem', 'Barangmasuk::updateItem');
// $routes->post('/barangmasuk/edit/(:segment)', 'Barangmasuk::edit/$1');
