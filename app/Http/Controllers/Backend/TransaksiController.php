<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ApiModel\Kamar;
use App\Models\Pengunjung;
use App\Models\ApiModel\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
{
    $transaksi = Transaksi::with('pengunjung','kamar')->get();
    return view('backend/layouts.transaksi', compact('transaksi'));
}

public function add(){
    $pengunjung = Pengunjung::all();
    $kamar = Kamar::where('status_kamar','=','Tersedia')->get();
    return view('backend/layouts.addtransaksi', compact(['pengunjung', 'kamar']));
}

public function save(Request $request){
    $transaksi = new Transaksi();
    $kamar = Kamar::findOrFail($request->id_kamar);
    $transaksi->id_transaksi = $request->id_transaksi;
    $transaksi->tanggal_checkin = $request->tanggal_checkin;
    $transaksi->tanggal_checkout = $request->tanggal_checkout;
    $transaksi->status = $request->status;
    $transaksi->harga = $request->harga;
    $transaksi->total = $request->total;
    $transaksi->nik = $request->nik;
    $transaksi->id_kamar = $request->jenis_kamar;
    $kamar->status_kamar = 'Tidak Tersedia';
    $kamar->update();
    $transaksi->save();
    //Ubah status kamar jadi tidak tersedia sesuai dengan id_kamar
    return redirect()->route('transaksi.index');
}

public function update(Request $request){
    $transaksi = Transaksi::findOrFail($request->id);
    $transaksi->id_transkasi = $request->id_transaksi;
    $transaksi->tanggal = $request->tanggal;
    $transaksi->nik = $request->pengunjung;
    $transaksi->id_kamar = $request->kamar;
    $transaksi->tanggal_checkin = $request->tanggal_checkin;
    $transaksi->tanggal_checkout = $request->tanggal_checkout;
    $transaksi->status = $request->status;
    $transaksi->harga = $request->harga;
    $transaksi->total = $request->total;
    $transaksi->update();
    return redirect()->route('transaksi.index');
}
}


