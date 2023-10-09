<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('/kategori/index', 'Kategori::index');
$routes->get('/satuan/index', 'Satuan::index');
$routes->get('/barang/index', 'Barang::index');
