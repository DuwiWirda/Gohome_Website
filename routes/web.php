<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardadminController;
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
Route::post('/login', 'AuthController@login_process')->name('auth.login_process');
Route::middleware(['web'])->group(function () {
    Route::post('/login', 'AuthController@login_process')->name('auth.login_process');
});



// routes/web.php

// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('/login', 'Auth\LoginController@login');
// Route::get('/home', [DashboardadminController::class, 'index']);

// Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
// Route::post('/login', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('authenticate');
// Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
// });
// Route::middleware(['auth', 'superadmin'])->group(function () {
//     Route::get('/superadmin/dashboard', [\App\Http\Controllers\SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
// });