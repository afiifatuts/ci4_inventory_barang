<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelbarang;
use App\Models\ModelBarangKeluar;
use App\Models\ModelTempBarangKeluar;

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

    public function tampilDataTemp(){
        
        if($this->request->isAJAX()){
            $nofaktur = $this->request->getPost('nofaktur');

            $modalTempBarangKeluar = new ModelTempBarangKeluar();

            $dataTemp = $modalTempBarangKeluar->tampilDataTemp($nofaktur);
            $data=[
                'tampildata' =>$dataTemp
            ];

            $json=[
                'data' => view('barangkeluar/datatemp' , $data)
            ];

            echo json_encode($json);


        }
    }


    public function ambilDataBarang()  {
        if($this->request->isAJAX()){
            $kodebarang = $this->request->getPost('kodebarang');

            $modelBarang = new Modelbarang();

            $cekData = $modelBarang->find($kodebarang);

            if($cekData==null){
                $json = [
                    'error'=>'Maaf data barang tidak ditemukan...'
                ];
            }else{
                $data =[
                    'namabarang'=>$cekData['brgnama'],
                    'hargajual'=>$cekData['brgharga'],
                ];

                $json=[
                    'sukses'=> $data
                ];
            }
            echo json_encode($json);
        }
    }

    public function simpanItem() 
    {
        if($this->request->isAJAX()){
            //ambil data dari request
            $nofaktur = $this->request->getPost('nofaktur');
            $kodebarang = $this->request->getPost('kodebarang');
            $namabarang = $this->request->getPost('namabarang');
            $jml = $this->request->getPost('jml');
            $hargajual = $this->request->getPost('hargajual');

            //membuat model barang model
            $modalTempBarangKeluar = new ModelTempBarangKeluar();

            $modalTempBarangKeluar->insert([
                'detfaktur'=>$nofaktur,
                'detbrgkode'=>$kodebarang,
                'dethargajual'=>$hargajual,
                'detjml'=>$jml,
                'detsubtotal'=>intval($jml) * intval($hargajual),
            ]);

            $json =[
                'sukses'=>'Item berhasil ditambahkan'
            ];

            echo json_encode($json);

        }    
    }

    public function hapusItem()  {
        $id = $this->request->getPost('id');

        $modelTempBarangKeluar = new ModelTempBarangKeluar();
        $modelTempBarangKeluar->delete($id);

        $json=[
            'sukses' => 'Item Berhasil Dihapus'
        ];

        echo json_encode($json);
    }


}