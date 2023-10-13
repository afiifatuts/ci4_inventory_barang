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


    public function dataDetail($faktur){
        return $this->table('detail_barangmasuk')->join('barang','brgkode=detbrgkode')->where('detfaktur',$faktur)->get();
    }

    public function ambilTotalHarga($faktur)  {
        $query = $this->table('detail_barangmasuk')->getWhere([
            'detfaktur'=>$faktur
        ]);

        $totalHarga = 0;
        foreach ($query->getResultArray() as $r) {
            $totalHarga += $r['detsubtotal'];
        }
        return $totalHarga;
    }

    public function ambilDetailBerdasarkanID($iddetail){
        return $this->table('detail_barangmasuk')->join('barang','brgkode=detbrgkode')->where('iddetail',$iddetail)->get();
    }
    
    public function hapusFaktur($faktur) {
        return $this->table('detail_barangmasuk')->delete('detfaktur',$faktur);
    }

   
}
