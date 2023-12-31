<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/main/index', 'Main::index');
// $routes->get('/main', 'Main::index');

// login user
$routes->post('/login/cekUser', 'Login::cekUser');
$routes->get('/login/index', 'Login::index');
$routes->get('/login/keluar', 'Login::keluar');
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
$routes->post('/barangmasuk/hapusItemDetail', 'Barangmasuk::hapusItemDetail');
$routes->post('/barangmasuk/hapusTransaksi', 'Barangmasuk::hapusTransaksi');
$routes->get('/barangmasuk/hapusTransaksi', 'Barangmasuk::hapusTransaksi');
// $routes->post('/barangmasuk/edit/(:segment)', 'Barangmasuk::edit/$1');

// Barang Keluar 
$routes->get('/barangkeluar/data', 'Barangkeluar::data');
$routes->get('/barangkeluar/input', 'Barangkeluar::input');
$routes->post('/barangkeluar/buatNofaktur', 'Barangkeluar::buatNofaktur');
$routes->get('/barangkeluar/tampilDataTemp', 'Barangkeluar::tampilDataTemp');
$routes->post('/barangkeluar/tampilDataTemp', 'Barangkeluar::tampilDataTemp');
$routes->post('/barangkeluar/ambilDataBarang', 'Barangkeluar::ambilDataBarang');
$routes->post('/barangkeluar/simpanItem', 'Barangkeluar::simpanItem');
$routes->post('/barangkeluar/hapusItem', 'Barangkeluar::hapusItem');
$routes->get('/barangkeluar/modalCariBarang', 'Barangkeluar::modalCariBarang');
$routes->post('/barangkeluar/listDataBarang', 'Barangkeluar::listDataBarang');
$routes->post('/barangkeluar/modalPembayaran', 'Barangkeluar::modalPembayaran');
$routes->post('/barangkeluar/simpanPembayaran', 'Barangkeluar::simpanPembayaran');
$routes->get('/barangkeluar/cetakFaktur/(:segment)', 'Barangkeluar::cetakFaktur/$1');
$routes->post('/barangkeluar/listData', 'Barangkeluar::listData');
$routes->post('/barangkeluar/hapusTransaksi', 'Barangkeluar::hapusTransaksi');
$routes->get('/barangkeluar/edit/(:segment)', 'Barangkeluar::edit/$1');
$routes->post('/barangkeluar/ambilTotalHarga', 'Barangkeluar::ambilTotalHarga');
$routes->post('/barangkeluar/tampilDataDetail', 'Barangkeluar::tampilDataDetail');
$routes->post('/barangkeluar/hapusItemDetail', 'Barangkeluar::hapusItemDetail');
$routes->post('/barangkeluar/editItem', 'Barangkeluar::editItem');
$routes->post('/barangkeluar/simpanItemDetail', 'Barangkeluar::simpanItemDetail');
$routes->get('/barangkeluar/cektransaksi/(:segment)', 'Barangkeluar::cektransaksi/$1');


// Pelanggan 
$routes->get('/pelanggan/formtambah', 'Pelanggan::formtambah');
$routes->post('/pelanggan/simpan', 'Pelanggan::simpan');
$routes->get('/pelanggan/modalData', 'Pelanggan::modalData');
$routes->post('/pelanggan/listData', 'Pelanggan::listData');
$routes->post('/pelanggan/hapus', 'Pelanggan::hapus');


//Laporan
$routes->get('/laporan/index', 'Laporan::index');
$routes->get('/laporan/cetak_barang_masuk', 'Laporan::cetak_barang_masuk');
$routes->post('/laporan/cetak_barang_masuk_periode', 'Laporan::cetak_barang_masuk_periode');
$routes->post('/laporan/tampiGrafikBarangMasuk', 'Laporan::tampiGrafikBarangMasuk');

// Utility 
$routes->get('/utility/index', 'Utility::index');
$routes->get('/utility/doBackup', 'Utility::doBackup');

//Payment
$routes->post('/payment/index', 'Payment::index');
$routes->get('/payment/index', 'Payment::index');
$routes->post('/barangkeluar/payMidtrans', 'Barangkeluar::payMidtrans');
$routes->post('/barangkeluar/finishMidtrans', 'Barangkeluar::finishMidtrans');

//Users
$routes->get('/users/index', 'Users::index');
$routes->get('/users/listData', 'Users::listData');
// $routes->group("export_absen", ["namespace" => "App\Controllers\Admin", "filter" => "authWebsite"], function ($routes) {
//     $routes->match(["get", "post"], "/", "Export_absen::index");
//     $routes->match(["get", "post"], "display", "Export_absen::display");
//     $routes->match(["get", "post"], "export_csv", "Export_absen::exportCsv");
//     $routes->match(["get", "post"], "delete", "Export_absen::delete");

//     $routes->match(["get", "post"], "detail", "Export_absen::detail");
// });