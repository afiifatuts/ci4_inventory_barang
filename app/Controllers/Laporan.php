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

    public function tampiGrafikBarangMasuk()
    {
        $bulan = $this->request->getPost('bulan');

        $db = \Config\Database::connect();
        //SELECT tglfaktur AS tgk, totalharga FROM barangmasuk WHERE DATE_FORMAT(tglformat,'%Y-%m') = '2021-11' ORDER BY tglfaktur ASC;
        $query = $db->query("SELECT tglfaktur AS tgl, totalharga FROM barangmasuk WHERE DATE_FORMAT(tglfaktur,'%Y-%m') = '$bulan' ORDER BY tglfaktur ASC")->getResult();
        // $query = $db->query("SELECT tglfaktur AS tgl, totalharga FROM barangmasuk WHERE DATE_FORMAT(tglformat, '%Y-%m') = '$bulan' ORDER BY tgl ASC")->getResult();


        $data = [
            'grafik'=>$query
        ];

        $json = [
            'data'=> view('laporan/grafikbarangmasuk',$data)
        ];
        echo json_encode($json);
    }
}