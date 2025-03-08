<?php

namespace App\Http\Controllers;

use App\Models\dataKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DataKelasController extends Controller
{
    public function index() {
        $response = Http::get('http://localhost:8080/kelas');

        if ($response->successful()) {
            $kelas = collect($response->json())->sortBy('id_kelas')->values();
            return view('admin.dataKelas', compact('kelas'));
        } else {
            return back()->with('error', 'Gagal mengambil data kelas');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
