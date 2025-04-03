<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardMahasiswa extends Controller
{
    public function dashboard()
    {
        return view('mahasiswa.dashboard');
    }
}
