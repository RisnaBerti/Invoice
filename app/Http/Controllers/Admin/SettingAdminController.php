<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingAdminController extends Controller
{

    //fungsi index
    public function index()
    {
        //id yang sedang login
        $id = Auth::id();
        $user = User::where($id);
        return view(
            'admin.profile-admin',
            [
                'title' => 'Profil',
                'active' => 'Profil',
                'user' => $user
            ]
        );
    }

    //update profile user
    public function update(Request $request)
    {
        //validasi data
        $rules = [
            'nama' => ['required'],
            'email' => ['required', 'email:filter=TLD']
        ];

        $customMessages = [
            'required' => 'Nama harus diisi!',
            'email' => 'Email tidak valid!'
        ];

        $this->validate($request, $rules, $customMessages);

        //find id user berdasarkan email yg sudah ada
        $email = User::where('email', '!=', $request->email)->get('email');

        if ($email->contains('email', $request->email)) {

            return redirect()->back()->with('success', 'Email telah diggunakan');
        } else {
            //jika berhasil maka, proses simpan ke database
            Auth::user()->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'jabatan' => $request->jabatan
            ]);


            return redirect()->back()->with('success', 'Data profil Anda berhasil dirubah!');
        }
    }

    public function gantiPassword(Request $request)
    {
        // Validasi input
        $rules = [
            'passwordLama' => 'required',
            'passwordBaru' => 'required|between:8,16',
            'konfirmasiPasswordBaru' => 'required|same:passwordBaru'
        ];
    
        $customMessages = [
            'passwordLama.required' => 'Password lama wajib diisi!',
            'passwordBaru.required' => 'Password baru wajib diisi!',
            'passwordBaru.between' => 'Password harus terdiri dari 8 sampai dengan 16 karakter!',
            'konfirmasiPasswordBaru.required' => 'Konfirmasi password harus diisi!',
            'konfirmasiPasswordBaru.same' => 'Konfirmasi password tidak cocok dengan password baru!',
        ];
    
        $this->validate($request, $rules, $customMessages);
        
        // Cek apakah password lama sesuai
        if (!Hash::check($request->passwordLama, Auth::user()->password)) {
            return back()->with("error", "Password lama yang dimasukkan salah!");
        } else {
            // Update password baru
            User::where('id_user', Auth::user()->id_user)->update([
                'password' => bcrypt($request->passwordBaru)
            ]);
    
            return redirect()->back()->with("success", "Password berhasil diganti");
        }
    }
    
}
