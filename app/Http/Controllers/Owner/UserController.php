<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view(
            'owner.data-user',
            [
                'title' => 'User owner',
                'user' => $user
            ]
        );
    }

    //fung create user owner
    public function create()
    {

        return view(
            'owner.create-data-user',
            [
                'title' => 'User owner'
            ]
        );
    }

    //fungsi store owner
    public function store(Request $request)
    {
        //validasi data yang diinput o
        // $validated = $request->validate([
        //     'nama' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);
       
        $user = new User();
        $user->id_role = '2';
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->jabatan = 'Admin';
        $user->is_aktif = '1';
        $user->save();

        return redirect()->route('data-user')->with('success', 'Data Berhasil Ditambahkan!');
    }

    //fungsi edit user owner
    public function edit($id)
    {
        $user = User::find($id);

        //retrun data json user
        return response()->json($user);
    }

    // fungsi update data user owner
    public function update(Request $request)
    {
        $id = $request->id_mitra_edit;
        $user = User::where('id_mitra', $id)->first();

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
        //     $file->move('uploads/user/', $filename);
        //     $data->gambar = $filename;
        // } else {
        //     $data->gambar = $data->gambar;
        // }

        $user->nama_mitra = $request->nama_mitra_edit;
        $user->alamat_mitra = $request->alamat_mitra_edit;
        $user->no_telp_mitra = $request->no_telp_mitra_edit;
        $user->email_mitra = $request->email_mitra_edit;
        $user->jenis_mitra = $request->jenis_mitra_edit;
        $user->save();

        return redirect()->route('data-user')->with('success', 'Data Berhasil di edit!');
    }

    //fungsi hapus data user owner
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('data-user');
    }
}
