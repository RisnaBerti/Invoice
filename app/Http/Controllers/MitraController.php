<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class MitraController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            // Mengambil semua data mitra dari database
            $mitra = Mitra::all();

            // var_dump($mitra);
            // die();

            return datatables()->of($mitra)
                // ->addColumn('action', function ($data) {
                //     $button = '<a href="#" class="menu-link px-1 edit-row" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_data" data-id="' . $data->id_mitra . '"><i class="fas fa-edit text-warning"></i></a>';
                //     $button .= '<a href="" class="menu-link px-1 show-row" data-bs-toggle="modal" data-bs-target="#kt_modal_show_data" data-id="' . $data->id_mitra . '"><i class="fas fa-eye text-success"></i></a>';
                //     $button .= '<a href="' . URL::route('show-mitra-owner', ['id' => $data->id_mitra]) . '" class="menu-link px-1 show-row"><i class="fas fa-eye text-success"></i></a>';
                //     $button .= '<form action="' . URL::route('delete-mitra-owner', ['id' => $data->id_mitra]) . '" method="POST" style="display:inline;">';
                //     $button .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                //     $button .= '<button type="submit" class="menu-link px-1" data-kt-users-table-filter="delete_row" style="border:none; background:none; padding:0; cursor:pointer;"><i class="fas fa-trash-alt text-danger"></i></button>';
                //     $button .= '</form>';
                //     return $button;
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }

        $title = 'Hapus Data!';
        $text = "Apakah Anda yakin ingin menghapus nya?";
        confirmDelete($title, $text);

        return view('owner.mitra-owner', [
            'title' => 'Mitra Owner'
        ]);
    }

    //fung create mitra owner
    public function create()
    {

        return view(
            'owner.create-mitra-owner',
            [
                'title' => 'Mitra owner'
            ]
        );
    }

    //fungsi store owner
    public function store(Request $request)
    {
        $mitra = new Mitra();
        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->alamat_mitra = $request->alamat_mitra;
        $mitra->no_telp_mitra = $request->no_telp_mitra;
        $mitra->email_mitra = $request->email_mitra;
        $mitra->jenis_mitra = $request->jenis_mitra;
        $mitra->save();

        return redirect()->route('mitra-owner')->with('success', 'Data Berhasil Ditambahkan!');
    }

    //fungsi edit mitra owner
    public function edit($id)
    {
        $mitra = Mitra::find($id);

        //retrun data json mitra
        return response()->json($mitra);
    }

    // fungsi update data mitra owner
    public function update(Request $request)
    {
        $id = $request->id_mitra_edit;
        $mitra = Mitra::where('id_mitra', $id)->first();

        // $validated = $request->validate([
        //     'nama_mitra' => 'required',
        //     'alamat_mitra' => 'required',
        //     'no_telp_mitra' => 'required|number',
        //     'email_mitra' => 'required|email',
        //     'jenis_mitra' => 'required'
        // ]);

        $mitra->nama_mitra = $request->nama_mitra_edit;
        $mitra->alamat_mitra = $request->alamat_mitra_edit;
        $mitra->no_telp_mitra = $request->no_telp_mitra_edit;
        $mitra->email_mitra = $request->email_mitra_edit;
        $mitra->jenis_mitra = $request->jenis_mitra_edit;
        $mitra->save();

        return redirect()->route('mitra-owner')->with('success', 'Data Berhasil di edit!');
    }

    //fungsi hapus data mitra owner
    public function delete($id)
    {
        $mitra = Mitra::find($id);
        $mitra->delete();

        return redirect()->route('mitra-owner');
    }
}
