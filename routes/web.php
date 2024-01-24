<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
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
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/operator', [AdminController::class, 'operator'])->middleware('userAkses:operator');
    Route::get('/admin/pegawai', [PegawaiController::class, 'datapegawai'])->middleware('userAkses:pegawai');

    //router untuk akses berkas
    Route::get('/admin/Berkas', [BerkasController::class, 'DetailBerkas'])->middleware('userAkses:pegawai');
    Route::get('/admin/upload_berkas', [BerkasController::class, 'formBerkas'])->middleware('userAkses:pegawai');
    Route::post('/berkas/create', [AdminController::class, 'create']);
    Route::get('/berkas/detail/{id}', [ExcelController::class, 'show']);

    Route::post('/admin/pegawai/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/logout', [SesiController::class, 'logout']);
});