<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function index()
    {
        $akun = DB::table('akun')->get();
        return view('backend/layouts.petugas', ['akun' => $akun]);
    }
    public function create()
    {
        $akun = null;
        return view('backend/layouts.petugas.create',compact('akun'));
    }
    public function store(Request $request)
    {
        DB::table('akun')->insert([
            'id_akun' => $request->idakun,
            'email' => $request->email,
            'nama' => $request->nama,
            'password' => $request->password,
            'level' => $request->level,
        ]);
        return redirect()->route('petugas.index')
        ->with('success','Data petugas berhasil disimpan');
    }
}
