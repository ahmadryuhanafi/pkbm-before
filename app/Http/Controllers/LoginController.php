<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\support\facades\Auth;

class LoginController extends Controller
{
    public function index() 
    {
        return view('login');
    }

    public function authenticate(Request $request) 
    {
        // validasi inputan login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // jika berhasil login, akan masuk ke halaman dashboard admin
        if (Auth::attempt($credentials)) {
            // sesi login terdata
            $request->session()->regenerate();
            return redirect()->intended('/data');
        } else {
            // jika gagal login, akan mengirim pesan gagal
            return redirect()->back()->with('error', 'Gagal login! Silahkan cek email dan password anda!');
        }

    }

    public function logout(Request $request)
    {
        // proses logout
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        // kembali ke halaman login
        return redirect('/');
    }
}
