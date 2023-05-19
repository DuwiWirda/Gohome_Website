<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KamarController;
use App\Http\Controllers\Backend\LaporanController;
use App\Http\Controllers\Backend\PengunjungController;
use App\Http\Controllers\Backend\PetugasController;
use App\Http\Controllers\Backend\TransaksiController;
use App\Http\Controllers\Backend\ExportController;
use App\Models\Pengunjung;
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


// Route::get('/', [LoginController::class, 'index']);
// Route::post('/login', 'AuthController@login_process')->name('auth.login_process');
// Route::middleware(['web'])->group(function () {
//     Route::post('/login', 'AuthController@login_process')->name('auth.login_process');
// });

// Auth::routes();

// Route::get('/', fn () => redirect()->route('login')compo);

Route::get('/',[AuthController::class,'index'])->name('login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::post('login_process',[AuthController::class,'login_process'])->name('login_process');
Route::get('/unauthorized', function () {
    return view('auth.403');
})->name('unauthorized');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:super'])->group(function () {
        //Route Petugas
        Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
        Route::get('/addpetugas', [PetugasController::class, 'add'])->name('petugas.add');
        Route::get('/editpetugas/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
        Route::post('/savepetugas', [PetugasController::class, 'save'])->name('petugas.save');
        Route::post('/updatepetugas', [PetugasController::class, 'update'])->name('petugas.update');
        Route::delete('/petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
        Route::get('/searchpetugas', [PetugasController::class, 'search'])->name('petugas.search');
        Route::get('/refreshpetugas', [PetugasController::class, 'refresh'])->name('petugas.refresh');

    });

//Route Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Route Kamar
    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
    Route::get('/addkamar', [KamarController::class, 'add'])->name('kamar.add');
    Route::get('/editkamar/{id_kamar}', [KamarController::class, 'edit'])->name('kamar.edit');
    Route::post('/updatekamar', [KamarController::class, 'update'])->name('kamar.update');
    Route::post('/savekamar', [KamarController::class, 'save'])->name('kamar.save');
    Route::delete('/kamar/{id_kamar}', [KamarController::class, 'destroy'])->name('kamar.destroy');
    Route::get('/searchkamar', [KamarController::class, 'search'])->name('kamar.search');
    Route::get('/refreshkamar', [KamarController::class, 'refresh'])->name('kamar.refresh');

//Rote Pengunjung
    Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung.index');
    Route::get('/addpengunjung', [PengunjungController::class, 'add'])->name('pengunjung.add');
    Route::get('/editpengunjung/{nik}', [PengunjungController::class, 'edit'])->name('pengunjung.edit');
    Route::post('/savepengunjung', [PengunjungController::class, 'save'])->name('pengunjung.save');
    Route::post('/updatepengunjung', [PengunjungController::class, 'update'])->name('pengunjung.update');
    Route::delete('/pengunjung/{nik}', [PengunjungController::class, 'destroy'])->name('pengunjung.destroy');
    Route::get('/searchpengunjung', [PengunjungController::class, 'search'])->name('pengunjung.search');
    Route::get('/refreshpengunjung', [PengunjungController::class, 'refresh'])->name('pengunjung.refresh');

//Route Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/addtransaksi', [TransaksiController::class, 'add'])->name('transaksi.add');
    Route::post('/updatetransaksi', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::post('/savetransaksi', [TransaksiController::class, 'save'])->name('transaksi.save');
    Route::get('/searchtransaksi', [TransaksiController::class, 'search'])->name('transaksi.search');
    Route::get('/refreshtransaksi', [TransaksiController::class, 'refresh'])->name('transaksi.refresh');


//Route Laporan
    Route::get('/laporan', [LaporanController::class, 'index']);
    Route::post('/filterlaporan', [LaporanController::class, 'filter'])->name('laporan.filter');
    Route::get('/export-transaksi', [ExportController::class, 'exportTransaksi'])->name('export.transaksi');
});
