<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pegawai;

class PegawaiController extends Controller
{
    
    public function datapegawai(){
        // $databerkas= Pegawai::all();
        //    $data =[
        //     'data'=>$databerkas,
        //     'page'=> "Berkas"
        //  ];
           return view('pegawai.index');
    }
    // public function DetailBerkas(ModelsBerkas $berkas){
    //     $databerkas= ModelsBerkas::all();
    //     $data =[
    //         'data'=>$databerkas,
    //         'page'=> "Berkas"
    //     ];
    //     return view('berkas.index',$data);
        
    // }
}
