<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Satuan extends BaseController
{
    public function index()
    {
        return view('satuan/viewsatuan');
    }
}
