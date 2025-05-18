<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login admin
    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    // Menampilkan halaman login mahasiswa
    public function showMahasiswaLoginForm()
    {
        return view('mahasiswa.login');
    }

    // Proses login admin
    public function loginAdmin(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    // Cari user berdasarkan username
    $user = User::where('username', $credentials['username'])->where('status', 'admin')->first();

    if (!$user) {
        return back()->withErrors(['username' => 'User tidak ditemukan']);
    }

    // Cek apakah password sama tanpa hash
    if ($user->password === $credentials['password']) {
        Auth::login($user);
        return redirect()->route('admin.dashboard');
    }

return redirect()->back()->with('error', 'Username atau password salah.');
}

public function loginMahasiswa(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    // Cari user berdasarkan username
    $user = User::where('username', $credentials['username'])->where('status', 'mahasiswa')->first();

    if (!$user) {
        return back()->withErrors(['username' => 'User tidak ditemukan']);
    }

    // Cek apakah password sama tanpa hash
    if ($user->password === $credentials['password']) {
        Auth::login($user);
        return redirect()->route('mahasiswa.dashboard');
    }
return redirect()->back()->with('error', 'Username atau password salah.');
}
}