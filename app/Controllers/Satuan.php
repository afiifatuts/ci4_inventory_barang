<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelsatuan;

class Satuan extends BaseController
{
    public function __construct()
    {
        $this->satuan = new Modelsatuan();
    }
    public function index()
    {
        $data = [
            'tampildata' => $this->satuan->findALl()
        ];
        return view('satuan/viewsatuan', $data);
    }

    public function formtambah(){
        return view('satuan/formtambah');
    }

    public function simpandata(){
        $namasatuan = $this->request->getVar('namasatuan');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'namasatuan'=>[
                'rules'=>'required',
                'label'=> 'Nama Satuan',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        $errorNamaSatuan = $validation->getError();

        if (!$valid) {
            session()->setFlashdata('errorNamaSatuan', '<br><div class="alert alert-danger">' . $errorNamaSatuan . '</div>');
            return redirect()->to('/satuan/formtambah');
        }else{
            $this->satuan->insert([
                'satnama'=>$namasatuan
            ]);
            $pesan =[
                'sukses'=> '<div class="alert alert-success">Data satuan berhasil ditambahkan ... </div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/index');

        }


       
    }
}
