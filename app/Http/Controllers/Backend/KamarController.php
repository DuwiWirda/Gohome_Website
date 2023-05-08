<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = DB::table('kamar')->get();
        return view('backend/layouts.kamar', ['kamar' => $kamar]);
    }
    public function create()
    {
        $kamar = null;
        return view('backend/layouts.kamar.create',compact('kamar'));
    }
    public function store(Request $request)
    {
        DB::table('kamar')->insert([
            'id_kamar' => $request->idkamar,
            'nomor_kamar' => $request->nomorkamar,
            'jenis_kamar' => $request->jeniskamar,
            'jenis_kasur' => $request->jeniskasur,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar_kamar' => $request->gambarkamar,
            'status_kamar' => $request->statuskamar,
        ]);
        return redirect()->route('kamar.index')
        ->with('success','Data kamar berhasil disimpan');
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    $results = Post::where('jenis_kamar', 'LIKE', '%'.$query.'%')->get();
    return view('search', ['results' => $results]);
}

}
