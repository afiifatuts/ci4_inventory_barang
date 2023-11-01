# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds the distributable version of the framework.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library


# Screenshoot Aplikasi 
## Login
![Screenshot 2023-11-01 092819](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/cb31fdd0-b6f5-406b-b5ab-52f307bc8e28)

## Admin Page

![Screenshot 2023-11-01 092833](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/614c5cf9-f11d-4adb-8741-58408e848297)


## Kategori Page
![Screenshot 2023-11-01 092844](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/16e0c71c-c749-4057-b38b-8f0ca4c1ec54)

Tambah Kategori
![Screenshot 2023-11-01 092924](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/ab23deb0-cfcb-470d-89e9-38b14d82e78a)

Edit Kategori
![Screenshot 2023-11-01 092946](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/fe15ffe3-5016-4e86-b8a9-1e24b014ce7f)

Hapus Kategori 
![Screenshot 2023-11-01 093001](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/ff5e5f7b-2bbd-4abe-8c75-d577ab336bb5)

## Satuan Page
![Screenshot 2023-11-01 093014](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/293eeb02-32f4-4137-b152-a24b15c5ea5e)

Tambah Satuan
![Screenshot 2023-11-01 093033](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/361ec5e2-8813-4fd5-aeed-3470008c50bc)

Edit Satuan 
![Screenshot 2023-11-01 093044](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/0fe31535-cf0f-41ad-a865-cdcdcad8d785)

Hapus Satuan 
![Screenshot 2023-11-01 093057](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/dca0d222-7b5a-4ed6-8045-9cb6c8470188)

## Barang Page
![Screenshot 2023-11-01 093106](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/bd26ef23-2036-469f-a0e8-5e50383779dc)

Tambah Barang  
![Screenshot 2023-11-01 093215](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/a2f9fb2c-0abd-4fbb-ab98-ad828d5d5174)

Edit Barang 
![Screenshot 2023-11-01 093234](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/8f4562e7-16f0-4715-923d-ca2cec9e1785)

Hapus Barang
![Screenshot 2023-11-01 093246](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/f86929e2-5261-42cb-bb1a-48b5273c9ee8)

## Barang Masuk Page

![Screenshot 2023-11-01 093258](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/71aaafae-0958-4d10-a637-2f7a467e3ce0)

Input Barang Masuk 
![Screenshot 2023-11-01 094141](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/c2074c1e-fdcf-497b-bdf4-5b8467139641)

Pilih Barang
![Screenshot 2023-11-01 094152](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/817319af-3185-450b-a21a-abf0da6da525)

Simpan Transaksi 
![Screenshot 2023-11-01 094218](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/0424486a-8087-4e8f-b493-72b8eacdc9ec)
![Screenshot 2023-11-01 094228](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/c34d4601-333d-4f47-8338-0576f2adbe9a)

Edit Barang Masuk 
![Screenshot 2023-11-01 094302](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/d1de768c-b96b-4dc5-a997-a868fbdfbf25)

Hapus Item Barang Masuk
![Screenshot 2023-11-01 094316](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/45562580-4884-4084-8371-5f6be98cd0a8)

Hapus Barang Masuk 
![Screenshot 2023-11-01 094334](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/f20ff154-5a41-45d3-b5ca-ed83cec12eca)

## Barang Keluar Page

![Screenshot 2023-11-01 094654](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/e7ee95bc-d955-4c30-ba3b-70c035f88358)

Input Barang Keluar
![Screenshot 2023-11-01 094718](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/5f02c8ba-adec-48b2-bba8-172c882e0f96)

Input Pelanggan
![Screenshot 2023-11-01 094752](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/b083f3ec-8e39-4c93-bddb-33600db9414a)

![Screenshot 2023-11-01 094802](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/729491a9-9276-442f-b72f-5d396e588d6d)

Cari Barang
![Screenshot 2023-11-01 094812](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/0c43fbef-aa54-4033-9b8c-ce04387a180c)

Simpan Barang
![Screenshot 2023-11-01 094845](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/a5853e86-9e52-4243-891d-e102851b72c3)

Pembayaran Cash 
![Screenshot 2023-11-01 094856](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/7512aac9-7150-4d19-972e-0966f46da6ec)

Pembayaran Midtrans 
![Screenshot 2023-11-01 094906](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/359c7656-b276-4161-b8ac-aac3607c554b)
![Screenshot 2023-11-01 094917](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/33ba30e3-161f-44d8-b2aa-6d8eae3885e4)

Status Pembayaran Midtrans
![Screenshot 2023-11-01 095020](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/0549f3e2-297d-4f7a-8c45-d59d8f01531c)

## Cetak Laporan Page
![Screenshot 2023-11-01 095046](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/c0ab9f97-21a6-41c7-92a0-ee5958dbc2dd)

Cetak Laporan
![Screenshot 2023-11-01 095105](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/1a2075f3-6366-43ac-a69c-db0eebda4d8c)
![Screenshot 2023-11-01 095115](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/5bf66cca-c7e7-4c0b-89b5-96c32023799a)

File Excel
![Screenshot 2023-11-01 095750](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/38d22780-76f6-4ade-944f-e93b3b19a795)

## Backup Db Page
![Screenshot 2023-11-01 095145](https://github.com/afiifatuts/ci4_inventory_barang/assets/32781700/76c93c57-f813-4dbf-b54c-dd03ecd9601c)
