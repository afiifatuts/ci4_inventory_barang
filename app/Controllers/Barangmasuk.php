<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeltempbarangmasuk;


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
}
