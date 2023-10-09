<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelkategori;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->kategori = new Modelkategori();
    }
    public function index()
    {
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            session()->set('cari_kategori',$cari);
            redirect()->to('/kategori/index');
        }else{
            $cari = session() ->get('cari_kategori');
        }

        //var datakategori apakah carinya ada kalau ada cari data dengan method
        //yang ada di modelkategori 
        $dataKategori = $cari? $this->kategori->cariData($cari)->paginate(5,'kategori') :$this->kategori->paginate(5,'kategori');

        $nohalaman = $this->request->getVar('page_kategori')?$this->request->getVar('page_kategori'):1;
        $data = [
            // 'tampildata' => $this->kategori->findALl()
            'tampildata' => $dataKategori,
            'pager' => $this->kategori->pager,
            'nohalaman' => $nohalaman,
            'cari'=>$cari
        ];
        return view('kategori/viewkategori', $data);
    }

    public function formtambah(){
        return view('kategori/formtambah');
    }

    public function simpandata(){
        $namakategori = $this->request->getVar('namakategori');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'namakategori'=>[
                'rules'=>'required',
                'label'=> 'Nama Kategori',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        $errorNamaKategori = $validation->getError();

        if (!$valid) {
            session()->setFlashdata('errorNamaKategori', '<br><div class="alert alert-danger">' . $errorNamaKategori . '</div>');
            return redirect()->to('/kategori/formtambah');
        }else{
            $this->kategori->insert([
                'katnama'=>$namakategori
            ]);
            $pesan =[
                'sukses'=> '<div class="alert alert-success">Data kategori berhasil ditambahkan ... </div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/index');

        }
        
    }

    public function formedit($id){
        $rowdata = $this->kategori->find($id);

        if ($rowdata){
            $data =[
                'id' => $id,
                'nama'=> $rowdata['katnama']
            ];
            return view('kategori/formedit',$data);
        }else{
            exit('Data tidak ditemukan');
        }
    }

    public function updatedata() {
        $idkategori = $this->request->getVar('idkategori');
        $namakategori = $this->request->getVar('namakategori');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'namakategori'=>[
                'rules'=>'required',
                'label'=> 'Nama Kategori',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        $errorNamaKategori = $validation->getError();

        if (!$valid) {
            session()->setFlashdata('errorNamaKategori', '<br><div class="alert alert-danger">' . $errorNamaKategori . '</div>');
            return redirect()->to('/kategori/formedit/'. $idkategori);
        }else{
            $this->kategori->update($idkategori,[
                'katnama'=>$namakategori
            ]);
            $pesan =[
                'sukses'=> '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                Data kategori berhasil ditambahkan ...
              </div>'
                
                
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/index');

        }
    }

    public function hapus($id){
        $rowdata = $this->kategori->find($id);

        if ($rowdata){
            $this->kategori->delete($id);
            
            $pesan =[
                'sukses'=> '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                Data kategori berhasil dihapus s
              </div>'
                
                
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/index');
        }else{
            exit('Data tidak ditemukan');
        }
    }

}
