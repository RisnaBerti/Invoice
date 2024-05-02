<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PengeluaranAdminController extends Controller
{
    // Fungsi index
    public function index()
    {
        // $pengeluaran = DB::select("SELECT * FROM pengeluaran
        // JOIN detail_pengeluaran dp ON pengeluaran.id_pengeluaran = dp.id_pengeluaran");

        // var_dump($pengeluaran);
        // die();
        $pengeluaran = Pengeluaran::with('detail')->get();

        return view(
            'admin.pengeluaran-admin',
            [
                'title' => 'Pengeluaran Admin',
                'pengeluaran' => $pengeluaran
            ]
        );
    }

    // Fungsi create pengeluaran admin
    public function create()
    {
        // $pengeluaran = Pengeluaran::all();      


        return view(
            'admin.create-pengeluaran-admin',
            [
                'title' => 'Pengeluaran Admin'
            ]
        );
    }

    public function store(Request $request)
    {
        // Ambil id user yang sedang login
        $user_id = auth()->user()->id_user;

        // Buat objek pengeluaran baru
        $pengeluaran = Pengeluaran::create([
            'tgl_pengeluaran' => $request->tgl_pengeluaran,
            'id_user' => $user_id
        ]);

        // Tambahkan detail pengeluaran
        foreach ($request->detail as $detail) {
            $pengeluaran->detail()->create([
                'nama_barang_keluar' => $detail['nama_barang_keluar'],
                'jumlah_barang_keluar' => $detail['jumlah_barang_keluar'],
                'harga_satuan' => floatval(str_replace(['.', 'Rp '], '', $detail['harga_satuan'])),
                'subtotal' => floatval(str_replace(['.', 'Rp '], '', $detail['subtotal']))
            ]);
        }

        //redirect ke halaman utama dan menampilkan sweetalert
        return redirect()->route('pengeluaran-admin')->with('success', 'Data Berhasil Ditambahkan!');

        // Redirect ke halaman utama dari controller ini dengan membawa flash message sukses
        // return redirect()->route('pengeluaran-admin')->with('success', 'Data Berhasil Ditambahkan!');

    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::with('detail')->find($id);
        //console data pengeluaran
        dd($pengeluaran);
        die();

        // Cek apakah data pengeluaran ditemukan
        if (!$pengeluaran) {
            return redirect()->route('pengeluaran-admin')->with('error', 'Data Tidak Ditemukan!');
        }

        // Membuat array untuk menyimpan data detail pengeluaran
        $dataDetail = [];
        foreach ($pengeluaran->detail as $detail) {
            $dataDetail[] = [
                'nama_barang_keluar_edit' => $detail->nama_barang_keluar,
                'jumlah_barang_keluar_edit' => $detail->jumlah_barang_keluar,
                'harga_satuan_edit' => 'Rp ' . number_format($detail->harga_satuan, 0, ',', '.'),
                'subtotal_edit' => 'Rp ' . number_format($detail->subtotal, 0, ',', '.')
            ];
        }

        // Menampikan view edit pengeluaran admin dan memberikan data yang dibutuhkan
        return view('pages.admin.pengeluaran.edit', [
            'title' => 'Pengeluaran Admin',
            'pengeluaran' => $pengeluaran,
            'dataDetail' => $dataDetail
        ]);


        // return view(
        //     'admin.edit-pengeluaran-admin',
        //     [
        //         'title' => 'Pengeluaran Admin',
        //         'pengeluaran' => $pengeluaran
        //     ]
        // );
    }

    public function update(Request $request, $id)
    {
        // $pengeluaran = Pengeluaran::find($id);
        $pengeluaran = Pengeluaran::with('detail')->find($id);
        $pengeluaran->tgl_pengeluaran = $request->tgl_pengeluaran_edit;
        $pengeluaran->save();

        $pengeluaran->detail()->delete();

        foreach ($request->detail as $detail) {
            $pengeluaran->detail()->create([
                'nama_barang_keluar' => $detail['nama_barang_keluar_edit'],
                'jumlah_barang_keluar' => $detail['jumlah_barang_keluar_edit'],
                'harga_satuan' => floatval(str_replace(['.', 'Rp '], '', $detail['harga_satuan_edit'])),
                'subtotal_edit' => floatval(str_replace(['.', 'Rp '], '', $detail['subtotal_edit']))
            ]);
        }

        return redirect()->route('pengeluaran-admin')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->detail()->delete();
        $pengeluaran->delete();

        return redirect()->route('pengeluaran-admin')->with('success', 'Data Berhasil Dihapus!');
    }
}
