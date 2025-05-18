<?php

namespace App\Http\Controllers;

use App\Models\dataMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;



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

    public function create()
    {
    $kelas = Http::get('http://localhost:8080/kelas')->json();     // ambil semua kelas
    $prodi = Http::get('http://localhost:8080/prodi')->json();     // ambil semua prodi

    return view('admin.tambahMhs', compact('kelas', 'prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'npm' => 'required|numeric|max_digits:30',
        'nama_mahasiswa' => 'required|string|max:50',
        'id_kelas' => 'required|exists:kelas,id_kelas',
        'kode_prodi' => 'required|string|max:8|exists:prodi,kode_prodi',
        ], [
            'npm.required' => 'NPM wajib diisi.',
            'npm.numeric' => 'NPM harus berupa angka.',
            'npm.max_digits' => 'NPM tidak boleh lebih dari 30 digit.',
            'nama_mahasiswa.required' => 'Nama mahasiswa wajib diisi.',
            'id_kelas.required' => 'Kelas wajib dipilih.',
            'kode_prodi.required' => 'Program studi wajib dipilih.',
        ]);
        $existingMhs = DB::table('mahasiswa')->where('npm', $request->npm)->first();

        if ($existingMhs) {
            return back()->withErrors(['npm' => 'Sudah ada data NPM ini.'])->withInput();
        }

        $response = Http::asForm()->post('http://localhost:8080/mahasiswa', [
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'id_kelas' => $request->id_kelas,
            'kode_prodi' => $request->kode_prodi,
        ]);
        if ($response->successful() ) {
            return redirect()->route('admin.dataMhs')->with('success', 'Data berhasil disimpan!');
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
    
 public function edit($npm)
    {
        $mahasiswaResponse = Http::get("http://localhost:8080/mahasiswa/$npm");
        $kelas = Http::get("http://localhost:8080/kelas")->json();
        $prodi = Http::get("http://localhost:8080/prodi")->json();

        if ($mahasiswaResponse->successful() && !empty($mahasiswaResponse[0])) {
            $mahasiswa = $mahasiswaResponse[0];

            // Tambahkan pencocokan manual ID berdasarkan nama (TIDAK disarankan jangka panjang)
            foreach ($kelas as $k) {
                if ($k['nama_kelas'] === $mahasiswa['nama_kelas']) {
                    $mahasiswa['id_kelas'] = $k['id_kelas'];
                    break;
                }
            }

            foreach ($prodi as $p) {
                if ($p['nama_prodi'] === $mahasiswa['nama_prodi']) {
                    $mahasiswa['kode_prodi'] = $p['kode_prodi'];
                    break;
                }
            }

            return view('admin.editMhs', compact('mahasiswa', 'kelas', 'prodi'));
        } else {
            return back()->with('error', 'Gagal mengambil data mahasiswa');
        }
    }



public function update(Request $request, $npm)
{
    // Ambil data dari form
    $npm = $request->npm;
    $nama_mahasiswa = $request->nama_mahasiswa;
    $id_kelas = $request->id_kelas;
    $kode_prodi = $request->kode_prodi;

    // Kirim data ke API untuk update mahasiswa
    $response = Http::asForm()->put("http://localhost:8080/mahasiswa/{$npm}", [
        'npm' => $npm,
        'nama_mahasiswa' => $nama_mahasiswa,
        'id_kelas' => $id_kelas,
        'kode_prodi' => $kode_prodi,
    ]);

    // Mengecek apakah API berhasil melakukan update
    if ($response->successful()) {
        return redirect()->route('admin.dataMhs')->with('success', 'Data mahasiswa berhasil diperbarui!');
    } else {
        return back()->with('error', 'Gagal memperbarui data mahasiswa.');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($npm)
    {
        $response = Http::delete("http://localhost:8080/mahasiswa/{$npm}");

        if ($response->successful()) {
            return redirect('/admin/dataMhs')->with('success', 'Mahasiswa berhasil dihapus');
        } else {
            return back()->with('error', 'Gagal menghapus mata kuliah');
        }
    }

}