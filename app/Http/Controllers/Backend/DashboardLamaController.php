<?php

namespace App\Http\Controllers\Backend;

// use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\ApiModel\Kamar;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardLamaController extends Controller
{
    public function index()
    {
        $jumlahStandard = $this->KamarTersedia('Standard');
        $jumlahDeluxe = $this->KamarTersedia('Deluxe');
        $jumlahSuite = $this->KamarTersedia('Suite');
        $terisiStandard = $this->KamarTerisi('Standard');
        $terisiDeluxe = $this->KamarTerisi('Deluxe');
        $terisiSuite = $this->KamarTerisi('Suite');
        // $grafikStandard = $this->Grafik('Standard');
        // $grafikDeluxe = $this->Grafik('Deluxe');
        // $grafikSuite = $this->Grafik('Suite');
        $data = [
            'standard' => $jumlahStandard,
            'deluxe' => $jumlahDeluxe,
            'suite' => $jumlahSuite,
            'terisiStandard' => $terisiStandard,
            'terisiDeluxe' => $terisiDeluxe,
            'terisiSuite' => $terisiSuite,
            // 'grafikStandard' => $grafikStandard,
            // 'grafikDeluxe' => $grafikDeluxe,
            // 'grafikSuite' => $grafikSuite
        ];
        return view('backend/layouts.dashboard', $data);
    }
    public function KamarTersedia($jenis_kamar)
    {
        $jumlah_kamar = DB::select("select count(*) AS jumlah,
        GROUP_CONCAT(id_kamar) AS ids from kamar where id_kamar not in
        (select id_kamar from transaksi WHERE status = 'Checkin' OR status = 'Proses')
        and jenis_kamar = '{$jenis_kamar}'");
        return $jumlah_kamar[0]->jumlah;
    }

    public function KamarTerisi($jenis_kamar)
    {
        $jumlah_kamar = DB::select("select count(*) AS jumlah,
        GROUP_CONCAT(id_kamar) AS ids from kamar where id_kamar in
        (select id_kamar from transaksi WHERE status = 'Checkin' OR status = 'Proses')
        and jenis_kamar = '{$jenis_kamar}'");
        return $jumlah_kamar[0]->jumlah;
    }
}
