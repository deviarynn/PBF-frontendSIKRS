<?php

namespace App\Http\Controllers;

use App\Models\dataKRS;
use App\Models\dataMahasiswa;
use App\Models\dataMatkul;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Barryvdh\DomPDF\Facade\Pdf; // tambahkan di atas

class DataMhsKRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */

       public function index()
{
    $response = Http::get('http://localhost:8080/krs');
    $krsData = $response->json();

    // Kelompokkan berdasarkan NPM
    $grouped = collect($krsData)->groupBy('npm');

    $krs = $grouped->map(function ($items, $npm) {
    $first = $items->first();

    return [
        'npm' => $npm,
        'nama_mahasiswa' => $first['nama_mahasiswa'] ?? '-',
        'nama_kelas' => $first['nama_kelas'] ?? '-',
        'nama_prodi' => $first['nama_prodi'] ?? '-',
        'matkuls' => $items->map(function ($item) {
            return [
                'kode_matkul' => $item['kode_matkul'] ?? '-',
                'nama_matkul' => $item['nama_matkul'] ?? '-',
                'sks' => $item['sks'] ?? '-',
                'semester' => $item['semester'] ?? '-',
            ];
        }),
    ];
})->values();

    return view('mahasiswa.dataKRS', compact('krs'));
}


public function unduhKRS($npm)
{
    // Ambil data mahasiswa
    $mahasiswa = dataMahasiswa::with(['kelas', 'prodi'])->where('npm', $npm)->first();

    if (!$mahasiswa) {
        return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
    }

    // Ambil daftar KRS mahasiswa
    $krsList = dataKRS::where('npm', $npm)->get();

    // Ambil info mata kuliah dari KRS
    $matkuls = [];

    foreach ($krsList as $krs) {
        $matkul = dataMatkul::where('kode_matkul', $krs->kode_matkul)->first();

        if ($matkul) {
            $matkuls[] = [
                'kode_matkul' => $matkul->kode_matkul,
                'nama_matkul' => $matkul->nama_matkul,
                'sks' => $matkul->sks,
                'semester' => $matkul->semester,
            ];
        }
    }

    // Format data untuk dikirim ke view Blade
    $krsData = [
        'nama_mahasiswa' => $mahasiswa->nama_mahasiswa,
        'npm' => $mahasiswa->npm,
        'nama_kelas' => $mahasiswa->kelas->nama_kelas,
        'nama_prodi' => $mahasiswa->prodi->nama_prodi,
        'semester' => 'Genap', // Atau bisa dinamis
        'matkuls' => $matkuls,
    ];
    
    // Load PDF dari Blade dan download
    $pdf = PDF::loadView('mahasiswa.cetakKRS', compact('krsData'));
    return $pdf->download('krs_' . $mahasiswa->npm . '.pdf');
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
