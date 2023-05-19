<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ApiModel\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        return view('backend/layouts.kamar', compact(['kamar']));
    }

    public function add()
    {
        return view('backend/layouts.addkamar');
        return response()->json([
            'status' => 'ok',
            'message' => 'Data Kamar berhasil ditambahkan'
        ], 201);
    }

    public function save(Request $request)
    {
        $request->validate([
            'nomer_kamar' => 'required',
            'jenis_kamar' => 'required',
            'deskripsi' => 'required',
            'jenis_kasur' => 'required',
            'harga' => 'required',
            'status_kamar' => 'required',
        ]);
        $kamar = new Kamar();
        if($request->file('gambar_kamar')){
            $validatedData = $request->validate([
                'gambar_kamar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $foto = $request->file('gambar_kamar')->getClientOriginalName();
            $path = $request->file('gambar_kamar')->move('images/' , $foto);
            $kamar->gambar_kamar = $foto;
        }
        $kamar->id_kamar = $request->id_kamar;
        $kamar->jenis_kamar = $request->jenis_kamar;
        $kamar->nomer_kamar = $request->nomer_kamar;
        $kamar->harga = $request->harga;
        $kamar->deskripsi = $request->deskripsi;
        $kamar->jenis_kasur = $request->jenis_kasur;
        $kamar->gambar_kamar = $request->gambar_kamar;
        $kamar->status_kamar = $request->status_kamar;
        $kamar->save();
        return redirect()->route('kamar.index');
    }

    public function edit($id_kamar){
        $kamar = Kamar::findOrFail($id_kamar);
        return view('backend/layouts.editkamar', compact(['kamar']));
    }
    public function update(Request $request){
        $kamar = Kamar::findOrFail($request->id_kamar);
        if($request->file('gambar')){
            $validatedData = $request->validate([
                'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $foto = $request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->move('images/' , $foto);
            $kamar->gambar_kamar = $foto;
        }
        $kamar->id_kamar = $request->id_kamar;
        $kamar->jenis_kamar = $request->jenis_kamar;
        $kamar->nomer_kamar = $request->nomer_kamar;
        $kamar->harga = $request->harga;
        $kamar->deskripsi = $request->deskripsi;
        $kamar->jenis_kasur = $request->jenis_kasur;
        $kamar->gambar_kamar = $request->gambar_kamar;
        $kamar->status_kamar = $request->status_kamar;
        $kamar->update();
        return redirect()->route('kamar.index');
    }

        public function destroy($id_kamar)
        {
            $kamar = Kamar::find($id_kamar);
            if (!$kamar) {
                return redirect()->route('kamar.index')->with('error');
            }
            $kamar->delete();
            return redirect()->route('kamar.index')->with('success');
        }


        public function search(Request $request)
            {
                $keyword = $request->input('keyword'); // Mengambil inputan keyword dari form pencarian
                // Lakukan pencarian berdasarkan keyword
                $kamar = Kamar::where('jenis_kamar', 'LIKE', '%' . $keyword . '%')->get();
                return view('backend/layouts.kamar', compact(['kamar']));
            }

            public function refresh()
            {
                // Mengambil data pengunjung tanpa melakukan pencarian atau filter
                $kamar = Kamar::all();
                return view('backend/layouts.kamar', compact(['kamar']));
            }

    }

