<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berkas as ModelsBerkas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BerkasController extends Controller
{
    public function formBerkas(){
        return view('berkas.upload');
    }

    public function DetailBerkas(){
        
        $databerkas= ModelsBerkas::all();
        $data =[
            'data'=>$databerkas,
            'page'=> "Berkas"
        ];

        return view('berkas.index',$data);
        
    }

    public function create(Request $request, ModelsBerkas $berkas)
    {
        $validator = Validator::make($request->all(), [

            'file_pdf' => 'required',
            'file_excel' => 'required',
        ]);

        
        if($validator->failed()) {
            return response()->json([
                'error' => $validator->errors()
            ],422);
        }

        $file = $request->file('file_pdf');
        $tujuanUplode = 'filePdf/';
        $nama_file = $file->getClientOriginalName();
        $finalName =date('ymdhis')."-".$nama_file;
        $request->file('file_pdf')->storeAs($tujuanUplode,$finalName,'public');

        $file = $request->file('file_excel');
        $tujuanUplode = 'fileExcel/';
        $nama_file = $file->getClientOriginalName();
        $finalName2 =date('ymdhis')."-".$nama_file;
        $request->file('file_excel')->storeAs($tujuanUplode,$finalName2,'public');

        $berkas->create([
            
            'file_pdf' => $finalName,
            'file_excel'=>$finalName2,
            'added_by' => Auth::id(),
        
        ]);


        if($berkas){
            return redirect('/berkas')->withSuccess('File berhasil ditambahkan!');
        }else {
            return redirect()->back()->withErrors('Gagal tambah file!, terjadi kesalahan');
        }
    }
}
