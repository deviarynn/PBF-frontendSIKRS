<?php

namespace App\Http\Controllers;

use App\Models\dataMatkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class DataMatkulController extends Controller
{
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
    // DataKelasController (di frontend project)
    public function store(Request $request)
    {
        $request->validate([
        'kode_matkul' => 'required|string|max:5',
        'nama_matkul' => 'required|string|max:50',
        'sks' => 'required|string|max:5',
        'semester' => 'required|string|max:1',

        ], [
            'kode_matkul.required' => 'Kode Matkul wajib diisi.',
            'kode_matkul.max' => 'Kode matkul tidak boleh lebih dari 5 karakter.',
            'nama_matkul.required' => 'Nama Matkul wajib diisi.',
            'sks.required' => 'SKS wajib diisi.',
            'semester.required' => 'Semester wajib diisi.',
            'semester.max' => 'Semester tidak boleh lebih dari 1 karakter.',

        ]);
        $existingMatkul = DB::table('matkul')->where('kode_matkul', $request->kode_matkul)->first();

        if ($existingMatkul) {
            return back()->withErrors(['kode_matkul' => 'Data Kode Matkul sudah ada .'])->withInput();
        }

        $response = Http::asForm()->post('http://localhost:8080/matkul', [
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        if ($response->successful()) {
            return redirect()->route('admin.dataMatkul')->with('success', 'Data berhasil disimpan');
        } else {
            return back()->withErrors('Gagal menyimpan data');
        }
    }

 
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
       public function edit($kode_matkul)
        {
            $response = Http::get("http://localhost:8080/matkul/$kode_matkul");

            if ($response->successful()) {
                $data = $response->json();

                // Ambil elemen pertama dari array
                $matkul = $data[0];

                return view('admin.editMatkul', compact('matkul'));
            } else {
                return back()->with('error', 'Data matkul tidak ditemukan.');
            }
        }


    public function update(Request $request, $kode_matkul)
{
    $response = Http::asForm()->put("http://localhost:8080/matkul/{$request->kode_matkul_lama}", [
    'kode_matkul' => $request->kode_matkul,
    'nama_matkul' => $request->nama_matkul,
    'sks' => $request->sks,
    'semester' => $request->semester,
]);

    if ($response->successful()) {
        return redirect()->route('admin.dataMatkul')->with('success', 'Data berhasil diupdate!');
    } else {
        return back()->with('error', 'Gagal update data.');
    }
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_matkul)
    {
        $response = Http::delete("http://localhost:8080/matkul/{$kode_matkul}");

        if ($response->successful()) {
            return redirect('/admin/dataMatkul')->with('success', 'Kelas berhasil dihapus');
        } else {
            return back()->with('error', 'Gagal menghapus mata kuliah');
        }
    }
}
