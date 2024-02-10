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
        // $validator = Validator::make($request->all(), [
        //     'foto' => 'required',
        //     'ktp' => 'required',
        //     'bpjs' => 'required',
        //     'vaksin' => 'required',
        //     'file_pdf' => 'required',
        //     'file_excel' => 'required',
        // ]);

        $pegawai->foto = $this->uploadFile('foto', 'fileFoto', $request);
        $pegawai->ktp = $this->uploadFile('ktp', 'fileKTP', $request);
        $pegawai->bpjs = $this->uploadFile('bpjs', 'fileBPJS', $request);
        $pegawai->vaksin = $this->uploadFile('vaksin', 'fileVaksin', $request);

        // Jika validasi gagal, kembalikan pesan kesalahan
        // if ($validator->fails()) {
        //     return response()->json([
        //         'error' => $validator->errors()
        //     ], 422);
        // }

        // Simpan perubahan pada data pengguna
        $pegawai->save();

        // Upload file pdf dan excel
        $filePdf = $request->file('file_pdf');
        $fileExcel = $request->file('file_excel');

        // Simpan file pdf
        $tujuanUploadPdf = 'filePdf/';
        $finalNamePdf = date('ymdhis') . "-" . $filePdf->getClientOriginalName();
        $filePdf->storeAs($tujuanUploadPdf, $finalNamePdf, 'public');

        // Simpan file excel
        $tujuanUploadExcel = 'fileExcel/';
        $finalNameExcel = date('ymdhis') . "-" . $fileExcel->getClientOriginalName();
        $fileExcel->storeAs($tujuanUploadExcel, $finalNameExcel, 'public');

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
    function uploadFile($namaFile, $folderTujuan, Request $request)
    {

        if ($request->hasFile($namaFile)) {
            $file = $request->file($namaFile);
            $randNum = rand(000, 999);
            $oriName = $file->getClientOriginalName();
            $name = $randNum . $oriName;

            $tujuanUpload = $folderTujuan;

            // $hasil = $file->storeAs($tujuanUpload,$name);

            $file->storeAs($tujuanUpload, $name, 'public');
            // $hasil = Storage::putFileAs($tujuanUpload, $file, $name);
            // return $hasil;
            return $name;
        }

        return false;
    }
}
