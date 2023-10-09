<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
    public function index()
    {
        return view('kategori/viewkategori');
    }
}
