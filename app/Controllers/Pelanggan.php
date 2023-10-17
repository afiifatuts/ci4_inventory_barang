<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDataPelanggan;
use App\Models\ModelPelanggan;
use Config\Services;

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

    public function modalData(){
        if($this->request->isAJAX()){
            $json=[
                'data'=> view('pelanggan/modeldata')
            ];
            echo json_encode($json);
        }
    }

    public function listdata()
    {
        $request = Services::request();
        $datamodel = new ModelDataPelanggan($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->pelnama;
                $row[] = $list->peltelp;
                $row[] = '';
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
}
