<?php

namespace App\Http\Controllers;

use App\Models\dataProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


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
    public function create()
    {
        return view('admin.tambahProdi');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'kode_prodi' => 'required|string|max:8',
        'nama_prodi' => 'required|string|max:100',
        ], [
            'kode_prodi.required' => 'Kode Prodi wajib diisi.',
            'kode_prodi.max' => 'Kode Prodi tidak boleh lebih dari 8 karakter.',
            'nama_prodi.required' => 'Nama Prodi wajib diisi.',
        ]);
        $existingProdi = DB::table('prodi')->where('kode_prodi', $request->kode_prodi)->first();

        if ($existingProdi) {
            return back()->withErrors(['kode_prodi' => 'Data Kode Prodi sudah ada .'])->withInput();
        }

        $response = Http::asForm()->post('http://localhost:8080/prodi', [
            'kode_prodi' => $request->kode_prodi,
            'nama_prodi' => $request->nama_prodi,
        ]);
        
        if ($response->successful()) {
            return redirect()->route('admin.dataProdi')->with('success', 'Data berhasil disimpan!');
        } else {
            return back()->withErrors('Gagal menyimpan data');
        }
    }


    public function edit($kode_prodi)
    {
        $response = Http::get("http://localhost:8080/prodi/{$kode_prodi}");

        if ($response->successful() && !empty($response[0])) {
            $prodi = $response[0]; // karena CodeIgniter mengembalikan array berisi 1 data
            return view('admin.editProdi', compact('prodi'));
        } else {
            return back()->with('error', 'Gagal mengambil data prodi');
        }
    }

    public function update(Request $request, $kode_prodi)
    {
        // Ambil data dari form
        $nama_prodi = $request->nama_prodi;

        $response = Http::asForm()->put("http://localhost:8080/prodi/{$kode_prodi}", [
            'nama_prodi' => $request->nama_prodi,
        ]);

        if ($response->successful()) {
            return redirect('/admin/dataProdi')->with('success', 'Data berhasil diubah!');
        } else {
            return back()->with('error', 'Gagal mengubah data.');
        }
    }

    public function destroy($kode_prodi)
    {
        $response = Http::delete("http://localhost:8080/prodi/{$kode_prodi}");

        if ($response->successful()) {
            return redirect('/admin/dataProdi')->with('success', 'Prodi berhasil dihapus');
        } else {
            return back()->with('error', 'Gagal menghapus Prodi');
        }
    }

}
