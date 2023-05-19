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
        $request->validate([
            'nik' => 'required',
            'nama_pengunjung' => 'required',
            'email' => 'required',
            'password' => 'required',
            'telepon' => 'required',
        ]);
        $pengunjung = new Pengunjung;
        $pengunjung->nik = $request->nik;
        $pengunjung->nama_pengunjung = $request->nama_pengunjung;
        $pengunjung->email = $request->email;
        $pengunjung->password = Hash::make($request->password);
        $pengunjung->telepon = $request->telepon;
        $pengunjung->save();
        return redirect()->route('pengunjung.index')
        ->with('success');
    }

            public function update(Request $request)
        {
            $request->validate([
                'nik' => 'required',
                'nama_pengunjung' => 'required',
                'email' => 'required',
                'telepon' => 'required',
            ]);
            $pengunjung = Pengunjung::findOrFail($request->nik);
            $pengunjung->nik = $request->nik;
            $pengunjung->nama_pengunjung = $request->nama_pengunjung;
            $pengunjung->email = $request->email;

            // Cek apakah password diubah
            if ($request->password) {
                $pengunjung->password =  Hash::make($request->password);
            }
            $pengunjung->telepon = $request->telepon;
            $pengunjung->update();
            return redirect()->route('pengunjung.index');
        }

            public function destroy($nik)
            {
                $pengunjung = Pengunjung::find($nik);
                if (!$pengunjung) {
                    return redirect()->route('pengunjung.index')->with('error');
                }
                $pengunjung->delete();
                return redirect()->route('pengunjung.index')->with('success');
            }

            public function search(Request $request)
            {
                $keyword = $request->input('keyword'); // Mengambil inputan keyword dari form pencarian
                // Lakukan pencarian berdasarkan keyword
                $pengunjung = Pengunjung::where('nama_pengunjung', 'LIKE', '%' . $keyword . '%')->get();
                return view('backend/layouts.pengunjung', compact(['pengunjung']));
            }

            public function refresh()
            {
                // Mengambil data pengunjung tanpa melakukan pencarian atau filter
                $pengunjung = Pengunjung::all();
                return view('backend/layouts.pengunjung', compact(['pengunjung']));
            }

}
