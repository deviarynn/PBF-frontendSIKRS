<?php

namespace App\Http\Controllers;

use App\Models\dataKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;



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
        // $request->validate([
        // 'nama_kelas' => 'required|string|max:10',
        // ], [
        //     'nama_kelas.required' => 'Nama Kelas wajib diisi.',
        //     'nama_kelas.max' => 'Tidak boleh lebih dari 10 karakter.',
        // ]);
        // $existingKelas = DB::table('kelas')->where('nama_kelas', $request->nama_kelas)->first();

        // if ($existingKelas) {
        //     return back()->withErrors(['id_kelas' => 'Data Nama Kelas sudah ada .'])->withInput();
        // }

        $response = Http::asForm()->post('http://localhost:8080/kelas', [
            'nama_kelas' => $request->nama_kelas,
        ]);

        if ($response->successful()) {
            return redirect()->route('admin.dataKelas')->with('success', 'Data berhasil disimpan!');
        } elseif ($response->status() === 409) {
            return back()->withErrors(['nama_kelas' => 'Nama kelas sudah ada.'])->withInput();
        } else {
            return back()->withErrors(['nama_kelas' => 'Gagal menyimpan data, nama kelas sudah ada.'])->withInput();
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
    public function edit($id_kelas)
{
    $response = Http::get("http://localhost:8080/kelas/{$id_kelas}");

    if ($response->successful() && !empty($response[0])) {
        $kelas = $response[0]; // karena CodeIgniter mengembalikan array berisi 1 data
        return view('admin.editKelas', compact('kelas'));
    } else {
        return back()->with('error', 'Gagal mengambil data kelas');
    }
}

public function update(Request $request, $id_kelas)
{
    $request->validate([
        'nama_kelas' => 'required|string|max:10',
    ]);

    $response = Http::asForm()->put("http://localhost:8080/kelas/{$id_kelas}", [
        'nama_kelas' => $request->nama_kelas,
    ]);

    if ($response->successful()) {
        return redirect('/admin/dataKelas')->with('success', 'Data berhasil diubah!');
    } else {
        return back()->with('error', 'Gagal mengubah data.');
    }
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
