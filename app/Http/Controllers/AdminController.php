<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;
use App\Model\Pekerjaan;
use Illuminate\Support\Facades\Storage;
use App\Models\Berkas as ModelsBerkas;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        return view('admin');
    }

    public function operator(){
        return view('admin');
    }

    public function pegawai(){
        return view('pegawai.index');
    }
    public function formBerkas(){
        return view('berkas.upload');
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
            var_dump($berkas);
            return redirect('/berkas')->withSuccess('File berhasil ditambahkan!');
        }else {
            return redirect()->back()->withErrors('Gagal tambah file!, terjadi kesalahan');
        }
    }

    
}