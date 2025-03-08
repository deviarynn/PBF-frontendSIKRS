<?php

namespace App\Http\Controllers;

use App\Models\dataMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DataMahasiswaController extends Controller {
    public function index() {
        $response = Http::get('http://localhost:8080/mahasiswa');

        if ($response->successful()) {
            $mahasiswa = collect($response->json())->sortBy('npm')->values();
            return view('admin.dataMhs', compact('mahasiswa'));
        } else {
            return back()->with('error', 'Gagal mengambil data mahasiswa');
        }
    }
}