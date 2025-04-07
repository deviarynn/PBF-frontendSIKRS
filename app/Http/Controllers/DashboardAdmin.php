<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataMahasiswa;
use App\Models\dataMatkul;
use App\Models\dataProdi;
use App\Models\dataKelas;
use App\Models\dataKRS;


class DashboardAdmin extends Controller
{
    public function dashboard()
{
    $jumlahMahasiswa = dataMahasiswa::count();
    $jumlahMatkul = dataMatkul::count();
    $jumlahProdi = dataProdi::count();            
    $jumlahKelas = dataKelas::count();
    $jumlahKrs = dataKRS::count();

    return view('admin.dashboard', compact(
        'jumlahMahasiswa',
        'jumlahMatkul',
        'jumlahProdi',
        'jumlahKelas',
        'jumlahKrs'
    ));
}


}
