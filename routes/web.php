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
Route::get('/home', [DashboardController::class, 'index']);
Route::get('/kamar', [KamarController::class, 'index']);
Route::get('/pengunjung', [PengunjungController::class, 'index']);
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/petugas', [PetugasController::class, 'index']);
Route::get('/laporan', [LaporanController::class, 'index']);