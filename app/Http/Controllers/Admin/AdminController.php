<?php

namespace App\Http\Controllers\Admin;

use Dompdf\Dompdf;

use App\Models\User;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //fungsi get data chart
    public function admin()
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
            'admin.dashboard-admin',
            [
                'title' => 'Dashboard Admin',
                'active' => 'dashboard-admin',
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

    public function laporanHarian(Request $request)
    {
        // Request bulan dan tahun
        $tahun = $request->get('tahun');
        $bulan = $request->get('bulan');
        $searchQuery = $request->query('q');

        // Query untuk mendapatkan tahun-tahun unik
        $tahunList = DB::table('pemasukan')
            ->select(DB::raw('YEAR(tgl_pemasukan) as tahun'))
            ->distinct()
            ->get();

        // Query untuk mendapatkan saldo berdasarkan bulan dan tahun
        $query = DB::table('pemasukan')
            ->select(
                'tgl_pemasukan',
                DB::raw('YEAR(tgl_pemasukan) AS tahun'),
                DB::raw('MONTH(tgl_pemasukan) AS bulan'),
                DB::raw('SUM(CASE WHEN pemasukan.keterangan = "Kasbon" THEN detail_pemasukan.subtotal ELSE 0 END) AS total_piutang'),
                DB::raw('SUM(CASE WHEN detail_pemasukan.saldo = "Kredit" THEN detail_pemasukan.subtotal ELSE 0 END) AS total_debet'),
                DB::raw('SUM(CASE WHEN detail_pemasukan.saldo = "Debet" THEN detail_pemasukan.subtotal ELSE 0 END) AS total_kredit'),
                DB::raw('SUM(detail_pemasukan.subtotal) AS total_semua')
            )
            ->join('detail_pemasukan', 'pemasukan.id_pemasukan', '=', 'detail_pemasukan.id_pemasukan')
            ->when($tahun, function ($query, $tahun) {
                return $query->whereYear('tgl_pemasukan', $tahun);
            })
            ->when($bulan, function ($query, $bulan) {
                return $query->whereMonth('tgl_pemasukan', $bulan);
            });

        // Jika terdapat query pencarian, tambahkan kondisi pencarian
        if ($searchQuery) {
            $query->where('tgl_pemasukan', 'like', '%' . $searchQuery . '%');
        }

        // Eksekusi query dan dapatkan data saldo
        $saldo = $query->groupBy('tgl_pemasukan')->get();

        return view('admin.laporan-admin-harian', [
            'title' => 'Laporan Admin',
            'active' => 'laporan-admin',
            'saldo' => $saldo,
            'tahun' => $tahunList
        ]);
    }

    public function laporanBulanan(Request $request)
    {
        // Request bulan dan tahun
        $tahun = $request->get('tahun');
        $bulan = $request->get('bulan');
        $searchQuery = $request->query('q');

        // Query untuk mendapatkan tahun-tahun unik
        $tahunList = DB::table('pemasukan')
            ->select(DB::raw('YEAR(tgl_pemasukan) as tahun'))
            ->distinct()
            ->get();

        // Query untuk mendapatkan saldo berdasarkan bulan dan tahun
        $query = DB::table('pemasukan')
            ->select(
                'tgl_pemasukan',
                DB::raw('YEAR(tgl_pemasukan) AS tahun'),
                DB::raw('MONTH(tgl_pemasukan) AS bulan'),
                DB::raw('SUM(CASE WHEN detail_pemasukan.keterangan = "Kasbon" THEN detail_pemasukan.subtotal ELSE 0 END) AS total_piutang'),
                DB::raw('SUM(CASE WHEN detail_pemasukan.saldo = "Kredit" THEN detail_pemasukan.subtotal ELSE 0 END) AS total_debet'),
                DB::raw('SUM(CASE WHEN detail_pemasukan.saldo = "Debet" THEN detail_pemasukan.subtotal ELSE 0 END) AS total_kredit')
            )
            ->join('detail_pemasukan', 'pemasukan.id_pemasukan', '=', 'detail_pemasukan.id_pemasukan')
            ->when($tahun, function ($query, $tahun) {
                return $query->whereYear('tgl_pemasukan', $tahun);
            })
            ->when($bulan, function ($query, $bulan) {
                return $query->whereMonth('tgl_pemasukan', $bulan);
            });

        // Jika terdapat query pencarian, tambahkan kondisi pencarian
        if ($searchQuery) {
            $query->where('tgl_pemasukan', 'like', '%' . $searchQuery . '%');
        }

        // Eksekusi query dan dapatkan data saldo
        $saldo = $query->groupBy('tgl_pemasukan')->get();

        return view('admin.laporan-admin-bulanan', [
            'title' => 'Laporan Admin',
            'active' => 'laporan-admin',
            'saldo' => $saldo,
            'tahun' => $tahunList
        ]);
    }


    public function downloadPDF(Request $request)
    {
        $tgl_pemasukan = $request->tgl_pemasukan;
        $saldo = $request->saldo;

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // var_dump($dompdf);
        // die();
        // Load the HTML content
        $html = view('print-pdf', compact('tgl_pemasukan', 'saldo'))->render();

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (inline download)
        return $dompdf->stream('laporan_harian.pdf');
    }

    //fungsi kirim notifikasi whatsapp
    public function sendNotifWhatsApp($tgl_pemasukan)
    {
        $saldo = DB::table('pemasukan')
            ->select(
                'tgl_pemasukan',
                DB::raw('YEAR(tgl_pemasukan) AS tahun'),
                DB::raw('MONTH(tgl_pemasukan) AS bulan'),
                DB::raw('SUM(CASE WHEN detail_pemasukan.keterangan = "Kasbon" THEN detail_pemasukan.subtotal ELSE 0 END) AS total_piutang'),
                DB::raw('SUM(CASE WHEN detail_pemasukan.saldo = "Kredit" THEN detail_pemasukan.subtotal ELSE 0 END) AS total_debet'),
                DB::raw('SUM(CASE WHEN detail_pemasukan.saldo = "Debet" THEN detail_pemasukan.subtotal ELSE 0 END) AS total_kredit')
            )
            ->join('detail_pemasukan', 'pemasukan.id_pemasukan', '=', 'detail_pemasukan.id_pemasukan')
            ->where('tgl_pemasukan', $tgl_pemasukan)
            ->groupBy('tgl_pemasukan')
            ->first();

        $total_pendapatan = number_format($saldo->total_debet - $saldo->total_kredit, 0, ',', '.');
        $total_piutang = number_format($saldo->total_piutang, 0, ',', '.');

        $message = "*LAPORAN PENDAPATAN HARIAN*\n
            ==============================
            Tanggal : " . date("d F Y", strtotime($saldo->tgl_pemasukan)) . "\n
            Saldo Pendapatan : Rp." . ($total_pendapatan) . ",-\n
            Saldo Piutang : Rp." . $total_piutang . ",-\n
            Terima kasih\n
            ==============================";

        $curl = curl_init();
        $token = "MnFvh9He2K3dTHl6lIXVDCDKTbq0lo8PmmNxodK6jLkn0ls4THEM5E9SsQ0k1y3o";
        $phone = "6285156805040";

        $encodedMessage = urlencode($message);
        curl_setopt($curl, CURLOPT_URL, "https://pati.wablas.com/api/send-message?phone=$phone&message=$encodedMessage&token=$token");
        $result = curl_exec($curl);
        curl_close($curl);
        echo "<pre>";
        // print_r($result);
        // die();

        // return true;
        return redirect()->back()->with('success', 'Notifikasi berhasil dikirim');
    }
}
