<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeltempbarangmasuk;
use App\Models\Modelbarang;


class Barangmasuk extends BaseController
{
    public function index()
    {
        return view('barangmasuk/forminput');
    }

    public function dataTemp()
    {
        if($this->request->isAJAX()){
            $faktur = $this->request->getPost('faktur');
            
            $modelTemp = new Modeltempbarangmasuk();
            $data =[
                'datatemp'=>$modelTemp ->tampilDataTemp($faktur)
            ];

            $json =[
                'data'=> view('barangmasuk/datatemp',$data)
            ];
            echo json_encode($json);
        }else{
            exit("maaf tidak bisa dipanggil");
        }
    }

    public function ambilDataBarang() {
        if($this->request->isAJAX()){
            $kodebarang = $this->request->getPost('kodebarang');
            $modelBarang = new Modelbarang();

            $ambilData = $modelBarang->find($kodebarang);

            if ($ambilData == NULL){
                $json =[
                    'error'=>'Data barang tidak ditemukan....'
                ];
            }else{
                $data =[
                    'namabarang'=> $ambilData['brgnama'],
                    'hargajual'=> $ambilData['brgharga']
                ];
    
                $json = [
                    'sukses'=> $data
                ];
    
            }

           
            echo json_encode($json);
        }else{
            exit("maaf tidak bisa dipanggil");
        }
    }

    public function simpanTemp() {
        if($this->request->isAJAX()){
           $faktur = $this->request->getPost('faktur');
           $hargajual = $this->request->getPost('hargajual');
           $hargabeli = $this->request->getPost('hargabeli');
           $kdbarang = $this->request->getPost('kdbarang');
           $jumlah = $this->request->getPost('jumlah');
           
           $modelTempBarang = new Modeltempbarangmasuk();

           $modelTempBarang->insert([
            'detfaktur'=>$faktur,
            'detbrgkode'=>$kdbarang,
            'dethargamasuk'=>$hargabeli,
            'dethargajual'=>$hargajual,
            'detjml'=>$jumlah,
            'detsubtotal'=> intval($jumlah)* intval($hargabeli)
           ]);


           $json = [
            'sukses'=> 'Item berhasil ditambahkan'
           ];
           echo json_encode($json);
        }else{
            exit("maaf tidak bisa dipanggil");
        }
    }

    public function hapus()  {
        if($this->request->isAJAX()){
            $id = $this->request->getPost('id');
            $modelTempBarang = new Modeltempbarangmasuk();
 
            $modelTempBarang->delete($id);
 
 
            $json = [
             'sukses'=> 'Item berhasil dihapus'
            ];
            echo json_encode($json);
         }else{
             exit("maaf tidak bisa dipanggil");
         }
    }

    public function cariDataBarang()  {
        if($this->request->isAJAX()){
            
            $json = [
             'data'=> view('barangmasuk/modalcaribarang')
            ];
            echo json_encode($json);
         }else{
             exit("maaf tidak bisa dipanggil");
         }
    }

    public function detailCariBarang() {
        if($this->request->isAJAX()){
            $cari = $this->request->getPost('cari');

            $modelBarang = new Modelbarang();
 
            $data= $modelBarang->tampildata_cari($cari)->get();

            if($data != null){
                $json = [
                    'data'=> view('barangmasuk/detaildatabarang',[
                        'tampildata'=>$data
                    ])
                   ];  
                   echo json_encode($json);
            }
 
 
            
         }else{
             exit("maaf tidak bisa dipanggil");
         }
    }
}
