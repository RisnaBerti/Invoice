<?php

namespace App\Http\Controllers\Owner;

use App\Charts\GrafikBulananChart;
use App\Models\User;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{
    //fungsi dashboard view
    public function owner1()
    {

        //jumlah user
        $user = User::all()->count();

        //jumlah total pengeluaran dari kolom total
        $pengeluaranResult  = DB::select("SELECT SUM(total) AS total_pengeluaran FROM detail_pengeluaran");
        $pengeluaran = $pengeluaranResult[0]->total_pengeluaran;
        $pengeluaran_formatted = "Rp " . number_format($pengeluaran, 0, ',', '.');

        //jumlah total pemasukan
        $pemasukanResult = DB::select("SELECT SUM(total_harga) AS total_pemasukan FROM pemasukan");
        $pemasukan = $pemasukanResult[0]->total_pemasukan;
        $pemasukan_formatted = "Rp " . number_format($pemasukan, 0, ',', '.');

        //data chart
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $labels = Pemasukan::select(DB::raw('MONTH(tgl_pemasukan) as bulan'), DB::raw('SUM(total_harga) as total'))
            ->groupBy('bulan')
            ->get()
            ->pluck('total', 'bulan')
            ->toArray();

        $datasets = [
            'data' => array_values($labels)
        ];
        $dataNumeric = array_map('intval', $datasets['data']);

        // foreach ($labels as $label) {
        //     $bulan[] = $label;
        // }

        // $dataNumeric = [];
        // for ($i = 12; $i >= 1; $i--) {
        //     $dataNumeric[] = Pemasukan::whereMonth('tgl_pemasukan', $i)->sum('total_harga');
        // }

        // var_dump($dataNumeric);
        // die;


        // var_dump($pengeluaran);
        // die();

        return view(
            'owner.dashboard-owner',
            [
                'title' => 'Dashboard Owner',
                'active' => 'dashboard-owner',
                'user' => $user,
                'pengeluaran_formatted' => $pengeluaran_formatted,
                'pemasukan_formatted' => $pemasukan_formatted,
                'pengeluaran' => $pengeluaran,
                'pemasukan' => $pemasukan,
                'bulan' => $bulan,
                'dataNumeric' => $dataNumeric,

                // 'chart' => $chart->build()
            ]
        );
    }

    //fungsi get data chart
    public function owner()
    {
        //jumlah user
        $user = User::all()->count();

        //jumlah total pengeluaran dari kolom total
        $pengeluaranResult  = DB::select("SELECT SUM(total_harga) AS total_pengeluaran FROM pengeluaran");
        $pengeluaran = $pengeluaranResult[0]->total_pengeluaran;
        $pengeluaran_formatted = "Rp " . number_format($pengeluaran, 0, ',', '.');

        //jumlah total pemasukan
        $pemasukanResult = DB::select("SELECT SUM(total_harga) AS total_pemasukan FROM pemasukan");
        $pemasukan = $pemasukanResult[0]->total_pemasukan;
        $pemasukan_formatted = "Rp " . number_format($pemasukan, 0, ',', '.');

        // Jumlah total pemasukan per bulan
        $tahun = date('Y');
        $bulan = date('m');

        $dataNumeric = [];
        for ($i = 1; $i <= $bulan; $i++) {
            $dataPemasukan = Pemasukan::select(DB::raw('MONTH(tgl_pemasukan) as bulan'), DB::raw('SUM(total_harga) as total'))
                ->whereYear('tgl_pemasukan', $tahun)
                ->whereMonth('tgl_pemasukan', $i)
                ->groupBy('bulan')
                ->first(); // Menggunakan first() karena sudah digunakan GROUP BY bulan

            // Jika data pemasukan ada, tambahkan ke $dataNumeric
            if ($dataPemasukan) {
                $dataNumeric[] = $dataPemasukan->total;
            } else {
                $dataNumeric[] = 0; // Jika tidak ada data, set nilai 0
            }
        }

        $dataNumeric2 = [];
        for ($i = 1; $i <= $bulan; $i++) {
            $dataPengeluaran = Pengeluaran::select(DB::raw('MONTH(tgl_pengeluaran) as bulan'), DB::raw('SUM(total_harga) as total'))
                ->whereYear('tgl_pengeluaran', $tahun)
                ->whereMonth('tgl_pengeluaran', $i)
                ->groupBy('bulan')
                ->first(); // Menggunakan first() karena sudah digunakan GROUP BY bulan

            // Jika data pemasukan ada, tambahkan ke $dataNumeric
            if ($dataPengeluaran) {
                $dataNumeric2[] = $dataPengeluaran->total;
            } else {
                $dataNumeric2[] = 0; // Jika tidak ada data, set nilai 0
            }
        }

        return view(
            'owner.dashboard-owner',
            [
                'title' => 'Dashboard Owner',
                'active' => 'dashboard-owner',
                'user' => $user,
                'pengeluaran_formatted' => $pengeluaran_formatted,
                'pemasukan_formatted' => $pemasukan_formatted,
                'dataNumeric' => $dataNumeric,
                'dataNumeric2' => $dataNumeric2,
                // 'dataBulan' => $dataBulan,
                // 'prevMonth' => $prevMonth,
                // 'months' => $months

            ]
        );
    }
}
