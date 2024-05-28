<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    //
    // public function index()
    // {
    //     $produk = Produk::all();

    //     return view(
    //         'owner.produk-owner',
    //         [
    //             'title' => 'Produk Owner',
    //             'produk' => $produk
    //         ]
    //     );
    // }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            // Mengambil semua data pemasukan dari database
            $pemasukan = Produk::all();

            // var_dump($pemasukan);
            // die();

            return datatables()->of($pemasukan)
                ->addColumn('action', function ($data) {
                    $button = '<a href="#" class="menu-link px-1 edit-row" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_data" data-id="' . $data->id_produk . '"><i class="fas fa-edit text-warning"></i></a>';
                    // $button .= '<a href="" class="menu-link px-1 show-row" data-bs-toggle="modal" data-bs-target="#kt_modal_show_data" data-id="' . $data->id_produk . '"><i class="fas fa-eye text-success"></i></a>';
                    // $button .= '<a href="' . URL::route('show-pemasukan-owner', ['id' => $data->id_produk]) . '" class="menu-link px-1 show-row"><i class="fas fa-eye text-success"></i></a>';
                    $button .= '<form action="' . URL::route('delete-pemasukan-owner', ['id' => $data->id_produk]) . '" method="POST" style="display:inline;">';
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

        return view('owner.produk-owner', [
            'title' => 'Produk Owner'
        ]);
    }

    //fung create produk owner
    public function create()
    {

        return view(
            'owner.create-produk-owner',
            [
                'title' => 'Produk owner'
            ]
        );
    }

    //fungsi store owner
    public function store(Request $request)
    {
        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = floatval(str_replace(['.', 'Rp '], '', $request->harga_produk));
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->save();

        return redirect()->route('produk-owner')->with('success', 'Data Berhasil Ditambahkan!');
    }

    //fungsi edit produk owner
    public function edit($id)
    {
        $produk = Produk::find($id);

        //retrun data json produk
        return response()->json($produk);
    }

    // fungsi update data produk owner
    public function update(Request $request)
    {
        $id = $request->id_produk_edit;
        $produk = Produk::where('id_produk', $id)->first();

        $produk->nama_produk = $request->nama_produk_edit;
        $produk->harga_produk = floatval(str_replace(['.', 'Rp '], '', $request->harga_produk_edit));
        $produk->deskripsi_produk = $request->deskripsi_produk_edit;
        $produk->save();

        return redirect()->route('produk-owner')->with('success', 'Data Berhasil di edit!');
    }

    //fungsi hapus data produk owner
    public function delete($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return redirect()->route('produk-owner');
    }
}
