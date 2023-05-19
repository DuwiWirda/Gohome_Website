<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ApiModel\Kamar;
use Illuminate\Support\Facades\DB;
use App\Models\ApiModel\Transaksi;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index()
    {
        $terisiStandard = Kamar::where('status_kamar', 'Tidak Tersedia')->where('jenis_kamar', 'Standard')->count();
        $terisiDeluxe = Kamar::where('status_kamar', 'Tidak Tersedia')->where('jenis_kamar', 'Deluxe')->count();
        $terisiSuite = Kamar::where('status_kamar', 'Tidak Tersedia')->where('jenis_kamar', 'Suite')->count();
        $tersediaStandard = Kamar::where('status_kamar', 'Tersedia')->where('jenis_kamar', 'Standard')->count();
        $tersediaDeluxe = Kamar::where('status_kamar', 'Tersedia')->where('jenis_kamar', 'Deluxe')->count();
        $tersediaSuite = Kamar::where('status_kamar', 'Tersedia')->where('jenis_kamar', 'Suite')->count();
        $currentYear = Carbon::now()->year;
        $months = range(1, 12);
        $standard = Transaksi::select(DB::raw('MONTH(tanggal_checkin) as bulan, COUNT(*) as total'))
            ->whereYear('tanggal_checkin', $currentYear)
            ->where(function ($query) {
                $query->where('status', 'Checkout');
            })
            ->whereHas('kamar', function ($query) {
                $query->where('jenis_kamar', '=', 'Standard');
            })
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->all();
        $standard = array_replace(array_fill_keys($months, 0), $standard);
        $deluxe = Transaksi::select(DB::raw('MONTH(tanggal_checkin) as bulan, COUNT(*) as total'))
            ->whereYear('tanggal_checkin', $currentYear)
            ->where(function ($query) {
                $query->where('status', 'Checkout');
            })
            ->whereHas('kamar', function ($query) {
                $query->where('jenis_kamar', '=', 'Deluxe');
            })
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->all();
        $deluxe = array_replace(array_fill_keys($months, 0), $deluxe);
        $suite = Transaksi::select(DB::raw('MONTH(tanggal_checkin) as bulan, COUNT(*) as total'))
            ->whereYear('tanggal_checkin', $currentYear)
            ->where(function ($query) {
                $query->where('status', 'Checkout');
            })
            ->whereHas('kamar', function ($query) {
                $query->where('jenis_kamar', '=', 'Suite');
            })
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->all();
        $suite = array_replace(array_fill_keys($months, 0), $suite);

        return view('backend.layouts.dashboard', [
            'standard' => $standard,
            'deluxe' => $deluxe,
            'suite' => $suite,
            'terisiStandard' => $terisiStandard,
            'terisiDeluxe' => $terisiDeluxe,
            'terisiSuite' => $terisiSuite,
            'tersediaStandard' => $tersediaStandard,
            'tersediaDeluxe' => $tersediaDeluxe,
            'tersediaSuite' => $tersediaSuite,
        ]);
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


    public function grafik()
{
    $currentYear = Carbon::now()->year;
    $months = range(1, 12);

    $standard = Transaksi ::select(DB::raw('MONTH(tanggal_checkin) as bulan, COUNT(*) as total'))
        ->whereYear('tanggal_checkin', $currentYear)
        ->where(function ($query) {
            $query->where('status', 'Checkout');
                // ->orWhere('status', 'Proses');
        })
        ->whereHas('kamar', function ($query) {
            $query->where('jenis_kamar', '=', 'Standard');
        })
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->pluck('total', 'bulan')
        ->all();
    $standard = array_replace(array_fill_keys($months, 0), $standard);

    $deluxe = Transaksi::select(DB::raw('MONTH(tanggal_checkin) as bulan, COUNT(*) as total'))
        ->whereYear('tanggal_checkin', $currentYear)
        ->where(function ($query) {
            $query->where('status', 'Checkout');
                // ->orWhere('status', 'Proses');
        })
        ->whereHas('kamar', function ($query) {
            $query->where('jenis_kamar', '=', 'Deluxe');
        })
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->pluck('total', 'bulan')
        ->all();
    $deluxe = array_replace(array_fill_keys($months, 0), $deluxe);

    $suite = Transaksi::select(DB::raw('MONTH(tanggal_checkin) as bulan, COUNT(*) as total'))
        ->whereYear('tanggal_checkin', $currentYear)
        ->where(function ($query) {
            $query->where('status', 'Checkout');
                // ->orWhere('status', 'Proses');
        })
        ->whereHas('kamar', function ($query) {
            $query->where('jenis_kamar', '=', 'Suite');
        })
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->pluck('total', 'bulan')
        ->all();
    $suite = array_replace(array_fill_keys($months, 0), $suite);

}}
