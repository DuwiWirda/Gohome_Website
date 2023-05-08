<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        $transaksi = Laporan::with('pengunjung','kamar')->get();
    return view('backend/layouts.laporan', compact('transaksi'));
    }
}
