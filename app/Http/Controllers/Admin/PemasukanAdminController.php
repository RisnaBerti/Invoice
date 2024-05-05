<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemasukanAdminController extends Controller
{
    //fungsi view pemasukan admin
    public function index()
    {
        $pemasukan = Pemasukan::with('detailPemasukan')->get();

        return view(
            'admin.pemasukan-admin',
            [
                'title' => 'Pemasukan Admin',
                'pemasukan' => $pemasukan
            ]
        );
    }

    //fung create pemasukan admin
    public function create()
    {
        return view(
            'admin.create-pemasukan-admin',
            [
                'title' => 'Pemasukan Admin'
            ]
        );
    }

    public function store(Request $request)
    {
        // Ambil id user yang sedang login
        $user_id = auth()->user()->id_user;

        // Buat objek pemasukan baru
        $pemasukan = Pemasukan::create([
            'tgl_pemasukan' => $request->tgl_pemasukan,
            'id_user' => $user_id
        ]);

        // Tambahkan detail pemasukan
        foreach ($request->detail as $detail) {
            $pemasukan->detailPemasukan()->create([                
                'jenis_pemasukan' => $detail['jenis_pemasukan'],
                'nama_barang_masuk' => $detail['nama_barang_masuk'],
                'jumlah_barang_masuk' => $detail['jumlah_barang_masuk'],
                'harga_barang_masuk' => floatval(str_replace(['.', 'Rp '], '', $detail['harga_barang_masuk'])),                
                'saldo' => $detail['saldo'],
                'bayar' => $detail['bayar'],
                'keterangan' => $detail['keterangan'],
                'subtotal' => floatval(str_replace(['.', 'Rp '], '', $detail['subtotal'])),
                'total_harga' => floatval(str_replace(['.', 'Rp '], '', $detail['total_harga']))
            ]);
        }

        //redirect ke halaman utama dan menampilkan sweetalert
        return redirect()->route('pemasukan-admin')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $pemasukan = Pemasukan::with('detailPemasukan')->find($id);
        return response()->json($pemasukan);
    }

    //fungsi update pemasukan admin  dengan menggunakan ajax
    public function update(Request $request)
    {
        $id = $request->id_pemasukan_edit;   //dapatkan id dari data yang akan diubah
        // Temukan pemasukan berdasarkan ID dan 
        $pemasukan = Pemasukan::with('detailPemasukan')->find($id);

        // Perbarui tanggal pemasukan
        $pemasukan->tgl_pemasukan = $request->tgl_pemasukan_edit;
        $pemasukan->id_user = auth()->user()->id_user;  // Untuk menyimpan id user yang sedang login
        $pemasukan->save();

        // Hapus detail pemasukan terkait
        $pemasukan->detailPemasukan()->delete();

        // Tambahkan detail pemasukan baru dari input form
        foreach ($request->detail as $detail) {
            $pemasukan->detailPemasukan()->create([
                'jenis_pemasukan' => $detail['jenis_pemasukan_edit'],
                'nama_barang_masuk' => $detail['nama_barang_masuk_edit'],
                'jumlah_barang_masuk' => $detail['jumlah_barang_masuk_edit'],
                'harga_barang_masuk' => floatval(str_replace(['.', 'Rp '], '', $detail['harga_barang_masuk_edit'])),                
                'saldo' => $detail['saldo_edit'],
                'bayar' => $detail['bayar_edit'],
                'keterangan' => $detail['keterangan_edit'],
                'subtotal' => floatval(str_replace(['.', 'Rp '], '', $detail['subtotal_edit'])),
                'total_harga' => floatval(str_replace(['.', 'Rp '], '', $detail['total_harga_edit']))
            ]);
        }

        // Redirect kembali ke halaman pemasukan-admin setelah update berhasil
        return redirect()->route('pemasukan-admin')->with('success', 'Data Berhasil Diubah!');
    }

    public function delete($id)
    {
        $pemasukan = Pemasukan::with('detailPemasukan')->find($id);
        $pemasukan->detail()->delete();
        $pemasukan->delete();

        return redirect()->route('pemasukan-admin')->with('success', 'Data Berhasil Dihapus!');
    }
}
