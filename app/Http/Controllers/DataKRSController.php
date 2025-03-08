<?php

namespace App\Http\Controllers;

use App\Models\dataKRS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataKRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $response = Http::get('http://localhost:8080/krs');

        if ($response->successful()) {
            $krs = collect($response->json())->sortBy('id_krs')->values();
            return view('admin.dataKRS', compact('krs'));
        } else {
            return back()->with('error', 'Gagal mengambil data krs');
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
