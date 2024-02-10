<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PegawaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

   
    Route::middleware(['guest'])->group(function () {
        Route::get('/', [SesiController::class, 'index'])->name('login');
        Route::post('/aksi-login', [SesiController::class, 'aksilogin']);
    });

Route::get('/home', function () {
    return redirect('/admin');
});

Route::group(['middleware'=>'cekLogin'], function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/operator', [AdminController::class, 'operator']);
    Route::get('/admin/pegawai', [PegawaiController::class, 'datapegawai']);

    //router untuk akses berkas
    Route::get('/admin/Berkas', [BerkasController::class, 'DetailBerkas']);

    // Route::get('/file-excel', function () {
    //     $pathToFile = Storage::disk('public')->path('fileExcel/' . $d->file_excel);
    //     $headers = [
    //         'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    //     ];
    //     return response()->file($pathToFile, $headers);
    // });

    // Route::get('/file-excel/{file}', function ($file) {
    //     $pathToFile = Storage::disk('public')->path('fileExcel/' . $file);
    //     return response()->file($pathToFile);
    // });


    Route::get('/admin/upload_berkas', [BerkasController::class, 'formBerkas']);
    Route::post('/berkas/create', [AdminController::class, 'create']);
    Route::get('/berkas/detail/{id}', [ExcelController::class, 'show']);

    Route::post('/admin/pegawai/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/logout', [SesiController::class, 'logout']);
});
