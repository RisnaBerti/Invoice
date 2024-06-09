<?php

namespace App\Http\Controllers\Owner;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->query('q');

        // Mulai dengan membangun kueri menggunakan model User
        $query = User::query();

        // Jika terdapat query pencarian, tambahkan kondisi pencarian
        if ($searchQuery) {
            $query->where('nama', 'like', '%' . $searchQuery . '%')
                ->orWhere('email', 'like', '%' . $searchQuery . '%')
                ->orWhere('jabatan', 'like', '%' . $searchQuery . '%');
        }

        // Ambil data pengeluaran sesuai dengan kondisi yang telah ditambahkan
        $user = $query->get();

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
        $id = $request->id_user_edit;
        $user = User::where('id_user', $id)->first();

        $user->nama = $request->nama_edit;
        $user->email = $request->email_edit;
        $user->jabatan = $request->jabatan_edit;
        // $user->password = $request->password_edit;
        $user->save();

        // $validated = $request->validate([
        //     'nama_user' => 'required',
        //     'alamat_user' => 'required',
        //     'no_telp_user' => 'required|number',
        //     'email_user' => 'required|email',
        //     'jenis_user' => 'required'
        // ]);

        // if ($request->file('gambar')) {
        //     $file = $request->file('gambar');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move('uploads/user/', $filename);
        //     $data->gambar = $filename;
        // } else {
        //     $data->gambar = $data->gambar;
        // }

        // $user->nama_user = $request->nama_user_edit;
        // $user->alamat_user = $request->alamat_user_edit;
        // $user->no_telp_user = $request->no_telp_user_edit;
        // $user->email_user = $request->email_user_edit;
        // $user->jenis_user = $request->jenis_user_edit;


        return redirect()->route('data-user')->with('success', 'Data Berhasil di edit!');
    }

    //fungsi hapus data user owner
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('data-user');
    }

    //fungsi reset password user
    public function editDataUser($id)
    {

        $user = User::where('id_user', $id)->first();

        return view(
            'owner.edit-data-user',
            [
                'title' => 'Edit Profil Pengguna',
                'active' => 'Edit Profil Pengguna',
                'user' => $user,
            ]
        );
    }

    //fungsi reset password user
    // public function resetPassword(Request $request)
    // {
    //     $id = $request->id_user_reset;
    //     $user = User::where('id_user', $id)->first();

    //     $user->password = $request->password_reset;
    //     $user->save();

    //     return redirect()->route('data-user');
    // }

    //update profile user
    public function editAkunUser(Request $request)
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Validasi data
        $rules = [
            'nama' => ['required'],
            // 'email' => [
            //     'required',
            //     'email',
            //     Rule::unique('users', 'email')->ignore($user->id_user, 'id_user')
            // ]
        ];

        $customMessages = [
            'required' => 'Nama harus diisi!',
            'email' => 'Email tidak valid!',
            'unique' => 'Email telah digunakan!'
        ];

        $this->validate($request, $rules, $customMessages);

        // Update data pengguna
        $user->nama = $request->nama;
        // $user->email = $request->email;
        $user->jabatan = $request->jabatan;
        $user->save();

        return redirect()->back()->with('success', 'Data profil Anda berhasil diubah!');
    }


    public function gantiPasswordUser(Request $request)
    {
        // Validasi input
        $rules = [
            'passwordBaru' => 'required|between:8,16',
            'konfirmasiPasswordBaru' => 'required|same:passwordBaru'
        ];

        $customMessages = [
            'passwordBaru.required' => 'Password baru wajib diisi!',
            'passwordBaru.between' => 'Password harus terdiri dari 8 sampai dengan 16 karakter!',
            'konfirmasiPasswordBaru.required' => 'Konfirmasi password harus diisi!',
            'konfirmasiPasswordBaru.same' => 'Konfirmasi password tidak cocok dengan password baru!',
        ];

        $this->validate($request, $rules, $customMessages);

        // Update password baru
        User::where('id_user', Auth::user()->id_user)->update([
            'password' => bcrypt($request->passwordBaru)
        ]);

        return redirect()->back()->with("success", "Password berhasil diganti");

        // // Cek apakah password lama sesuai
        // if (!Hash::check(Auth::user()->password)) {
        //     return back()->with("error", "Password lama yang dimasukkan salah!");
        // } else {
        // }
    }
}
