<?php

namespace App\Exports;

use App\Models\Apimodel\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksiExport implements FromCollection
{
   
    public function collection()
    {
       return Transaksi::all();
    }
}
?>
