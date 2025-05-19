<?php

namespace App\Http\Controllers;

use App\Models\dataKRS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


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

    public function create()
    {
    $mahasiswa = Http::get('http://localhost:8080/mahasiswa')->json();     // ambil semua mahasiswa
    $matkul = Http::get('http://localhost:8080/matkul')->json();     // ambil semua matkul
    // $prodi = Http::get('http://localhost:8080/prodi')->json();

    return view('admin.tambahKRS', compact('mahasiswa', 'matkul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'npm' => 'required|numeric|max_digits:30',
        'kode_matkul' => 'required|string|max:5',
        ], [
            'npm.required' => 'NPM wajib diisi.',
            'kode_matkul.required' => 'Matkul wajib dipilih.',
        ]);

        $existingKRS = DB::table('krs')
                     ->where('npm', $request->npm)
                     ->where('kode_matkul', $request->kode_matkul)
                     ->first();

        if ($existingKRS) {
            return back()->withErrors(['kode_matkul' => 'Sudah mengambil matkul ini.'])->withInput();
    }
        $response = Http::asForm()->post('http://localhost:8080/krs', [
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'id_kelas' => $request->id_kelas,
            'kode_prodi' => $request->kode_prodi,
            'kode_matkul' => $request->kode_matkul,
            'sks' => $request->sks,
            'semester' => $request->semester,
            
        ]);
        
        if ($response->successful()) {
            return redirect()->route('admin.dataKRS')->with('success', 'Data berhasil disimpan!');
        } else {
            return back()->withErrors('Gagal menyimpan data');
        }
    }
   

    public function edit($id_krs)
    {
        $response = Http::get("http://localhost:8080/krs/$id_krs");

    if ($response->successful()) {
        $data = $response->json(); // decode JSON dulu jadi array

        if (!empty($data[0])) {
            $krs = $data[0];

            // ambil data tambahan
            $mahasiswa = Http::get("http://localhost:8080/mahasiswa")->json();
            $matkul = Http::get("http://localhost:8080/matkul")->json();
            $prodi = Http::get("http://localhost:8080/prodi")->json();

            foreach ($mahasiswa as $mhs) {
                    if ($mhs['npm'] === $krs['npm']) {
                        $krs['npm'] = $mhs['npm'];
                        break;
                    }
                }

                foreach ($matkul as $m) {
                    if ($m['nama_matkul'] === $krs['nama_matkul']) {
                        $krs['kode_matkul'] = $m['kode_matkul'];
                        break;
                    }
                }

            foreach ($prodi as $p) {
                    if ($p['nama_prodi'] === $krs['nama_prodi']) {
                        $krs['kode_prodi'] = $p['kode_prodi'];
                        break;
                    }
                }

            return view('admin.editKRS', compact('krs', 'mahasiswa', 'matkul', 'prodi'));
        } else {
            return back()->with('error', 'Data KRS tidak ditemukan');
        }
    } else {
        return back()->with('error', 'Gagal mengambil data dari API');
    }
    }

public function update(Request $request, $id_krs)
{
    // Validasi data
    $request->validate([
        'npm' => 'required|exists:mahasiswa,npm',
        'kode_matkul' => 'required|exists:matkul,kode_matkul',
    ]);

    $duplicate = DB::table('krs')
        ->where('npm', $request->npm)
        ->where('kode_matkul', $request->kode_matkul)
        ->where('id_krs', '!=', $id_krs)  // Pastikan id_krs yang sedang diperbarui tidak dihitung
        ->exists();

    if ($duplicate) {
        return back()->withErrors(['kode_matkul' => 'Mahasiswa ini sudah terdaftar di mata kuliah yang sama di KRS lain.']);
    }

    // Kirim data ke API untuk update KRS
    $response = Http::asForm()->put("http://localhost:8080/krs/{$id_krs}", [
        'npm' => $request->npm,
        'kode_matkul' => $request->kode_matkul,
    ]);

    // Mengecek apakah API berhasil melakukan update
    if ($response->successful()) {
        return redirect()->route('admin.dataKRS')->with('success', 'Data KRS berhasil diperbarui!');
    } else {
        return back()->with('error', 'Gagal memperbarui data KRS.');
    }
}


public function destroy($id_krs)
    {
        $response = Http::delete("http://localhost:8080/krs/{$id_krs}");

        if ($response->successful()) {
            return redirect('/admin/dataKRS')->with('success', 'KRS berhasil dihapus');
        } else {
            return back()->with('error', 'Gagal menghapus KRS');
        }
    }
}
