<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\DetailPengeluaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PengeluaranAdminController extends Controller
{
    public function getDataTables(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengeluaran::select([
                'pengeluaran.id_pengeluaran',
                'pengeluaran.tgl_pengeluaran',
                'pengeluaran.total_harga',
                DB::raw('GROUP_CONCAT(detail_pengeluaran.nama_barang_keluar SEPARATOR ", ") as nama_barang_keluar'),
                DB::raw('GROUP_CONCAT(detail_pengeluaran.jumlah_barang_keluar SEPARATOR ", ") as jumlah_barang_keluar'),
                DB::raw('GROUP_CONCAT(detail_pengeluaran.harga_satuan SEPARATOR ", ") as harga_satuan'),
                DB::raw('GROUP_CONCAT(detail_pengeluaran.subtotal SEPARATOR ", ") as subtotal')
            ])
                ->leftJoin('detail_pengeluaran', 'pengeluaran.id_pengeluaran', '=', 'detail_pengeluaran.id_pengeluaran')
                ->groupBy(
                    'pengeluaran.id_pengeluaran',
                    'pengeluaran.tgl_pengeluaran',
                    'pengeluaran.total_harga'
                );

            return Datatables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" class="menu-link px-1 edit-row" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_data" data-id="' . $data->id_pengeluaran . '"><i class="fas fa-edit text-warning"></i></a>';
                    // $button .= '<a href="" class="menu-link px-1 show-row" data-bs-toggle="modal" data-bs-target="#kt_modal_show_data" data-id="' . $data->id_pengeluaran . '"><i class="fas fa-eye text-success"></i></a>';
                    $button .= '<a href="' . URL::route('show-pengeluaran-admin', ['id' => $data->id_pengeluaran]) . '" class="menu-link px-1 show-row"><i class="fas fa-eye text-success"></i></a>';
                    $button .= '<form action="' . URL::route('delete-pengeluaran-admin', ['id' => $data->id_pengeluaran]) . '" method="POST" style="display:inline;">';
                    $button .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                    $button .= '<button type="submit" class="menu-link px-1" data-kt-users-table-filter="delete_row" style="border:none; background:none; padding:0; cursor:pointer;"><i class="fas fa-trash-alt text-danger"></i></button>';
                    $button .= '</form>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && $request->input('search.value') != '') {
                        $search = $request->input('search.value');
                        $query->havingRaw("LOWER(GROUP_CONCAT(detail_pengeluaran.nama_barang_keluar SEPARATOR ', ')) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(GROUP_CONCAT(detail_pengeluaran.jumlah_barang_keluar SEPARATOR ', ')) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(GROUP_CONCAT(detail_pengeluaran.harga_satuan SEPARATOR ', ')) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(GROUP_CONCAT(detail_pengeluaran.subtotal SEPARATOR ', ')) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(pengeluaran.tgl_pengeluaran) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(pengeluaran.total_harga) LIKE ?", ["%{$search}%"]);
                    }
                })
                ->make(true);
        }

        return view(
            'admin.pengeluaran-admin',
            [
                'title' => 'Pengeluaran Admin'
            ]
        );
    }

    // Fungsi index
    // public function index(Request $request)
    // {
    //     $searchQuery = $request->query('q');

    //     $pengeluaran = Pengeluaran::with('detail');

    //     // Jika terdapat query pencarian, tambahkan kondisi pencarian
    //     if ($searchQuery) {
    //         $pengeluaran->whereHas('detail', function ($query) use ($searchQuery) {
    //             $query->where('nama_barang_keluar', 'like', '%' . $searchQuery . '%');
    //             // $query->orWhere('tgl_pengeluaran', 'like', '%' . $searchQuery . '%');
    //             $query->orWhere('jumlah_barang_keluar', 'like', '%' . $searchQuery . '%');
    //         });
    //     }

    //     // Ambil data pengeluaran sesuai dengan kondisi yang telah ditambahkan
    //     $pengeluaran = $pengeluaran->get();


    //     return view(
    //         'admin.pengeluaran-admin',
    //         [
    //             'title' => 'Pengeluaran Admin',
    //             'pengeluaran' => $pengeluaran
    //         ]
    //     );
    // }

    //fungsi show pengeluaran dan detail pengeluarannya
    public function show(Request $request)
    {
        $id = $request->id;
        $pengeluaran = Pengeluaran::with('detail', 'user')->find($id);

        return view('admin.show-pengeluaran-admin', [
            'title' => 'Pengeluaran Admin',
            'pengeluaran' => $pengeluaran
        ], compact('pengeluaran'));
    }

    public function printShow(Request $request)
    {
        $id = $request->id;
        $pengeluaran = Pengeluaran::with('detail', 'user')->find($id);

        return view('admin.show-pengeluaran-admin-print', [
            'title' => 'Pengeluaran Admin',
            'pengeluaran' => $pengeluaran
        ], compact('pengeluaran'));
    }

    // Fungsi create pengeluaran admin
    public function create()
    {
        return view(
            'admin.create-pengeluaran-admin',
            [
                'title' => 'Pengeluaran Admin'
            ]
        );
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'tgl_pengeluaran' => 'required',
            'detail.*.nama_barang_keluar' => 'required',
            'detail.*.jumlah_barang_keluar' => 'required|numeric',
            'detail.*.harga_satuan' => 'required|numeric',
            'detail.*.subtotal' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

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

        // Hitung total harga dari semua detail pengeluaran


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
        return redirect()->route('pengeluaran-admin')->with('success', 'Data Berhasil Ditambahkan!');
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
        // $pengeluaran->id_user = auth()->user()->id_user;  // Untuk menyimpan id user yang sedang login
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
        return redirect()->route('pengeluaran-admin')->with('success', 'Data Berhasil Diubah!');
    }

    public function delete($id)
    {
        $pengeluaran = Pengeluaran::with('detail')->find($id);
        $pengeluaran->detail()->delete();
        $pengeluaran->delete();

        return redirect()->route('pengeluaran-admin')->with('success', 'Data Berhasil Dihapus!');
    }

    
}
