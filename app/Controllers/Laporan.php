<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelbarangmasuk;

class Laporan extends BaseController
{
    public function index()
    {
        return view('laporan/index');
    }

    public function cetak_barang_masuk()
    {
        return view('laporan/viewbarangmasuk');
    }

    public function cetak_barang_masuk_periode(){
        $tglawal = $this->request->getPOst('tglawal');
        $tglakhir = $this->request->getPOst('tglakhir');

        $modelBarangMasuk = new Modelbarangmasuk();

        $dataLaporan = $modelBarangMasuk->laporanPerPeriode($tglawal, $tglakhir);
    
        $data = [
            'datalaporan'=>$dataLaporan,
            'tglawal'=>$tglawal,
            'tglakhir'=>$tglakhir,
        ];

        return view('laporan/cetaklapooranbarangmasuk',$data);

    }
}