<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    public function index()
    {
        return view('barang/viewbarang');
    }
}
