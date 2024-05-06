<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //fungsi view dashboard admin
    public function admin()
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
 
         // var_dump($pengeluaran);
         // die();
 
        return view('admin.dashboard-admin',[
            'title' => 'Dashboard Admin',
            'active' => 'dashboard-admin',
            'user' => $user,
            'pengeluaran_formatted' => $pengeluaran_formatted,
            'pemasukan_formatted' => $pemasukan_formatted
        ]);
    }
}
