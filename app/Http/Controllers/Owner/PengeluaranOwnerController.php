<?php

namespace App\Http\Controllers\Owner;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengeluaranOwnerController extends Controller
{
    // Fungsi index
    public function index()
    {
        $pengeluaran = Pengeluaran::with('detail')->get();

        return view(
            'owner.pengeluaran-owner',
            [
                'title' => 'Pengeluaran Owner',
                'pengeluaran' => $pengeluaran
            ]
        );
    }

    // Fungsi create pengeluaran owner
    public function create()
    {
        return view(
            'owner.create-pengeluaran-owner',
            [
                'title' => 'Pengeluaran Owner'
            ]
        );
    }

    public function store(Request $request)
    {
        // Ambil id user yang sedang login
        $user_id = auth()->user()->id_user;

        $total_harga = 0;
        foreach ($request->detail as $detail) {
            $total_harga += floatval(str_replace(['.', 'Rp '], '', $detail['subtotal']));
        }

        // Buat objek pengeluaran baru
        $pengeluaran = Pengeluaran::create([
            'tgl_pengeluaran' => $request->tgl_pengeluaran,
            'id_user' => $user_id,
            'total_harga' => $total_harga
        ]);

        // Hitung total harga dari semua detail pemasukan


        // Tambahkan detail pengeluaran
        foreach ($request->detail as $detail) {
            $pengeluaran->detail()->create([
                'nama_barang_keluar' => $detail['nama_barang_keluar'],
                'jumlah_barang_keluar' => $detail['jumlah_barang_keluar'],
                'harga_satuan' => floatval(str_replace(['.', 'Rp '], '', $detail['harga_satuan'])),
                'subtotal' => floatval(str_replace(['.', 'Rp '], '', $detail['subtotal'])),
            ]);
        }

        //redirect ke halaman utama dan menampilkan sweetalert
        return redirect()->route('pengeluaran-owner')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::with('detail')->find($id);
        return response()->json($pengeluaran);
    }

    //fungsi update pengeluaran admin  dengan menggunakan ajax
    public function update(Request $request)
    {
        $id = $request->id_pengeluaran_edit;   //dapatkan id dari data yang akan diubah
        // Temukan pengeluaran berdasarkan ID
        $pengeluaran = Pengeluaran::with('detail')->find($id);

        $total_harga = 0;
        foreach ($request->detail as $detail) {
            $total_harga += floatval(str_replace(['.', 'Rp '], '', $detail['subtotal_edit']));
        }

        // Perbarui tanggal pengeluaran
        $pengeluaran->tgl_pengeluaran = $request->tgl_pengeluaran_edit;
        $pengeluaran->id_user = auth()->user()->id_user;  // Untuk menyimpan id user yang sedang login
        $pengeluaran->total_harga = $total_harga;
        $pengeluaran->save();

        // Hapus detail pengeluaran terkait
        $pengeluaran->detail()->delete();



        // Tambahkan detail pengeluaran baru dari input form
        foreach ($request->detail as $detail) {
            $pengeluaran->detail()->create([
                'nama_barang_keluar' => $detail['nama_barang_keluar_edit'],
                'jumlah_barang_keluar' => $detail['jumlah_barang_keluar_edit'],
                'harga_satuan' => floatval(str_replace(['.', 'Rp '], '', $detail['harga_satuan_edit'])),
                'subtotal' => floatval(str_replace(['.', 'Rp '], '', $detail['subtotal_edit'])),
            ]);
        }

        // Redirect kembali ke halaman pengeluaran-admin setelah update berhasil
        return redirect()->route('pengeluaran-owner')->with('success', 'Data Berhasil Diubah!');
    }

    public function delete($id)
    {
        $pengeluaran = Pengeluaran::with('detail')->find($id);
        $pengeluaran->detail()->delete();
        $pengeluaran->delete();

        return redirect()->route('pengeluaran-owner')->with('success', 'Data Berhasil Dihapus!');
    }
}
