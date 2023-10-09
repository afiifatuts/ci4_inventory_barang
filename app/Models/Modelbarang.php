<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbarang extends Model
{

    protected $table            = 'barang';
    protected $primaryKey       = 'brgkode';
    protected $allowedFields    = [
        'brgkode','brgnama','brgkatid','brgsatid','brgharga','brggambar','brgstok'
    ];

    //menampilkan semua field yang berhubungan dengan table barang(kategori&satuan)
    public function tampildata() {
        return $this->table('barang')->join('kategori')
    }

}
