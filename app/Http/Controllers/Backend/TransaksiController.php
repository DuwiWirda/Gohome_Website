<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ApiModel\Kamar;
use App\Models\Pengunjung;
use App\Models\Transaksi;
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
    $kamar = Kamar::all();

    return view('backend/layouts.addtransaksi', compact(['pengunjung', 'kamar']));
}

public function save(Request $request){
    $transaksi = new Transaksi();

    if($request->file('bukti_tf')){
        $validatedData = $request->validate([
            'bukti_tf' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $foto = $request->file('bukti_tf')->getClientOriginalName();
        $path = $request->file('bukti_tf')->move('images/resi/' , $foto);
        $transaksi->bukti_tf = $foto;
    }
    $transaksi->id_transkasi = $request->id_transaksi;
    $transaksi->tanggal = $request->tanggal;
    $transaksi->nik = $request->pengunjung;
    $transaksi->id_kamar = $request->kamar;
    $transaksi->tgl_checkin = $request->tgl_checkin;
    $transaksi->tgl_checkout = $request->tgl_checkout;
    $transaksi->status = $request->status;
    $transaksi->harga = $request->harga;
    $transaksi->total = $request->total;
    $transaksi->save();

    return redirect()->route('transaksi.index');
}

// public function edit($id){
//     $transaksi = Transaksi::findOrFail($id);
//     $pengunjung = Pengunjung::all();
//     $kamar = Kamar::all();

//     return view('backend/layouts.edittransaksi', compact(['transaksi', 'pengunjung', 'kamar']));
// }

public function update(Request $request){
    $transaksi = Transaksi::findOrFail($request->id);

    if($request->file('bukti_tf')){
        $validatedData = $request->validate([
            'bukti_tf' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $foto = $request->file('bukti')->getClientOriginalName();
        $path = $request->file('bukti')->move('images/resi/' , $foto);
        $transaksi->bukti = $foto;
    }

    $transaksi->id_transkasi = $request->id_transaksi;
    $transaksi->tanggal = $request->tanggal;
    $transaksi->nik = $request->pengunjung;
    $transaksi->id_kamar = $request->kamar;
    $transaksi->tgl_checkin = $request->tgl_checkin;
    $transaksi->tgl_checkout = $request->tgl_checkout;
    $transaksi->status = $request->status;
    $transaksi->harga = $request->harga;
    $transaksi->total = $request->total;

    $transaksi->save();

    return redirect()->route('transaksi.index');
}
}


