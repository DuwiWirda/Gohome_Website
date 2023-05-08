<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengunjungController extends Controller
{
    public function index()
    {
        $pengunjung = DB::table('pengunjung')->get();
        return view('backend/layouts.pengunjung', ['pengunjung' => $pengunjung]);
    }
    public function create()
    {
        $pengunjung = null;
        return view('backend/layouts.pengunjung.create',compact('pengunjung'));
    }
    public function store(Request $request)
    {
        DB::table('pengunjung')->insert([
            'nik' => $request->nik,
            'nama_pengunjung' => $request->nomorkamar,
            'email' => $request->email,
            'password' => $request->password,
            'telepon' => $request->telepon,
        ]);
        return redirect()->route('pengunjung.index')
        ->with('success','Data pengunjung berhasil disimpan');
    }
}
