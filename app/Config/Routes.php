<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('/kategori/index', 'Kategori::index');
$routes->get('/kategori/formtambah', 'Kategori::formtambah');
$routes->post('/kategori/simpandata', 'Kategori::simpandata');
$routes->get('/kategori/formedit/(:segment)', 'Kategori::formedit/$1');
$routes->post('/kategori/updatedata', 'Kategori::updatedata');
$routes->delete('/kategori/hapus/(:segment)', 'Kategori::hapus/$1');
$routes->get('/kategori/hapus/(:segment)', 'Kategori::index');



$routes->get('/satuan/index', 'Satuan::index');
$routes->get('/satuan/formtambah', 'Satuan::formtambah');
$routes->post('/satuan/simpandata', 'Satuan::simpandata');


$routes->get('/barang/index', 'Barang::index');
