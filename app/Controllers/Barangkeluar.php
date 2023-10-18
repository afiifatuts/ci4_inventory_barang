<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelbarang;
use App\Models\ModelBarangKeluar;
use App\Models\ModelDataBarang;
use App\Models\ModelDetailBarangKeluar;
use App\Models\ModelTempBarangKeluar;
use Config\Services;

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

            // cek dulu apakah stoknya tersedia 
            $modelBarang = new Modelbarang();
            $ambilDataBarang = $modelBarang->find($kodebarang);
            //ambil stoknya
            $stokBarang = $ambilDataBarang['brgstok'];

            if($jml>intval($stokBarang)){
                $json =[
                    'error'=>'Stok tidak mencukupi...'
                ];
            }else{
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
            }

            

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

    public function modalCariBarang()  {
        if($this->request->isAJAX()){
            $json=[
                'data' => view('barangkeluar/modalcaribarang')
            ];
            echo json_encode($json);
        }
    }

    public function listDataBarang() 
    {
        $request = Services::request();
        $datamodel = new ModelDataBarang($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $tombolPilih = "<button type=\"button\" class=\"btn btn-sm btn-info\" onclick=\"pilih('".$list->brgkode."')\"> Pilih
                </button>";

              

                $row[] = $no;
                $row[] = $list->brgkode;
                $row[] = $list->brgnama;
                $row[] = number_format($list->brgharga,0,",",".");
                $row[] = number_format($list->brgstok,0,",",".");
                $row[] = $tombolPilih;
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }

    public function modalPembayaran()
    {
        $nofaktur = $this->request->getPost('nofaktur');
        $tglfaktur = $this->request->getPost('tglfaktur');
        $idpelanggan = $this->request->getPost('idpelanggan');
        $totalharga = $this->request->getPost('totalharga');
    
        $modelTemp = new ModelTempBarangKeluar();
        $cekdata = $modelTemp->tampilDataTemp($nofaktur);
    
        
    
        if ($cekdata->getNumRows() > 0) {
            // Proses data jika item ada
            $data =[
                'nofaktur'=>$nofaktur,
                'totalharga'=>$totalharga,
                'tglfaktur'=>$tglfaktur,
                'idpelanggan'=>$idpelanggan,
            ];

            $json =[
                'data'=> view('barangkeluar/modalpembayaran', $data)
            ];
           
        } else {
            $json = [
                'error' => 'Maaf item belum ada'
                // tambahkan data lainnya yang diperlukan di sini
            ];
        }
    
        echo json_encode($json);
    }


    public function simpanPembayaran()  {
        if($this->request->isAJAX()){
            $nofaktur = $this->request->getPost('nofaktur');
            $tglfaktur = $this->request->getPost('tglfaktur');
            $idpelanggan = $this->request->getPost('idpelanggan');
            $totalbayar = $this->request->getPost('totalbayar');
            $jumlahuang = $this->request->getPost('jumlahuang');
            $sisauang = $this->request->getPost('sisauang');


            $modelBarangKeluar = new ModelBarangKeluar();

            //Simpan ke table barang keluar
            $modelBarangKeluar->insert([
                'faktur' => $nofaktur,
                'tglfaktur' => $tglfaktur,
                'idpel' => $idpelanggan,
                'totalharga' => $totalbayar,
                'jumlahuang' => $jumlahuang,
                'sisauang' => $sisauang,
            ]);

            $modelTemp = new ModelTempBarangKeluar();
            $dataTemp = $modelTemp->getWhere(['detfaktur'=>$nofaktur]);

            $fieldDetail =[];

            foreach($dataTemp->getResultArray() as $row){
                $fieldDetail[]=[
                    'detfaktur'=>$row['detfaktur'],
                    'detbrgkode'=>$row['detbrgkode'],
                    'dethargajual'=>$row['dethargajual'],
                    'detjml'=>$row['detjml'],
                    'detsubtotal'=>$row['detsubtotal'],
                ];
            }

            $modelDetail = new ModelDetailBarangKeluar();
            $modelDetail->insertBatch($fieldDetail);

            //Hapus Temp Detail barang keluar
            $modelTemp->hapusData($nofaktur);

            $json = [
                'sukses'=>'Transaksi berhasil disimpan',
                'cetakfaktur'=>site_url('barangkeluar/cetakfaktur'.$nofaktur)
            ];

            echo json_encode($json);
        }
    }
    


}
