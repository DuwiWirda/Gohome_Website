<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PengunjungController extends Controller
{
    public function index()
    {
        $pengunjung = Pengunjung::all();
        return view('backend/layouts.pengunjung', compact(['pengunjung']));
    }

    public function add()
    {
        return view('backend/layouts.addpengunjung');
        return response()->json([
            'status' => 'ok',
            'message' => 'Data Pengunjung berhasil ditambahkan'
        ], 201);
    }

    public function edit($nik){
        $pengunjung = Pengunjung::findOrFail($nik);
        return view('backend/layouts.editpengunjung', compact(['pengunjung']));
    }

    public function save(Request $request)
    {
        $pengunjung = new Pengunjung;
        $pengunjung->nik = $request->nik;
        $pengunjung->nama_pengunjung = $request->nama_pengunjung;
        $pengunjung->email = $request->email;
        $pengunjung->password = Hash::make($request->password);
        $pengunjung->telepon = $request->telepon;
        $pengunjung->save();
        return redirect()->route('pengunjung.index')
        ->with('success','Data pengunjung berhasil disimpan');
    }
    
    public function update(Request $request){
        $pengunjung = Pengunjung::findOrFail($request->nik);
        $pengunjung->nik = $request->nik;
        $pengunjung->nama_pengunjung = $request->nama_pengunjung;
        $pengunjung->email = $request->email;
        $pengunjung->password = $request->password;
        $pengunjung->telepon = $request->telepon;
        $pengunjung->save();
        return redirect()->route('pengunjung.index');
    }

    public function destroy($nik){
        
    }
}
