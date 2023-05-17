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
        $petugas = Petugas::all();
        return view('backend/layouts.petugas', compact(['petugas']));
    }

    public function add()
    {
        return view('backend/layouts.addpetugas');
        return response()->json([
            'status' => 'ok',
            'message' => 'Data Petugas berhasil ditambahkan'
        ], 201);
    }

    public function save(Request $request)
    {
        $petugas = new Petugas();
        $petugas->id = $request->id;
        $petugas->name = $request->name;
        $petugas->email = $request->email;
        $petugas->password = $request->password;
        $petugas->role = $request->role;
        $petugas->remember_token = $request->remember_token;
        $petugas->save();
        return redirect()->route('petugas.index')
        ->with('success','Data petugas berhasil disimpan');
    }
    

    public function edit($id_akun){
        $petugas = Petugas::findOrFail($id_akun);
        return view('backend/layouts.editpetugas', compact(['petugas']));
    }

    public function update(Request $request){
        $petugas = Petugas::findOrFail($request->id);
        $petugas->id = $request->id;
        $petugas->name = $request->name;
        $petugas->email = $request->email;
        $petugas->password = $request->password;
        $petugas->role = $request->role;
        $petugas->remember_token = $request->remember_token;
        $petugas->update();
        return redirect()->route('petugas.index');
    }
    
    public function destroy($id_akun){
        
    }
}
