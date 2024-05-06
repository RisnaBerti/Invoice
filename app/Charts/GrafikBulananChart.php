<?php

namespace App\Charts;

use App\Models\Pemasukan;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class GrafikBulananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        //ambil data pemasukan dari database
        $bulan = date('m');
        $tahun = date('Y');
        $pemasukan = 
            DB::table('pemasukan')
            ->select(DB::raw('MONTHNAME(tgl_pemasukan) as bulan'), DB::raw('SUM(total_harga) as total'))
            ->whereYear('tgl_pemasukan', $tahun)
            ->groupBy('bulan')
            ->get();
        
        return $this->chart->barChart()
                          ->setTitle('Grafik Transaksi Pemasukan')
                          ->addData([$pemasukan->pluck('total')->toArray()])
                          ->setXAxis(['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des']);
    }
    //     $dataPemasukan = "SELECT
    //                             MONTHNAME(MAX(p.tgl_pemasukan)) as bulan,
    //                             COALESCE(SUM(dp.total_harga), 0) as total
    //                         FROM
    //                             pemasukan p
    //                             LEFT JOIN detail_pemasukan dp ON p.id_pemasukan = dp.id_pemasukan
    //                         GROUP BY
    //                             MONTH(p.tgl_pemasukan)
    //                         ORDER BY
    //                             FIELD(MONTH(MAX(p.tgl_pemasukan)), 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12) ";

    //     $pemasukan = DB::select($dataPemasukan);
    //     var_dump($pemasukan['bulan']);  
    //     die();

    //     return $this->chart->barChart()
    //         ->setTitle('Grafik Transaksi Pemasukan')
    //         ->setSubtitle('Wins during season 2021.')
    //         ->addData('Pemasukan', $pemasukan[])
    //         ->addData('Pengeluaran', [7, 3, 8, 2, 6, 4])
    //         ->setXAxis(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
    // }

}
