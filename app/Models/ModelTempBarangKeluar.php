<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTempBarangKeluar extends Model
{
   
    protected $table            = 'temp_barangkeluar';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'detfaktur', 'detbrgkode','dethargajual','detjml','detsubtotal'
    ];

    // join sama table barang supaya nama barangnya tampil
    public function tampilDataTemp($nofaktur) {
        return $this->table('temp_barangkeluar')->join('barang','detbrgkode=brgkode')->where('detfaktur',$nofaktur)->get();
    }

    public function hapusData($nofaktur){
        return $this->table('temp_barangkeluar')->delete(['detfaktur'=>$nofaktur]);
    }

   
}
