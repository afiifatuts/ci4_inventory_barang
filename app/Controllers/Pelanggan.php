<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPelanggan;

class Pelanggan extends BaseController
{
    public function formtambah()
    {
        $json = [
            'data' =>view('pelanggan/modaltambah')
        ] ;

        echo json_encode($json);
    }

    public function simpan()  {
        $namapelanggan = $this->request->getPost('namapel');
        $telp = $this->request->getPost('telp');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'namapel'=>[
                'rules'=>'required',
                'label'=>'Nama Pelanggan',
                'errors'=>[
                    'required'=>'{field} tidak boleh kosong'
                ]
                ],
                'telp'=>[
                    'rules'=>'required|is_unique[pelanggan.peltelp]',
                    'label'=>'No. Telp/HP',
                    'errors'=>[
                        'required'=>'{field} tidak boleh kosong',
                        'is_unique'=>'{field} tidak boleh ada yang sama'
                    ]
                    ]
                ]);

                if(!$valid){
                    $json =[
                        'error'=>[
                            'errNamaPelanggan'=>$validation->getError('namapel'),
                            'errTelp'=>$validation->getError('telp'),
                        ]
                        ];
                }else{
                    $modelPelanggan = new ModelPelanggan();
                    
                    $modelPelanggan->insert([
                        'pelnama'=>$namapelanggan,
                        'peltelp'=>$telp
                    ]);

                    $rowData = $modelPelanggan->ambilDataTerakhir()->getRowArray();

                    $json =[
                        'sukses'=> 'Data Pelanggan berhasil disimpan, ambil data terakhir?',
                        'namapelanggan'=> $rowData['pelnama'],
                        'idpelanggan'=> $rowData['pelid']
                    ];
                }

                echo json_encode($json);
    }
}
