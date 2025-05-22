<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil user dari DB
        $user = User::where('username', $credentials['username'])->first();

        // Cek user ditemukan
        if (!$user) {
            return back()->withErrors(['username' => 'Username tidak ditemukan']);
        }

        if ($credentials['password'] !== $user->password) {
            return back()->withErrors(['password' => 'Password salah']);
        }

        // Simpan user ke session
        Session::put('user', $user);

        // Redirect sesuai status
        if ($user->status === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->status === 'mahasiswa') {
            return redirect()->route('mahasiswa.dashboard');
        } else {
            return redirect()->route('login')->withErrors(['status' => 'Status tidak dikenal']);
        }
    }

    // Logout
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login')->with('message', 'Logout berhasil');
    }
}
