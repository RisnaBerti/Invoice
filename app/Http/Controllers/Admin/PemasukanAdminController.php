<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mitra;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\DataTables\PemasukanDataTable;

class PemasukanAdminController extends Controller
{
    // public function index(PemasukanDataTable $dataTable)
    // {
    //     //vardump data dari pemasukandatatabl
    //     return $dataTable->render('admin.pemasukan-admin', [
    //                 'title' => 'Pemasukan Admin'
    //             ]);
    // }

    // public function dataTables(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $pemasukan = Pemasukan::with('detail')->get();
    //         $data = [];
    //         foreach ($pemasukan as $item) {
    //             $detail = $item->detail; // Ambil detail terkait dengan entri Pemasukan
    //             $data[] = [
    //                 'id_pemasukan' => $item->id_pemasukan,
    //                 'tgl_pemasukan' => $item->tgl_pemasukan,
    //                 'nama_perusahaan' => $item->nama_perusahaan,
    //                 // Anda dapat menambahkan kolom lain yang diperlukan di sini
    //                 'jenis_pemasukan' => $detail->jenis_pemasukan, // Contoh untuk kolom jenis_pemasukan
    //                 'nama_barang_masuk' => $detail->nama_barang_masuk, // Contoh untuk kolom nama_barang_masuk
    //                 // Tambahkan kolom detail lain yang diperlukan di sini
    //                 'action' => '<button type="button" name="edit" id="' . $item->id_pemasukan . '" class="edit btn btn-primary btn-sm">Edit</button>
    //                          <button type="button" name="delete" id="' . $item->id_pemasukan . '" class="delete btn btn-danger btn-sm">Delete</button>'
    //             ];
    //         }
    //         return response()->json(['data' => $data]);
    //     }

    //     return view('admin.pemasukan-admin', [
    //         'title' => 'Pemasukan Admin'
    //     ]);
    // }

    // public function dataTables(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $pemasukan = Pemasukan::with('detail')->get();
    //         $data = [];
    //         foreach ($pemasukan as $item) {
    //             $detail = $item->detail; // Ambil detail terkait dengan entri Pemasukan
    //             $data[] = [
    //                 'id_pemasukan' => $item->id_pemasukan,
    //                 'tgl_pemasukan' => $item->tgl_pemasukan,
    //                 'nama_perusahaan' => $item->nama_perusahaan,
    //                 // Anda dapat menambahkan kolom lain yang diperlukan di sini
    //                 'jenis_pemasukan' => $detail->jenis_pemasukan, // Contoh untuk kolom jenis_pemasukan
    //                 'nama_barang_masuk' => $detail->nama_barang_masuk, // Contoh untuk kolom nama_barang_masuk
    //                 'total_harga' => $item->total_harga,
    //                 // Tambahkan kolom detail lain yang diperlukan di sini
    //                 'action' => '<button type="button" name="edit" id="' . $item->id_pemasukan . '" class="edit btn btn-primary btn-sm">Edit</button>
    //                           <button type="button" name="delete" id="' . $item->id_pemasukan . '" class="delete btn btn-danger btn-sm">Delete</button>'
    //             ];
    //         }
    //         return DataTables::of($data)->addIndexColumn()->make(true);
    //     }

    //     return view('admin.pemasukan-admin', [
    //         'title' => 'Pemasukan Admin'
    //     ]);
    // }

    // public function dataTables(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $pemasukan = Pemasukan::with('detail')->get();
    //         return datatables()->of($pemasukan)
    //             ->addColumn('jenis_pemasukan', function ($data) {
    //                 // Ambil jenis_pemasukan dari detail_pemasukan terkait
    //                 return $data->detail->jenis_pemasukan;
    //             })
    //             ->addColumn('nama_barang_masuk', function ($data) {
    //                 // Ambil nama_barang_masuk dari detail_pemasukan terkait
    //                 return $data->detail->nama_barang_masuk;
    //             })
    //             ->addColumn('jumlah_barang_masuk', function ($data) {
    //                 // Ambil jumlah_barang_masuk dari detail_pemasukan terkait
    //                 return $data->detail->jumlah_barang_masuk;
    //             })
    //             ->addColumn('harga_barang_masuk', function ($data) {
    //                 // Ambil harga_barang_masuk dari detail_pemasukan terkait
    //                 return $data->detail->harga_barang_masuk;
    //             })
    //             ->addColumn('subtotal', function ($data) {
    //                 // Ambil subtotal dari detail_pemasukan terkait
    //                 return $data->detail->subtotal;
    //             })
    //             ->addColumn('action', function ($data) {
    //                 $button = '<button type="button" name="edit" id="' . $data->id_pemasukan . '" class="edit btn btn-primary btn-sm">Edit</button>';
    //                 $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="' . $data->id_pemasukan . '" class="delete btn btn-danger btn-sm">Delete</button>';
    //                 return $button;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     return view('admin.pemasukan-admin', [
    //         'title' => 'Pemasukan Admin'
    //     ]);
    // }


