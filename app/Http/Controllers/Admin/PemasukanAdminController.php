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
    public function getDataTables(Request $request)
    {
        if ($request->ajax()) {
            $data = Pemasukan::select([
                'pemasukan.id_pemasukan',
                'pemasukan.tgl_pemasukan',
                'mitra.nama_mitra',
                'pemasukan.total_harga',
                'pemasukan.keterangan',
                DB::raw('GROUP_CONCAT(detail_pemasukan.id_produk SEPARATOR ", ") as id_produk'),
                DB::raw('GROUP_CONCAT(produk.nama_produk SEPARATOR ", ") as nama_produk'),
                DB::raw('GROUP_CONCAT(detail_pemasukan.jumlah_barang_masuk SEPARATOR ", ") as jumlah_barang_masuk'),
                DB::raw('GROUP_CONCAT(detail_pemasukan.harga_barang_masuk SEPARATOR ", ") as harga_barang_masuk'),
                DB::raw('GROUP_CONCAT(detail_pemasukan.saldo SEPARATOR ", ") as saldo'),
                DB::raw('GROUP_CONCAT(detail_pemasukan.bayar SEPARATOR ", ") as bayar'),
                DB::raw('GROUP_CONCAT(detail_pemasukan.subtotal SEPARATOR ", ") as subtotal')
            ])
                ->leftJoin('detail_pemasukan', 'pemasukan.id_pemasukan', '=', 'detail_pemasukan.id_pemasukan')
                ->leftJoin('mitra', 'pemasukan.id_mitra', '=', 'mitra.id_mitra')
                ->leftJoin('produk', 'detail_pemasukan.id_produk', '=', 'produk.id_produk')
                ->groupBy(
                    'pemasukan.id_pemasukan',
                    'pemasukan.tgl_pemasukan',
                    'mitra.nama_mitra',
                    'pemasukan.total_harga',
                    'pemasukan.keterangan'
                );

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" class="menu-link px-1 edit-row" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_data" data-id="' . $data->id_pemasukan . '"><i class="fas fa-edit text-warning"></i></a>';
                    $button .= '<a href="' . URL::route('show-pemasukan-admin', ['id' => $data->id_pemasukan]) . '" class="menu-link px-1 show-row"><i class="fas fa-eye text-success"></i></a>';
                    $button .= '<form action="' . URL::route('delete-pemasukan-admin', ['id' => $data->id_pemasukan]) . '" method="POST" style="display:inline;">';
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
                        $query->havingRaw("LOWER(GROUP_CONCAT(detail_pemasukan.id_produk SEPARATOR ', ')) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(GROUP_CONCAT(produk.nama_produk SEPARATOR ', ')) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(GROUP_CONCAT(detail_pemasukan.jumlah_barang_masuk SEPARATOR ', ')) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(GROUP_CONCAT(detail_pemasukan.harga_barang_masuk SEPARATOR ', ')) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(GROUP_CONCAT(detail_pemasukan.saldo SEPARATOR ', ')) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(GROUP_CONCAT(detail_pemasukan.bayar SEPARATOR ', ')) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(GROUP_CONCAT(detail_pemasukan.subtotal SEPARATOR ', ')) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(pemasukan.tgl_pemasukan) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(mitra.nama_mitra) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(pemasukan.total_harga) LIKE ?", ["%{$search}%"])
                            ->orHavingRaw("LOWER(pemasukan.keterangan) LIKE ?", ["%{$search}%"]);
                    }
                })
                ->make(true);

            // return Datatables::of($data)
            //     ->addIndexColumn()
            //     ->make(true);
        }
        // get data mitra
        $query = "SELECT id_mitra, nama_mitra FROM mitra";
        $mitra = DB::select($query);

        $query2 = "SELECT id_produk, nama_produk, harga_produk FROM produk";
        $produk = DB::select($query2);

        return view(
            'admin.pemasukan-admin',
            [
                'title' => 'Pemasukan Admin',
                'mitra' => $mitra,
                'produk' => $produk
            ]
        );
    }
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
    //                 'id_mitra' => $item->id_mitra,
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
    //                 'id_mitra' => $item->id_mitra,
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


    // public function dataTables(Request $request)
    // {
    //     if ($request->ajax()) {

    //         // Mengambil semua data pemasukan dari database
    //         $pemasukan = Pemasukan::all();

    //         return datatables()->of($pemasukan)
    //             ->addColumn('action', function ($data) {
    //                 $button = '<a href="#" class="menu-link px-1 edit-row" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_data" data-id="' . $data->id_pemasukan . '"><i class="fas fa-edit text-warning"></i></a>';
    //                 // $button .= '<a href="" class="menu-link px-1 show-row" data-bs-toggle="modal" data-bs-target="#kt_modal_show_data" data-id="' . $data->id_pemasukan . '"><i class="fas fa-eye text-success"></i></a>';
    //                 $button .= '<a href="' . URL::route('show-pemasukan-admin', ['id' => $data->id_pemasukan]) . '" class="menu-link px-1 show-row"><i class="fas fa-eye text-success"></i></a>';
    //                 $button .= '<form action="' . URL::route('delete-pemasukan-admin', ['id' => $data->id_pemasukan]) . '" method="POST" style="display:inline;">';
    //                 $button .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    //                 $button .= '<button type="submit" class="menu-link px-1" data-kt-users-table-filter="delete_row" style="border:none; background:none; padding:0; cursor:pointer;"><i class="fas fa-trash-alt text-danger"></i></button>';
    //                 $button .= '</form>';
    //                 return $button;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     //get data mitra
    //     $query = "SELECT id_mitra, nama_mitra FROM mitra";
    //     $mitra = DB::select($query);

    //     $query2 = "SELECT id_produk, nama_produk, harga_produk FROM produk";
    //     $produk = DB::select($query2);


    //     $title = 'Hapus Data!';
    //     $text = "Apakah Anda yakin ingin menghapus nya?";
    //     confirmDelete($title, $text);

    //     return view('admin.pemasukan-admin', [
    //         'title' => 'Pemasukan Admin',
    //         'mitra' => $mitra,
    //         'produk' => $produk
    //     ]);
    // }

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
            'total_harga' => $total_harga,
            'keterangan' => $request->keterangan

        ]);

        // Tambahkan detail pemasukan
        foreach ($request->detail as $detail) {
            $pemasukan->detail()->create([
                'id_produk' => $detail['id_produk'],
                'jumlah_barang_masuk' => $detail['jumlah_barang_masuk'],
                'harga_barang_masuk' => floatval(str_replace(['.', 'Rp '], '', $detail['harga_barang_masuk'])),
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
        // Ambil data pemasukan dan detailnya
        $query = "SELECT pemasukan.*, detail_pemasukan.*, mitra.nama_mitra, mitra.id_mitra, produk.id_produk, produk.nama_produk, produk.harga_produk 
          FROM pemasukan 
          JOIN detail_pemasukan ON pemasukan.id_pemasukan = detail_pemasukan.id_pemasukan 
          JOIN mitra ON pemasukan.id_mitra = mitra.id_mitra 
          JOIN produk ON detail_pemasukan.id_produk = produk.id_produk 
          WHERE pemasukan.id_pemasukan = $id";

        $pemasukanResult = DB::select($query);

        if (empty($pemasukanResult)) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        // Strukturi ulang data pemasukan dan detailnya
        $pemasukan = [
            'id_pemasukan' => $pemasukanResult[0]->id_pemasukan,
            'tgl_pemasukan' => $pemasukanResult[0]->tgl_pemasukan,
            'id_mitra' => $pemasukanResult[0]->id_mitra,
            'keterangan' => $pemasukanResult[0]->keterangan,
            'detail' => []
        ];

        foreach ($pemasukanResult as $row) {
            $pemasukan['detail'][] = [
                'id_produk' => $row->id_produk,
                'jumlah_barang_masuk' => $row->jumlah_barang_masuk,
                'harga_barang_masuk' => $row->harga_barang_masuk,
                'subtotal' => $row->subtotal,
                'bayar' => $row->bayar,
                'saldo' => $row->saldo,
            ];
            if (isset($row->subtotal_edit)) {
                $detail['subtotal_edit'] = $row->subtotal_edit;
            }
        }

        // Ambil semua mitra untuk dropdown
        $allMitra = DB::table('mitra')->select('id_mitra', 'nama_mitra')->get();

        // Ambil semua produk untuk dropdown
        $allProduk = DB::table('produk')->select('id_produk', 'nama_produk', 'harga_produk')->get();


        return response()->json([
            'pemasukan' => $pemasukan,
            'all_mitra' => $allMitra,
            'all_produk' => $allProduk
        ]);
    }


    // public function edit($id)
    // {
    //     // Ambil data pemasukan dan detailnya
    //     $query = "SELECT pemasukan.*, detail_pemasukan.*, mitra.nama_mitra, mitra.id_mitra, produk.id_produk, produk.nama_produk, produk.harga_produk 
    //           FROM pemasukan 
    //           JOIN detail_pemasukan ON pemasukan.id_pemasukan = detail_pemasukan.id_pemasukan 
    //           JOIN mitra ON pemasukan.id_mitra = mitra.id_mitra 
    //           JOIN produk ON detail_pemasukan.id_produk = produk.id_produk 
    //           WHERE pemasukan.id_pemasukan = $id";

    //     $pemasukanResult = DB::select($query);

    //     if (empty($pemasukanResult)) {
    //         return response()->json(['error' => 'Data not found'], 404);
    //     }

    //     // Strukturi ulang data pemasukan dan detailnya
    //     $pemasukan = [
    //         'id_pemasukan' => $pemasukanResult[0]->id_pemasukan,
    //         'tgl_pemasukan' => $pemasukanResult[0]->tgl_pemasukan,
    //         'id_mitra' => $pemasukanResult[0]->id_mitra,
    //         'keterangan' => $pemasukanResult[0]->keterangan,
    //         'detail' => []
    //     ];

    //     foreach ($pemasukanResult as $row) {
    //         $pemasukan['detail'][] = [
    //             'id_produk' => $row->id_produk,
    //             'jumlah_barang_masuk' => $row->jumlah_barang_masuk,
    //             'harga_barang_masuk' => $row->harga_barang_masuk,
    //             'subtotal' => $row->subtotal,
    //             'bayar' => $row->bayar,
    //             'saldo' => $row->saldo,
    //         ];
    //     }

    //     // Ambil semua mitra untuk dropdown
    //     $allMitra = DB::table('mitra')->select('id_mitra', 'nama_mitra')->get();

    //     // Ambil semua produk untuk dropdown
    //     $allProduk = DB::table('produk')->select('id_produk', 'nama_produk', 'harga_produk')->get();


    //     return response()->json([
    //         'pemasukan' => $pemasukan,
    //         'all_mitra' => $allMitra,
    //         'all_produk' => $allProduk
    //     ]);
    // }

    public function update(Request $request)
    {
        $id = $request->id_pemasukan_edit;
        $pemasukan = Pemasukan::with('detail')->find($id);

        // Hitung total harga dari semua detail pemasukan
        $total_harga = 0;
        foreach ($request->detail as $detail) {
            $total_harga += floatval(str_replace(['.', 'Rp '], '', $detail['subtotal']));
        }

        // Perbarui tanggal pemasukan
        $pemasukan->tgl_pemasukan = $request->tgl_pemasukan_edit;
        $pemasukan->id_mitra = $request->id_mitra_edit;
        $pemasukan->total_harga = $total_harga;
        $pemasukan->keterangan = $request->keterangan_edit;
        $pemasukan->save();

        // Hapus detail pemasukan terkait
        $pemasukan->detail()->delete();

        // Tambahkan detail pemasukan baru dari input form
        foreach ($request->detail as $detail) {
            $pemasukan->detail()->create([
                'id_produk' => $detail['id_produk'],
                'jumlah_barang_masuk' => $detail['jumlah_barang_masuk'],
                'harga_barang_masuk' => floatval(str_replace(['.', 'Rp '], '', $detail['harga_barang_masuk'])),
                'saldo' => $detail['saldo'],
                'bayar' => $detail['bayar'],
                'subtotal' => floatval(str_replace(['.', 'Rp '], '', $detail['subtotal']))
            ]);
        }

        // Redirect kembali ke halaman pemasukan-admin setelah update berhasil
        return redirect()->route('pemasukan-admin')->with('success', 'Data Berhasil Diubah!');
    }


    //fungsi update pemasukan admin  dengan menggunakan ajax
    // public function update(Request $request)
    // {
    //     // $user_id = auth()->user()->id_user; 

    //     $id = $request->id_pemasukan_edit;   //dapatkan id dari data yang akan diubah
    //     // Temukan pemasukan berdasarkan ID dan 
    //     $pemasukan = Pemasukan::with('detail')->find($id);

    //     // Hitung total harga dari semua detail pemasukan
    //     $total_harga = 0;
    //     foreach ($request->detail as $detail) {
    //         $total_harga += floatval(str_replace(['.', 'Rp '], '', $detail['subtotal_edit']));
    //     }

    //     // Perbarui tanggal pemasukan
    //     $pemasukan->tgl_pemasukan = $request->tgl_pemasukan_edit;
    //     $pemasukan->id_mitra = $request->id_mitra_edit;
    //     // $pemasukan->id_user = $user_id;  // Untuk menyimpan id user yang sedang login
    //     $pemasukan->total_harga = $total_harga;
    //     $pemasukan->keterangan = $request->keterangan_edit;
    //     $pemasukan->save();

    //     // Hapus detail pemasukan terkait
    //     $pemasukan->detail()->delete();

    //     // Tambahkan detail pemasukan baru dari input form
    //     foreach ($request->detail as $detail) {
    //         $subtotal = floatval(str_replace(['.', 'Rp '], '', $detail['subtotal_edit']));
    //         $harga_barang_masuk = floatval(str_replace(['.', 'Rp '], '', $detail['harga_barang_masuk_edit']));

    //         $pemasukan->detail()->create([
    //             'id_produk' => $detail['id_produk_edit'],
    //             // 'nama_barang_masuk' => $detail['nama_barang_masuk_edit'],
    //             'jumlah_barang_masuk' => $detail['jumlah_barang_masuk_edit'],
    //             'harga_barang_masuk' => $harga_barang_masuk,
    //             'saldo' => $detail['saldo_edit'],
    //             'bayar' => $detail['bayar_edit'],
    //             'subtotal' => $subtotal
    //         ]);

    //         $total_harga += $subtotal;
    //     }

    //     // Redirect kembali ke halaman pemasukan-admin setelah update berhasil
    //     return redirect()->route('pemasukan-admin')->with('success', 'Data Berhasil Diubah!');
    // }

    public function delete($id)
    {
        $pemasukan = Pemasukan::with('detail')->find($id);
        $pemasukan->detail()->delete();
        $pemasukan->delete();

        return redirect()->route('pemasukan-admin')->with('success', 'Data Berhasil Dihapus!');
    }
}
