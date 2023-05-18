<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ApiModel\Transaksi;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(){
        $transaksi = Laporan::with('pengunjung','kamar')->get();
    return view('backend/layouts.laporan', compact('transaksi'));
    }

public function filter(Request $request)
{
    $month = $request->input('month'); // Mengambil inputan bulan dari form filter
    // Mengambil data transaksi berdasarkan bulan
    $transaksi = Transaksi::whereMonth('tanggal_checkin', Carbon::parse($month)->month)->get();
    return view('backend/layouts.laporan', compact('transaksi'));
}
}
