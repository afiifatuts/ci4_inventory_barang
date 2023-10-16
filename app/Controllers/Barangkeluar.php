<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarangKeluar;

class Barangkeluar extends BaseController
{
    private function buatfaktur()
    {
        $tanggalSekarang = date('Y-m-d');
        $modelBarangKeluar = new ModelBarangKeluar();

        $hasil = $modelBarangKeluar->noFaktur($tanggalSekarang)->getRowArray();
        $data = $hasil['nofaktur'];

        $lastNoUrut = substr($data, -4); //diambil nilai 4 dijit terakhir
        //no urut ditambah 1
        $nextNoUrut = intval($lastNoUrut)+1;
        //membuat format nomor urut transaksi berikuttnya
        $nofaktur = date('dmy',strtotime($tanggalSekarang)).sprintf('%04s', $nextNoUrut);
        return $nofaktur;
    }
    public function buatNofaktur()  {
        $tanggalSekarang = $this->request->getPost('tanggal');
        $modelBarangKeluar = new ModelBarangKeluar();

        $hasil = $modelBarangKeluar->noFaktur($tanggalSekarang)->getRowArray();
        $data = $hasil['nofaktur'];

        $lastNoUrut = substr($data, -4); //diambil nilai 4 dijit terakhir
        //no urut ditambah 1
        $nextNoUrut = intval($lastNoUrut)+1;
        //membuat format nomor urut transaksi berikuttnya
        $nofaktur = date('dmy',strtotime($tanggalSekarang)).sprintf('%04s', $nextNoUrut);
        $json = [
            'nofaktur'=>$nofaktur
        ];
        echo json_encode($json);
    }
    public function data()
    {
        return view('barangkeluar/viewdata');
    }

    public function input() {

        $data =[
            'nofaktur'=>$this->buatfaktur()
        ];
        return view('barangkeluar/forminput',$data);
    }


}
