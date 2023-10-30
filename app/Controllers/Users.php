<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use \Hermawan\DataTables\DataTable;


class Users extends BaseController
{
    public function index()
    {
        return view('users/index');
    }

    public function listData(){
        
    $db = \Config\Database::connect();
    $builder = $db->table('users')->select('userid, usernama, levelnama, useraktif') ->join('levels', 'levelid = userlevelid');
    
    return DataTable::of($builder)
    ->addNumbering('nomor')
    ->add('status', function($row){
        return '';
    })
    ->add('aksi', function($row){
        return '';
    })
    ->toJson(true);
    }
}
