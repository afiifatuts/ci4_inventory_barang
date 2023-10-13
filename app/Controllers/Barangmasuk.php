<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeltempbarangmasuk;
use App\Models\Modelbarang;
use App\Models\Modelbarangmasuk;
use App\Models\Modeldetailbarangmasuk;

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

    public function selesaiTransaksi()  {
        if($this->request->isAJAX()){
          $faktur = $this->request->getPost('faktur');
          $tglfaktur = $this->request->getPost('tglfaktur');
        
          $modelTemp = new Modeltempbarangmasuk();
          $dataTemp = $modelTemp->getWhere(['detfaktur'=>$faktur]);

          if($dataTemp->getNumRows() == 0){
            $json=[
                'error'=> 'Maaf, data iten untuk faktur ini belum ada...'
            ];
          }else{
            //Simpan ke Table Barang Masuk
            $modelBarangMasuk = new Modelbarangmasuk();
            $totalSubtotal =0;

            foreach($dataTemp->getResultArray() as $total):
                $totalSubtotal += intval($total['detsubtotal']);
                // $totalSubtotal = $totalSubtotal + intval($total['detsubtotal']);
          endforeach;
          $modelBarangMasuk->insert([
            'faktur'=>$faktur,
            'tglfaktur'=>$tglfaktur,
            'totalharga'=>$totalSubtotal
          ]);

          //Simpan ke Tavel detail barang masuk
          $modelDetailBarangMasuk = new Modeldetailbarangmasuk();
          foreach ($dataTemp->getResultArray() as $row):
            $modelDetailBarangMasuk->insert([
                'detfaktur'=>$row['detfaktur'],
                'detbrgkode'=>$row['detbrgkode'],
                'dethargamasuk'=>$row['dethargamasuk'],
                'dethargajual'=>$row['dethargajual'],
                'detjml'=>$row['detjml'],
                'detsubtotal'=>$row['detsubtotal'],
            ]);
          endforeach;

          //Hapus data yang ada ditabel temp 
          $modelTemp ->emptyTable();

          $json = [
            'sukses'=>'Transaksi berhasil disimpan'
          ];

          }
            echo json_encode($json);
         }else{
             exit("maaf tidak bisa dipanggil");
         }
    }

    public function data(){
        $tombolcari = $this->request->getPost('tombolcari');

        if(isset($tombolcari)){
            $cari = $this->request->getPost('cari');
            session()->set('cari_faktur',$cari);
            redirect()->to('/barangmasuk/data');
        }else{
            $cari = session()->get('cari_faktur');
        }

        $modelBarangMasuk = new Modelbarangmasuk();
        
        //method from modelbarang
        $totalData = $cari? $modelBarangMasuk->tampildata_cari($cari)->countAllResults() :$modelBarangMasuk->countAllResults();
      

        $databarangmasuk = $cari?$modelBarangMasuk->tampildata_cari($cari)->paginate(10,'barangmasuk') :$modelBarangMasuk->paginate(10,'barangmasuk');
      
        $nohalaman = $this->request->getVar('page_barangmasuk')?$this->request->getVar('page_barangmasuk'):1;
      

        $data =[
            'tampildata'=>$databarangmasuk,
            'pager'=>$modelBarangMasuk->pager,
            'nohalaman'=>$nohalaman,
            'totaldata'=>$totalData,
            'cari'=>$cari
        ];

        return view('barangmasuk/viewdata',$data);
    }

    public function detailItem() {
        if($this->request->isAJAX()){
            $faktur = $this->request->getPost('faktur');

            $modelDetail = new Modeldetailbarangmasuk();

            $data =[
                'tampildatadetail'=>$modelDetail->dataDetail($faktur)
            ];

            $json = [
                'data' => view('barangmasuk/modaldetailitem',$data)
            ];
            echo json_encode($json);
 
            
         }else{
             exit("maaf tidak bisa dipanggil");
         }
    }

    public function edit($faktur) {
        $modelBarangMasuk = new Modelbarangmasuk();

        $cekFaktur = $modelBarangMasuk->cekFaktur($faktur);

        if($cekFaktur->getNumRows()>0){
            $row = $cekFaktur->getRowArray();

            $data =[
                'nofaktur'=>$row['faktur'],
                'tanggal'=>$row['tglfaktur']
            ];
            return view('barangmasuk/formedit',$data);
        }else{
            exit('Data tidak ditemukan');
        }

    }

    public function dataDetail(){
        if($this->request->isAJAX()){
            $faktur = $this->request->getPost('faktur');
            
            $modelDetail = new Modeldetailbarangmasuk();
            $data =[
                'datadetail'=>$modelDetail ->dataDetail($faktur),
               
            ];

            $totalHargaFaktur = number_format($modelDetail ->ambilTotalHarga($faktur),0,",",".");
            $json =[
                'data'=> view('barangmasuk/datadetail',$data),
                'totalHarga'=>$totalHargaFaktur
            ];
            echo json_encode($json);
        }else{
            exit("maaf tidak bisa dipanggil");
        }
    }

    public function editItem() 
    {
        if($this->request->isAJAX()){
            $iddetail = $this->request->getPost('iddetail');
            
            $modelDetail = new Modeldetailbarangmasuk();
            $ambilData = $modelDetail->ambilDetailBerdasarkanID($iddetail);

            $row = $ambilData->getRowArray();

            $data =[
                'kodebarang'=>$row['detbrgkode'],
                'namabarang'=>$row['brgnama'],
                'hargajual'=>$row['dethargajual'],
                'hargabeli'=>$row['dethargamasuk'],
                'jumlah'=>$row['detjml']
            ];

           $json =[
              'sukses'=>$data 
            ];
            echo json_encode($json);
        }else{
            exit("maaf tidak bisa dipanggil");
        }
    }

    public function simpanDetail(){
        if($this->request->isAJAX()){
            $faktur = $this->request->getPost('faktur');
            $hargajual = $this->request->getPost('hargajual');
            $hargabeli = $this->request->getPost('hargabeli');
            $kdbarang = $this->request->getPost('kdbarang');
            $jumlah = $this->request->getPost('jumlah');
            
            $modelDetail = new Modeldetailbarangmasuk();
            $modelBarangMasuk = new Modelbarangmasuk();
 
            $modelDetail->insert([
             'detfaktur'=>$faktur,
             'detbrgkode'=>$kdbarang,
             'dethargamasuk'=>$hargabeli,
             'dethargajual'=>$hargajual,
             'detjml'=>$jumlah,
             'detsubtotal'=> intval($jumlah)* intval($hargabeli)
            ]);

            $ambilTotalHarga = $modelDetail->ambilTotalHarga($faktur);

            $modelBarangMasuk->update($faktur,[
                'totalharga'=>$ambilTotalHarga
            ]);
 
 
            $json = [
             'sukses'=> 'Item berhasil ditambahkan'
            ];
            echo json_encode($json);
         }else{
             exit("maaf tidak bisa dipanggil");
         }
    }

    public function updateItem() {
        if($this->request->isAJAX()){
            $iddetail = $this->request->getPost('iddetail');
            $faktur = $this->request->getPost('faktur');
            $hargajual = $this->request->getPost('hargajual');
            $hargabeli = $this->request->getPost('hargabeli');
            $kdbarang = $this->request->getPost('kdbarang');
            $jumlah = $this->request->getPost('jumlah');
            
            $modelDetail = new Modeldetailbarangmasuk();
            $modelBarangMasuk = new Modelbarangmasuk();
 
            $modelDetail->update($iddetail,[
             'dethargamasuk'=>$hargabeli,
             'dethargajual'=>$hargajual,
             'detjml'=>$jumlah,
             'detsubtotal'=> intval($jumlah)* intval($hargabeli)
            ]);
            $ambilTotalHarga = $modelDetail->ambilTotalHarga($faktur);

            $modelBarangMasuk->update($faktur,[
                'totalharga'=>$ambilTotalHarga
            ]);
 
 
 
            $json = [
             'sukses'=> 'Item berhasil diupdate'
            ];
            echo json_encode($json);
         }else{
             exit("maaf tidak bisa dipanggil");
         }
    }
}
