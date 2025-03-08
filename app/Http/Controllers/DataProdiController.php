<?php

namespace App\Http\Controllers;

use App\Models\dataProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DataProdiController extends Controller {
    public function index() {
        $response = Http::get('http://localhost:8080/prodi');

        if ($response->successful()) {
            $prodi = collect($response->json())->sortBy('kode_prodi')->values();
            return view('admin.dataProdi', compact('prodi'));
        } else {
            return back()->with('error', 'Gagal mengambil data prodi');
        }
    }
}