<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MitraController extends Controller
{
    public function index()
    {
        $mitra = Mitra::all();

        return view('owner.mitra-owner',
            [
                'title' => 'Mitra owner',
                'mitra' => $mitra
            ]
        );
    }

    //fung create mitra owner
    public function create()
    {

        return view('owner.create-mitra-owner',
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

        // if ($request->file('gambar')) {
        //     $file = $request->file('gambar');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move('uploads/mitra/', $filename);
        //     $data->gambar = $filename;
        // } else {
        //     $data->gambar = $data->gambar;
        // }

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
