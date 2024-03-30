<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //fungsi login
    public function login()
    {
        return view('auth.login',[
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

        if(Auth::attempt($request->only('email', 'password'))){
            
            //cek user aktif
            if(Auth::user()->is_aktif == 1){

               //cek role
                if(Auth::user()->role == 'admin'){
                    return redirect()->route('dashboard-admin');     
                }else{                   
                    return redirect()->route('dashboard-owner');                    
                }

            }else{
                Auth::logout();
                return redirect('/login')->with('error', 'Akun anda tidak aktif, Silahkan hubungi admin!');
            }
        }else{
            return redirect('/login')->with('error', 'Email atau Password Salah!');
        }

    }

    //fungsi logout
    public function logout()
    {
        Auth::logout();
        //session
        Session::flush(); //flush itu session apa? 
        return redirect('/login');
    }

    //fungsi lupa password
    public function forgotPassword(){
        return view('auth.forgot-password',[
            'title' => 'Forgot Password',
            'active' => 'forgot-password'
        ]);
    }

    //simpan data yang diinputkan ke database table users menggunakan fungsi updateOrCreate dari model User, dan menyimpan data email dan token ke dalam variabel $data
    //simpan data yang dikirimkan ke email user menggunakan fungsi sendEmailForgotPassword dari model User
    public function submitForgotPassword(Request $request){
        $data = User::updateOrCreate(
            ['email' => $request->email],
            ['token' => base64_encode($request->email)]
        );

        if($data){
            $data->sendEmailForgotPassword();
            return redirect('/forgot-password')->with('status', 'Link reset password sudah dikirim ke email anda');
        }else{
            return redirect('/forgot-password')->with('status', 'Email tidak terdaftar');
        }
    }
    
    //halaman reset password dengan parameter token
    public function resetPassword($token){
        $user = User::where('token', $token)->first();
        if($user){
            return view('auth.reset-password',[
                'title' => 'Reset Password',
                'active' => 'login',
                'user' => $user
            ]);
        }else{
            return redirect('/login')->with('status', 'Token tidak valid');
        }
    }

    //validasi inputan di halaman reset password dan update password pada database jika berhasil
    public function processResetPassword(Request $request, $token){
        $this->validate($request, [
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::where('token', $token)->first();
        if($user){
            $user->update([
                'password' => bcrypt($request->password),
                'token' => null
            ]);

            return redirect('/login')->with('status', 'Password berhasil direset');
        }else{
            return redirect('/login')->with('status', 'Token tidak valid');
        }
    }
   
}
