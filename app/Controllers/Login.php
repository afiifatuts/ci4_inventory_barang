<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

class Login extends BaseController
{
    public function index()
    {
        return view('login/index');
    }

    //cekuser ketika login
    public function cekUser()
    {
        $iduser = $this->request->getPost('iduser');
        $pass = $this->request->getPost('pass');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'iduser' => [
                'label' => 'ID User',
                'rules' => 'required',
                'errors' => [
                    'required'=>'{field} tidak boleh kosong'
                ]
                ], 'pass' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'{field} tidak boleh kosong'
                    ]
                    ],
            ]);

            if(!$valid){
                // cek apakah formnya sudah terisi
                $sessError =[
                    'errIdUser'=>$validation->getError('iduser'),
                    'errPassword'=>$validation->getError('pass'),
                ];

                session()->setFlashdata($sessError);
                return redirect()->to(site_url('login/index'));
            }else{
                $modelLogin = new ModelLogin();
                $cekUserLogin = $modelLogin->find($iduser);
                
                //cek apakah user idnya sudah terdaftar
                if($cekUserLogin==null){
                    $sessError =[
                        'errIdUser'=>'Maaf user tidak terdaftar',
                    ];
    
                    session()->setFlashdata($sessError);
                    return redirect()->to(site_url('login/index'));
                }else{
                    //cek apakah passwordnya benar(Terenkripsi)
                    $passwordUser = $cekUserLogin['userpassword'];

                    if(password_verify($pass,$passwordUser)){
                        //lanjutkan
                        $idlevel= $cekUserLogin['userlevelid'];

                        //ini adalah sebuah key yang menyimpan id, nama, level ketika user telah login
                        //yang akan disimpan ke dalam session
                        $simpan_session = [
                            'iduser'=>$iduser,
                            'namauser'=>$cekUserLogin['username'],
                            'idlevel'=>$idlevel
                        ];

                        //simpan ke dalam session 
                        session()->set($simpan_session);
                        return redirect()->to('/main');
                    }else{
                        $sessError =[
                            'errPassword'=>'Password anda salah',
                        ];
        
                        session()->setFlashdata($sessError);
                        return redirect()->to(site_url('login/index'));
                    }
                }
            }
    }

    // Logout 
    public function keluar(){
        session()->destroy();
        return redirect()->to('/login/index');
    }


}
