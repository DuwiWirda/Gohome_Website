<?php

namespace App\Exports;

use App\Models\Apimodel\Transaksi;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat as StyleNumberFormat;

class TransaksiExport implements FromCollection, WithHeadings,WithColumnFormatting
{

    private $bulan = '';
    
    public function __construct($bulan) {
        $this->bulan = $bulan;
    }
   
    public function headings(): array
    {
        return[
            'ID TRANSAKSI',
            'NIK',
            'NAMA PENGUNJUNG',
            'JENIS KAMAR',
            'NOMER KAMAR',
            'TANGGAL CHECKIN',
            'TANGGAL CHECKOUT',
            'STATUS TRANSAKSI',
            'TOTAL'
        ];
    }

    public function collection()
    {
        if($this->bulan == '' || $this->bulan == null || $this->bulan == 'null'){
            return  DB::table('transaksi')
            ->join('kamar','transaksi.id_kamar','=','kamar.id_kamar')
            ->join('pengunjung','transaksi.nik','=','pengunjung.nik')
            ->get(['id_transaksi','pengunjung.nik','pengunjung.nama_pengunjung','kamar.jenis_kamar','kamar.nomer_kamar','tanggal_checkin','tanggal_checkout','status','total']);
        }else{
            return  DB::table('transaksi')
            ->join('kamar','transaksi.id_kamar','=','kamar.id_kamar')
            ->join('pengunjung','transaksi.nik','=','pengunjung.nik')
            ->whereMonth('tanggal_checkin','=',$this->bulan)
            ->get(['id_transaksi','pengunjung.nik','pengunjung.nama_pengunjung','kamar.jenis_kamar','kamar.nomer_kamar','tanggal_checkin','tanggal_checkout','status','total']);
        }
       
    }

     public function columnFormats(): array
    {
        return [
            'B' => StyleNumberFormat::FORMAT_NUMBER,
        ];
    }
}
?>