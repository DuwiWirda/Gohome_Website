<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ApiModel\Kamar;
use App\Models\Pengunjung;
use App\Models\ApiModel\Transaksi;
use Carbon\Carbon;
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
        $transaksi->id_transaksi = $request->id_transaksi;
        $transaksi->tanggal_checkin = $request->tanggal_checkin;
        $transaksi->tanggal_checkout = $request->tanggal_checkout;
        $transaksi->status = $request->status;
        $transaksi->total = $request->total;
        $nik = $request->nik;
        $pengunjung = Pengunjung::where('nik', $nik)->first();
        if ($pengunjung) {
            $transaksi->nik = $pengunjung->nik;
        }
        $transaksi->id_kamar = $request->kamar;
        $transaksi->save();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil Disimpan');
    }

    public function edit($id_transaksi){
        $transaksi = Transaksi::findOrFail($id_transaksi); //edit berhasil
        return view('backend.layouts.edittransaksi', compact(['transaksi']));
    }

    public function update(Request $request){
        $transaksi = Transaksi::findOrFail($request->id_transaksi);
        $transaksi->update([
            'status' => $request->status
        ]);
        if($transaksi){
            return redirect()->route('transaksi.index')->with('success', 'Status Berhasil Diubah');
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword'); // Mengambil inputan keyword dari form pencarian
        // Lakukan pencarian berdasarkan keyword
        $transaksi = Transaksi::where('status', 'LIKE', '%' . $keyword . '%')->get();
        return view('backend/layouts.transaksi', compact(['transaksi']));
    }

    public function refresh()
    {
        // Mengambil data pengunjung tanpa melakukan pencarian atau filter
        $transaksi = Transaksi::all();
        return view('backend/layouts.transaksi', compact(['transaksi']));
    }

    public function total($id_kamar, Request $request)
    {
        $checkin = Carbon::parse($request->get('tanggal_checkin'));
        $checkout = Carbon::parse($request->get('tanggal_checkout'));

        $count = $checkin->diffInDays($checkout) == 0 ? 1 : $checkin->diffInDays($checkout);
        $kamar = Kamar::find($id_kamar);

        $array = array(
            'total' => $kamar->harga * $count
        );

        return response()->json($array);
    }

}


