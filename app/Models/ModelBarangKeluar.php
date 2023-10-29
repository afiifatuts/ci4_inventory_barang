<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarangKeluar extends Model
{
    protected $table            = 'barangkeluar';
    protected $primaryKey       = 'faktur';
    protected $allowedFields    = [
        'faktur', 'tglfaktur','idpel','totalharga','jumlahuang','sisauang'
        ,'order_id','payment_type','payment_method', 'transaction_time', 'transaction_status', 'va_number','bank'
    ];

    public function noFaktur($tanggalSekarang)  {
        return $this->table('barangkeluar')->select('max(faktur) as nofaktur')->where('tglfaktur', $tanggalSekarang)->get();

        //Select max(faktur) as nofaktur from barangkeluar where tglfaktur = '';
    }


}
