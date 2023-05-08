<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
{
    $transaksi = Transaksi::with('pengunjung','kamar')->get();
    return view('backend/layouts.transaksi', compact('transaksi'));
}
}

