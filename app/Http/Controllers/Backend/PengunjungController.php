<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengunjungController extends Controller
{
    public function index()
    {
        $pengunjung = DB::table('pengunjung')->get();
        return view('backend/layouts.pengunjung', ['pengunjung' => $pengunjung]);
    }
    public function add()
    {
        $pengunjung = Pengunjung::all();
        return view('backend/layouts.addpengunjung',compact('pengunjung'));
    }
    public function save(Request $request)
    {
        $pengunjung = new Pengunjung;

        $pengunjung->nik = $request->nik;
        $pengunjung->nama_pengunjung = $request->nama_pengunjung;
        $pengunjung->email = $request->email;
        $pengunjung->password = $request->password;
        $pengunjung->telepon = $request->telepon;

        $pengunjung->save();
        // DB::table('pengunjung')->insert([
        //     'nik' => $request->nik,
        //     'nama_pengunjung' => $request->nomorkamar,
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'telepon' => $request->telepon,
        // ]);
        return redirect()->route('pengunjung.index')
        ->with('success','Data pengunjung berhasil disimpan');
    }
}
