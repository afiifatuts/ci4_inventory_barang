<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldetailbarangmasuk extends Model
{
    protected $table            = 'detail_barangmasuk';
    protected $primaryKey       = 'iddetail';
    protected $allowedFields    = [
        'detfaktur','detbrgkode','dethargamasuk','dethargajual','detjml','detsubtotal'
    ];

   
}
