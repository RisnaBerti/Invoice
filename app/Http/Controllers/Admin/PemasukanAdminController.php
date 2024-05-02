<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengeluaran;

class PemasukanAdminController extends Controller
{
    //fungsi view pemasukan admin
    public function index()
    {
        $pengeluaran = Pengeluaran::with('detail')->get();

        return view('admin.pemasukan-admin',
            [
                'title' => 'Pemasukan Admin',
                'pengeluaran' => $pengeluaran
            ]
        );
    }

    //fung create pemasukan admin
    public function create()
    {
        return view('admin.create-pemasukan-admin',
            [
                'title' => 'Pemasukan Admin'
            ]
        );
    }

    public function store(Request $request)
    {
        //ambil id user yang sedang login
        $user_id = auth()->user()->id_user;
        
        //validasi input
        $validated = $request->validate([
            'tgl_transaksi' => 'required',
            'id_user' =>  'required'
        ]);

        $pemasukan = Pengeluaran::create([
            'tgl_transaksi' => $request->tgl_transaksi,
            'id_user' => $user_id
        ]);

        foreach ($request->detail as $detail) {
            $pemasukan->detail()->create([
                'nama_barang_keluar' => $detail['nama_barang_keluar'],
                'jumlah_barang_keluar' => $detail['jumlah_barang_keluar'],
                'harga_satuan' => $detail['harga_satuan'],
                'subtotal' => $detail['subtotal']
            ]);
        }

        //redirect ke halaman utama dari controller ini dengan membawa flash message sukses
        return redirect()->route('pengeluaran-admin')->with('success', 'Data Berhasil Ditambahkan!');
    }


}
