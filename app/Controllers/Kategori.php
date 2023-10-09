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
        $data = [
            'tampildata' => $this->kategori->findALl()
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


        // if(!$valid){
        //     $pesan =[
        //         'errorNamaKategori'=>'<div class="alert alert-danger">'. $validation->getError() .'</div>'
        //     ];

        //     session()->setFlashdata('errorNamaKategori', $validation->getError());
        //     return redirect()->to('/kategori/formtambah');
        // }
    }
}
