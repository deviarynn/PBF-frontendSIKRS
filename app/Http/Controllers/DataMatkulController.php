<?php

namespace App\Http\Controllers;

use App\Models\dataMatkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session as FacadesSession;

class DataMatkulController extends Controller
{
    /**
     * Menampilkan data matkul
     */
    public function index()
    {
        $response = Http::get('http://localhost:8080/matkul');

        if ($response->successful()) {
            $matkul = collect($response->json())->sortBy('kode_matkul')->values();
            return view('admin.dataMatkul', compact('matkul'));
        } else {
            return back()->with('error', 'Gagal mengambil data matkul');
        }
    }

    public function create()
    {
        return view('admin.tambahMatkul');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        FacadesSession::flash('kode_matkul', $request->kode_matkul);
        FacadesSession::flash('nama_matkul', $request->nama_matkul);
        FacadesSession::flash('sks', $request->sks);
        FacadesSession::flash('semester', $request->semester);




        $request->validate([
            'kode_matkul' => 'required|unique:matkul,kode_matkul',
            'nama_matkul' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
        ],[
            'kode_matkul.required' => 'kode matkul wajib diisi',
            'kode_matkul.unique' => 'kode matkul sudah ada di database',
            'nama_matkul.required' => 'nama matkul wajib diisi',
            'sks.required' => 'sks wajib diisi',
            'sks.integer' => 'sks harus berupa angka',
            'semester.required' => 'semester wajib diisi',
            'semester.integer' => 'semester harus berupa angka',
        ]);

        $data =[
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ];
    //    
    dataMatkul::create($data);
    return redirect()->to('admin/dataMatkul')->with('Success', 'Berhasil menambahkan data!');
}

    /**
     * Menampilkan halaman edit matkul
     */

    public function edit($kode_matkul) {
    $response = Http::get("http://localhost:8080/matkul/{$kode_matkul}");

    if ($response->successful()) {
        $matkul = $response->json();
        return view('admin.editMatkul', compact('matkul'));
    } else {
        return redirect('/admin/dataMatkul')->with('error', 'Data mata kuliah tidak ditemukan');
    }
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kode_matkul)
    {
    $response = Http::put("http://localhost:8080/matkul/{$kode_matkul}", [
        'nama_matkul' => $request->nama_matkul,
        'sks' => $request->sks,
        'semester' => $request->semester,
    ]);

    if ($response->successful()) {
        return redirect('/admin/dataMatkul')->with('success', 'Mata kuliah berhasil diperbarui');
    } else {
        return back()->with('error', 'Gagal memperbarui mata kuliah');
    }
    }


    public function destroy($kode_matkul)
    {
        $response = Http::delete("http://localhost:8080/matkul/{$kode_matkul}");

        if ($response->successful()) {
            return redirect('/admin/dataMatkul')->with('success', 'Mata kuliah berhasil dihapus');
        } else {
            return back()->with('error', 'Gagal menghapus mata kuliah');
        }
    }
}
