<?php

namespace App\Http\Controllers\Owner;

use App\Models\Mitra;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class PemasukanOwnerController extends Controller
{
    public function dataTables(Request $request)
    {
        if ($request->ajax()) {

            // Mengambil semua data pemasukan dari database
            $pemasukan = Pemasukan::all();

            // var_dump($pemasukan);
            // die();

            return datatables()->of($pemasukan)
                ->addColumn('action', function ($data) {
                    // $button = '<a href="#" class="menu-link px-1 edit-row" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_data" data-id="' . $data->id_pemasukan . '"><i class="fas fa-edit text-warning"></i></a>';
                    // $button .= '<a href="" class="menu-link px-1 show-row" data-bs-toggle="modal" data-bs-target="#kt_modal_show_data" data-id="' . $data->id_pemasukan . '"><i class="fas fa-eye text-success"></i></a>';
                    $button = '<a href="' . URL::route('show-pemasukan-owner', ['id' => $data->id_pemasukan]) . '" class="menu-link px-1 show-row"><i class="fas fa-eye text-success"></i></a>';
                    // $button .= '<form action="' . URL::route('delete-pemasukan-owner', ['id' => $data->id_pemasukan]) . '" method="POST" style="display:inline;">';
                    // $button .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                    // $button .= '<button type="submit" class="menu-link px-1" data-kt-users-table-filter="delete_row" style="border:none; background:none; padding:0; cursor:pointer;"><i class="fas fa-trash-alt text-danger"></i></button>';
                    // $button .= '</form>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('owner.pemasukan-owner', [
            'title' => 'Pemasukan Owner'
        ]);
    }

    
    //fungsi view pemasukan owner
    public function index()
    {
        $pemasukan = Pemasukan::with(['detail', 'detail.mitra'])->get();
        //get data mitra untuk isian form input nama mitra
        $mitra = Mitra::all();


        return view(
            'owner.pemasukan-owner',
            [
                'title' => 'Pemasukan Owner',
                'pemasukan' => $pemasukan,
                'mitra' => $mitra
            ]
        );
    }

    //fung create pemasukan owner
    public function create()
    {
        return view(
            'owner.create-pemasukan-owner',
            [
                'title' => 'Pemasukan Owner'
            ]
        );
    }

    //fungsi show pemasukan dan detail pemasukannya
    public function show(Request $request)
    {
        $id = $request->id;
        $pemasukan = Pemasukan::with('detail')->find($id);
    
        return view('owner.show-pemasukan-owner', [
            'title' => 'Pemasukan Owner',
            'pemasukan' => $pemasukan
        ], compact('pemasukan'));
    }

    public function store(Request $request)
    {
        // Ambil id user yang sedang login
        $user_id = auth()->user()->id_user;

        $total_harga = 0;
        foreach ($request->detail as $detail) {
            $total_harga += floatval(str_replace(['.', 'Rp '], '', $detail['subtotal']));
        }

        // Buat objek pemasukan baru
        $pemasukan = Pemasukan::create([
            'tgl_pemasukan' => $request->tgl_pemasukan,
            'id_user' => $user_id,
            'nama_perusahaan' => $request->nama_perusahaan,
            'total_harga' => $total_harga
            
        ]);

        // Tambahkan detail pemasukan
        foreach ($request->detail as $detail) {
            $pemasukan->detail()->create([
                'jenis_pemasukan' => '-',
                'nama_barang_masuk' => $detail['nama_barang_masuk'],
                'jumlah_barang_masuk' => $detail['jumlah_barang_masuk'],
                'harga_barang_masuk' => floatval(str_replace(['.', 'Rp '], '', $detail['harga_barang_masuk'])),
                'saldo' => $detail['saldo'],
                'bayar' => $detail['bayar'],
                'keterangan' => $detail['keterangan'],
                'subtotal' => floatval(str_replace(['.', 'Rp '], '', $detail['subtotal'])),
            ]);
        }

        //redirect ke halaman utama dan menampilkan sweetalert
        return redirect()->route('pemasukan-owner')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $pemasukan = Pemasukan::with('detail')->find($id);
        return response()->json($pemasukan);
    }

    //fungsi update pemasukan owner  dengan menggunakan ajax
    public function update(Request $request)
    {
        $id = $request->id_pemasukan_edit;   //dapatkan id dari data yang akan diubah
        // Temukan pemasukan berdasarkan ID dan 
        $pemasukan = Pemasukan::with('detail')->find($id);

        // Hitung total harga dari semua detail pemasukan
        $total_harga = 0;
        foreach ($request->detail as $detail) {
            $total_harga += floatval(str_replace(['.', 'Rp '], '', $detail['subtotal_edit']));
        }

        // Perbarui tanggal pemasukan
        $pemasukan->tgl_pemasukan = $request->tgl_pemasukan_edit;
        $pemasukan->nama_perusahaan = $request->nama_perusahaan_edit;
        $pemasukan->id_user = auth()->user()->id_user;  // Untuk menyimpan id user yang sedang login
        $pemasukan->total_harga = $total_harga;
        $pemasukan->save();

        // Hapus detail pemasukan terkait
        $pemasukan->detail()->delete();

        // Tambahkan detail pemasukan baru dari input form
        foreach ($request->detail as $detail) {
            $pemasukan->detail()->create([
                'jenis_pemasukan' => '-',
                'nama_barang_masuk' => $detail['nama_barang_masuk_edit'],
                'jumlah_barang_masuk' => $detail['jumlah_barang_masuk_edit'],
                'harga_barang_masuk' => floatval(str_replace(['.', 'Rp '], '', $detail['harga_barang_masuk_edit'])),
                'saldo' => $detail['saldo_edit'],
                'bayar' => $detail['bayar_edit'],
                'keterangan' => $detail['keterangan_edit'],
                'subtotal' => floatval(str_replace(['.', 'Rp '], '', $detail['subtotal_edit']))
            ]);
        }

        // Redirect kembali ke halaman pemasukan-owner setelah update berhasil
        return redirect()->route('pemasukan-owner')->with('success', 'Data Berhasil Diubah!');
    }

    public function delete($id)
    {
        $pemasukan = Pemasukan::with('detail')->find($id);
        $pemasukan->detail()->delete();
        $pemasukan->delete();

        return redirect()->route('pemasukan-owner')->with('success', 'Data Berhasil Dihapus!');
    }
}
