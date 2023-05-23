<?php

namespace App\Http\Controllers\backend;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Exports\TransaksiExport;
use App\Models\ApiModel\Transaksi;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function exportTransaksi(Request $request) 
    {
        return Excel::download(new TransaksiExport($request->get('bulan_export')), 'laporan_transaksi.xlsx');
    }
}