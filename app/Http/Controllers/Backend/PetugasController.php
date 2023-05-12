<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function index()
    {
        $akun = DB::table('akun')->get();
        return view('backend/layouts.petugas', ['akun' => $akun]);
    }
    public function add()
    {
        return view('backend/layouts.addpetugas');
    }
    public function save(Request $request)
    {
        $petugas = new Petugas();

        $petugas->id_akun = $request->id_akun;
        $petugas->email = $request->email;
        $petugas->nama = $request->nama;
        $petugas->password = $request->password;
        $petugas->level = $request->level;
        $petugas->save();
        // DB::table('akun')->insert([
        //     'id_akun' => $request->idakun,
        //     'email' => $request->email,
        //     'nama' => $request->nama,
        //     'password' => $request->password,
        //     'level' => $request->level,
        // ]);
        return redirect()->route('petugas.index')
        ->with('success','Data petugas berhasil disimpan');
    }
}
