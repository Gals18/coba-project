<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;
use App\Model\Pekerjaan;
use Illuminate\Support\Facades\Storage;
use App\Models\Berkas as ModelsBerkas;
use App\Models\Pengguna as Modelspegawai;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function operator()
    {
        return view('admin');
    }

    public function pegawai()
    {
        return view('pegawai.index');
    }
    public function formBerkas()
    {
        return view('berkas.upload');
    }

    public function create(Request $request, ModelsBerkas $berkas)
    {
        // Ambil data pengguna berdasarkan ID yang diberikan
        $pegawai = Pengguna::findOrFail(session('id'));

        // Validasi input
         $validator = Validator::make($request->all(), [
             'foto' => 'required',
             'ktp' => 'required',
             'bpjs' => 'required',
             'vaksin' => 'required',
            //  'file_pdf' => 'required',
            //  'file_excel' => 'required',
         ]);

        $pegawai->foto = $this->updatePegawaiFile('foto', $pegawai->foto, 'fileFoto', $request);
        $pegawai->ktp = $this->updatePegawaiFile('ktp',$pegawai->ktp, 'fileKTP', $request);
        $pegawai->bpjs = $this->updatePegawaiFile('bpjs',$pegawai->bpjs, 'fileBPJS', $request);
        $pegawai->vaksin = $this->updatePegawaiFile('vaksin',$pegawai->vaksin, 'fileVaksin', $request);

        // Jika validasi gagal, kembalikan pesan kesalahan
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        // Simpan perubahan pada data pengguna
        $pegawai->save();

        // Upload file pdf dan excel
        $filePdf = $request->file('file_pdf');
        $fileExcel = $request->file('file_excel');

        // Simpan file pdf
        // $tujuanUploadPdf = 'filePdf/';
        // $finalNamePdf = date('ymdhis') . "-" . $filePdf->getClientOriginalName();
        // $filePdf->storeAs($tujuanUploadPdf, $finalNamePdf, 'public');
        $finalNamePdf = $this->uploadBerkas('filePdf/', $filePdf);

        // // Simpan file excel
        // $tujuanUploadExcel = 'fileExcel/';
        // $finalNameExcel = date('ymdhis') . "-" . $fileExcel->getClientOriginalName();
        // $fileExcel->storeAs($tujuanUploadExcel, $finalNameExcel, 'public');
        $finalNameExcel = $this->uploadBerkas('fileExcel/', $fileExcel);

        // Simpan data berkas ke dalam tabel Berkas
        $berkas->create([
            'file_pdf' => $finalNamePdf,
            'file_excel' => $finalNameExcel,
            'added_by' => Auth::id(), // Jika menggunakan auth, pastikan sudah mengimport facade Auth
        ]);

        // Redirect dengan pesan sukses jika berhasil, jika gagal kembali ke halaman sebelumnya dengan pesan error
        if ($berkas && $pegawai) {
            return redirect('/admin/Berkas')->withSuccess('File berhasil ditambahkan!');
        } else {
            return redirect()->back()->withErrors('Gagal tambah file!, terjadi kesalahan');
        }
    }

    // namainput, nama folder
    function updatePegawaiFile($namaFile, $namaFileLama ,$folderTujuan, Request $request)
    {
        if ($request->hasFile($namaFile)) {
            // cek apakah namafile lama ada di folder storage, kalo ada hapus file lamanya
            // ./storage/blablabla.pdf
            if (file_exists('.'.Storage::url($folderTujuan . $namaFileLama))) {
                unlink('.'.Storage::url($folderTujuan . $namaFileLama));
            }



            //lakukan upload gambar yang baru
            $file = $request->file($namaFile);
            $randNum = rand(000, 999);
            $oriName = $file->getClientOriginalName();
            $name = $randNum . $oriName;
            $oldFileName = session($namaFile);
    
            $tujuanUpload = $folderTujuan;
    
            // Hapus file lama jika ada dan nama file lama tersedia
            if ($oldFileName && Storage::exists($tujuanUpload . '/' . $oldFileName)) {
                Storage::delete($tujuanUpload . '/' . $oldFileName);
            }
            
            $file->storeAs($tujuanUpload, $name, 'public');
    
            return $name;
        }
    
        return false;
    }

    // harusnya disini ada function upload Berkas
    // ----
    function uploadBerkas($tujuanUpload, $request) {
        $tujuan = $tujuanUpload;
        $oriName = explode('.', $request->getClientOriginalName())[0];

        $finalName = date('ymdhis') . "-" . Str::slug($oriName). '.' . $request->getClientOriginalExtension();
        $request->storeAs($tujuan, $finalName, 'public');

        return $finalName;
    }
//coba kmu 
    
    
}
