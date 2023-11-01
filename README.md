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

