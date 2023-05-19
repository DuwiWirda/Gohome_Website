<?php

namespace App\Http\Controllers\backend;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Exports\TransaksiExport;

class ExportController extends Controller
{
    public function exportTransaksi() 
    {
        return Excel::download(new TransaksiExport(), 'laporan_transaksi.xlsx');
    }
}
