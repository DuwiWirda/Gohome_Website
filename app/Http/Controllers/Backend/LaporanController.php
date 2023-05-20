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
        $laporan = Laporan::with('pengunjung','kamar')->get();
    return view('backend/layouts.laporan', compact('laporan'));
    }
// public function filter(Request $request)
// {
//     $month = $request->input('month'); // Mengambil inputan bulan dari form filter
//     // Mengambil data transaksi berdasarkan bulan
//     $transaksi = Transaksi::whereMonth('tanggal_checkin', Carbon::parse($month)->month)->get();
//     return view('backend/layouts.laporan', compact('transaksi'));
// }

public function viewHasil($dataTransaksi)
{
    return view('backend/layouts.laporan', compact('laporan'));
}


    public function filterData(Request $request)
    {
        $bulan = $request->input('bulan'); // Ambil nilai bulan dari form
        $laporan = Laporan::with('pengunjung', 'kamar')
            ->whereMonth('tanggal_checkin', $bulan)
            ->get();
        return view('backend/layouts.laporan', compact('laporan'));
    }
    public function refresh()
            {
                // Mengambil data pengunjung tanpa melakukan pencarian atau filter
                $laporan = Laporan::all();
                return view('backend/layouts.laporan', compact(['laporan']));
            }
}


