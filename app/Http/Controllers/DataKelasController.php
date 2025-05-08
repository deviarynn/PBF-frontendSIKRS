<?php

namespace App\Http\Controllers;

use App\Models\dataKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session as FacadesSession;



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

    public function create()
    {
        return view('admin.tambahKelas');
    }
    /**
     * Store a newly created resource in storage.
     */
    // DataKelasController (di frontend project)
public function store(Request $request)
{
    $response = Http::post('http://localhost:8080/kelas', [
        'nama_kelas' => $request->nama_kelas,
    ]);
    
    if ($response->successful()) {
        return redirect()->route('kelas.index')->with('success', 'Data berhasil disimpan!');
    } else {
        return back()->withErrors('Gagal menyimpan data');
    }
    
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
    public function destroy($id_kelas)
    {
        $response = Http::delete("http://localhost:8080/kelas/{$id_kelas}");

        if ($response->successful()) {
            return redirect('/admin/dataKelas')->with('success', 'Kelas berhasil dihapus');
        } else {
            return back()->with('error', 'Gagal menghapus mata kuliah');
        }
    }
}
