<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KamarController;
use App\Http\Controllers\Backend\LaporanController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\PengunjungController;
use App\Http\Controllers\Backend\PetugasController;
use App\Http\Controllers\Backend\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [LoginController::class, 'index']);
// Route::post('/login', 'AuthController@login_process')->name('auth.login_process');
// Route::middleware(['web'])->group(function () {
//     Route::post('/login', 'AuthController@login_process')->name('auth.login_process');
// });

//Route Dashboard
    Route::get('/home', [DashboardController::class, 'index']);

//Route Kamar
    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
    Route::get('/addkamar', [KamarController::class, 'add'])->name('kamar.add');
    Route::get('/editkamar/{id_kamar}', [KamarController::class, 'edit'])->name('kamar.edit');
    Route::post('/updatekamar', [KamarController::class, 'update'])->name('kamar.update');
    Route::post('/savekamar', [KamarController::class, 'save'])->name('kamar.save');
   

//Rote Pengunjung
    Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung.index');
    Route::get('/addpengunjung', [PengunjungController::class, 'add'])->name('pengunjung.add');
    Route::get('/editpengunjung/{nik}', [PengunjungController::class, 'edit'])->name('pengunjung.edit');
    Route::post('/savepengunjung', [PengunjungController::class, 'save'])->name('pengunjung.save');
    Route::post('/updatepengunjung', [PengunjungController::class, 'update'])->name('pengunjung.update');

//Route Petugas
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
    Route::get('/addpetugas', [PetugasController::class, 'add'])->name('petugas.add');
    Route::get('/editpetugas/{id_akun}', [PetugasController::class, 'edit'])->name('petugas.edit');
    Route::post('/savepetugas', [PetugasController::class, 'save'])->name('petugas.save');
    Route::post('/updatepetugas', [PetugasController::class, 'update'])->name('petugas.update');

//Route Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/addtransaksi', [TransaksiController::class, 'add'])->name('transaksi.add');
    Route::post('/updatetransaksi', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::post('/savetransaksi', [TransaksiController::class, 'save'])->name('transaksi.save');

//Route Laporan
    Route::get('/laporan', [LaporanController::class, 'index']);