    public function dataTables(Request $request)
    {
        if ($request->ajax()) {

            // Mengambil semua data pemasukan dari database
            $pemasukan = Pemasukan::all();

            // var_dump($pemasukan);
            // die();

            return datatables()->of($pemasukan)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" class="menu-link px-1 edit-row" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_data" data-id="' . $data->id_pemasukan . '"><i class="fas fa-edit text-warning"></i></a>';
                    // $button .= '<a href="" class="menu-link px-1 show-row" data-bs-toggle="modal" data-bs-target="#kt_modal_show_data" data-id="' . $data->id_pemasukan . '"><i class="fas fa-eye text-success"></i></a>';
                    $button .= '<a href="' . URL::route('show-pemasukan-admin', ['id' => $data->id_pemasukan]) . '" class="menu-link px-1 show-row"><i class="fas fa-eye text-success"></i></a>';
                    $button .= '<form action="' . URL::route('delete-pemasukan-admin', ['id' => $data->id_pemasukan]) . '" method="POST" style="display:inline;">';
                    $button .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                    $button .= '<button type="submit" class="menu-link px-1" data-kt-users-table-filter="delete_row" style="border:none; background:none; padding:0; cursor:pointer;"><i class="fas fa-trash-alt text-danger"></i></button>';
                    $button .= '</form>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $title = 'Hapus Data!';
        $text = "Apakah Anda yakin ingin menghapus nya?";
        confirmDelete($title, $text);
        
        return view('admin.pemasukan-admin', [
            'title' => 'Pemasukan Admin'
        ]);
    }

    //fungsi show pemasukan dan detail pemasukannya
    public function show(Request $request)
    {
        $id = $request->id;
        $pemasukan = Pemasukan::with('detail')->find($id);
    
        return view('admin.show-pemasukan-admin', [
            'title' => 'Pemasukan Admin',
            'pemasukan' => $pemasukan
        ], compact('pemasukan'));
    }
        // ]);

    //fungsi view pemasukan admin
    public function index2()
    {
        $pemasukan = Pemasukan::with(['detail', 'detail.mitra'])->get();
        //get data mitra untuk isian form input nama mitra
        $mitra = Mitra::all();


        return view(
            'admin.pemasukan-admin',
            [
                'title' => 'Pemasukan Admin',
                'pemasukan' => $pemasukan,
                'mitra' => $mitra
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

        $total_harga = 0;
        foreach ($request->detail as $detail) {
            $total_harga += floatval(str_replace(['.', 'Rp '], '', $detail['subtotal']));
        }

        // Buat objek pemasukan baru
        $pemasukan = Pemasukan::create([
            'tgl_pemasukan' => $request->tgl_pemasukan,
            'id_user' => $user_id,
            'id_mitra' => $request->id_mitra,
            'nama_perusahaan' => $request->nama_perusahaan,
            'total_harga' => $total_harga,            
            'keterangan' => $request->keterangan

        ]);

        // Tambahkan detail pemasukan
        foreach ($request->detail as $detail) {
            $pemasukan->detail()->create([
                'id_produk' => $detail['id_produk'],
                'jumlah_barang_masuk' => $detail['jumlah_barang_masuk'],
                // 'harga_barang_masuk' => floatval(str_replace(['.', 'Rp '], '', $detail['harga_barang_masuk'])),
                'saldo' => $detail['saldo'],
                'bayar' => $detail['bayar'],
                'subtotal' => floatval(str_replace(['.', 'Rp '], '', $detail['subtotal']))
            ]);
        }

        //redirect ke halaman utama dan menampilkan sweetalert
        return redirect()->route('pemasukan-admin')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $pemasukan = Pemasukan::with('detail')->find($id);
        return response()->json($pemasukan);
    }

    //fungsi update pemasukan admin  dengan menggunakan ajax
    public function update(Request $request)
    {
        // $user_id = auth()->user()->id_user; 

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
        $pemasukan->id_mitra = $request->id_mitra_edit;
        $pemasukan->nama_perusahaan = $request->nama_perusahaan_edit;
        // $pemasukan->id_user = $user_id;  // Untuk menyimpan id user yang sedang login
        $pemasukan->total_harga = $total_harga;
        $pemasukan->keterangan = $request->keterangan_edit;
        $pemasukan->save();

        // Hapus detail pemasukan terkait
        $pemasukan->detail()->delete();

        // Tambahkan detail pemasukan baru dari input form
        foreach ($request->detail as $detail) {
            $pemasukan->detail()->create([
                'id_produk' => $detail['id_produk_edit'],
                // 'nama_barang_masuk' => $detail['nama_barang_masuk_edit'],
                'jumlah_barang_masuk' => $detail['jumlah_barang_masuk_edit'],
                // 'harga_barang_masuk' => floatval(str_replace(['.', 'Rp '], '', $detail['harga_barang_masuk_edit'])),
                'saldo' => $detail['saldo_edit'],
                'bayar' => $detail['bayar_edit'],
                'subtotal' => floatval(str_replace(['.', 'Rp '], '', $detail['subtotal_edit']))
            ]);
        }

        // Redirect kembali ke halaman pemasukan-admin setelah update berhasil
        return redirect()->route('pemasukan-admin')->with('success', 'Data Berhasil Diubah!');
    }

    public function delete($id)
    {
        $pemasukan = Pemasukan::with('detail')->find($id);
        $pemasukan->detail()->delete();
        $pemasukan->delete();

        return redirect()->route('pemasukan-admin')->with('success', 'Data Berhasil Dihapus!');
    }
}
