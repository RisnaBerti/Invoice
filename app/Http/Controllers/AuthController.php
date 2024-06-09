<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //fungsi login
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    //fungsi login-action
    public function loginAction(Request $request)
    {
        //validasi
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            //cek user aktif
            if (Auth::user()->is_aktif == 1) {

                //cek role
                if (Auth::user()->id_role == 2) {
                    return redirect()->route('dashboard-admin');
                } else {
                    return redirect()->route('dashboard-owner');
                }
            } else {
                Auth::logout();
                return redirect('/login')->with('error', 'Akun anda tidak aktif, Silahkan hubungi admin!');
            }
        } else {
            return redirect('/login')->with('error', 'Email atau Password Salah!');
        }
    }

    //fungsi logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); //flush itu session apa? 
        return redirect('/login');
    }

    //fungsi lupa password
    public function forgotPassword()
    {
        return view('auth.lupa-password', [
            'title' => 'Forgot Password',
            'active' => 'forgot-password'
        ]);
    }

    //simpan data yang diinputkan ke database table users menggunakan fungsi updateOrCreate dari model User, dan menyimpan data email dan token ke dalam variabel $data
    //simpan data yang dikirimkan ke email user menggunakan fungsi sendEmailForgotPassword dari model User
    public function submitForgotPassword(Request $request)
    {
        //validasi form lupa password
        $request->validate([
            'email' => 'required|email'
        ]);

        //generate token
        $token = Str::random(60);

        //insert ke tabel password_resets
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        //mengirim link reset password ke email
        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return back()->with('success', 'Link reset password sudah dikirim ke email anda!');

        // if ($data) {
        //     $data->sendEmailForgotPassword();
        //     return redirect('/forgot-password')->with('status', 'Link reset password sudah dikirim ke email anda');
        // } else {
        //     return redirect('/forgot-password')->with('status', 'Email tidak terdaftar');
        // }
    }

    //halaman reset password dengan parameter token
    public function resetPassword($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    //validasi inputan di halaman reset password dan update password pada database jika berhasil
    public function processResetPassword(Request $request, $token)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $passwordReset = DB::table('password_reset_tokens')
            ->where('token', $token)
            ->first();

        if (!$passwordReset) {
            return back()->withErrors(['token' => 'This password reset token is invalid.']);
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'We can\'t find a user with that e-mail address.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus token setelah digunakan
        DB::table('password_reset_tokens')->where('email', $user->email)->delete();

        return redirect('/login')->with('success', 'Your password has been changed!');
    }
}
