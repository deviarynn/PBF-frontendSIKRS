<?php

namespace App\Http\Controllers;

use App\Models\dataProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session as FacadesSession;


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
    public function store(Request $request) {
        FacadesSession::flash('kode_prodi', $request->kode_prodi);
        FacadesSession::flash('nama_prodi', $request->nama_prodi);

        $request->validate([
            'kode_prodi' => 'required|unique:prodi,kode_prodi',
            'nama_prodi' => 'required',
        ],[
            'kode_prodi.required' => 'kode prodi wajib diisi',
            'kode_prodi.unique' => 'kode prodi sudah ada di database',
            'nama_prodi.required' => 'nama prodi wajib diisi',
        ]);

        $data =[
            'kode_prodi' => $request->kode_prodi,
            'nama_prodi' => $request->nama_prodi,
        ];
    //    
    dataProdi::create($data);
    return redirect()->to('admin/dataProdi')->with('Success', 'Berhasil menambahkan data!');
}

}
