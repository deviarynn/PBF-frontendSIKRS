<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataProdiController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\DataMatkulController;
use App\Http\Controllers\DataMahasiswaController;
use App\Http\Controllers\DataKRSController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Role admin
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// data mahasiswa
// Route::get('/admin/dataMhs', function () {
//     return view('admin.dataMhs');
// })->name('admin.dataMhs');
Route::get('/admin/dataMhs', [DataMahasiswaController::class, 'index']);

Route::get('/admin/tambahMhs', function () {
    return view('admin.tambahMhs');
})->name('admin.tambahMhs');

Route::get('/admin/editMhs', function () {
    return view('admin.editMhs');
})->name('admin.editMhs');



//data prodi
Route::get('/admin/dataProdi', [DataProdiController::class, 'index']);

Route::get('/admin/tambahProdi', function () {
    return view('admin.tambahProdi');
})->name('admin.tambahProdi');

Route::get('/admin/editProdi', function () {
    return view('admin.editProdi');
})->name('admin.editProdi');


//data matkul
// Route::get('/admin/dataMatkul', function () {
//     return view('admin.dataMatkul');
// })->name('admin.dataMatkul');
Route::get('/admin/dataMatkul', [DataMatkulController::class, 'index']);

Route::get('/admin/tambahMatkul', function () {
    return view('admin.tambahMatkul');
})->name('admin.tambahMatkul');

Route::get('/admin/editMatkul', function () {
    return view('admin.editMatkul');
})->name('admin.editMatkul');


//data kelas
// Route::get('/admin/dataKelas', function () {
//     return view('admin.dataKelas');
// })->name('admin.dataKelas');
Route::get('/admin/dataKelas', [DataKelasController::class, 'index']);

Route::get('/admin/tambahKelas', function () {
    return view('admin.tambahKelas');
})->name('admin.tambahKelas');

Route::get('/admin/editKelas', function () {
    return view('admin.editKelas');
})->name('admin.editKelas');


//data KRS
// Route::get('/admin/dataKRS', function () {
//     return view('admin.dataKRS');
// })->name('admin.dataKRS');
Route::get('/admin/dataKRS', [DataKRSController::class, 'index']);




//Role Mahasiswa

Route::get('/mahasiswa/login', function () {
    return view('mahasiswa.login');
})->name('mahasiswa.login');

Route::get('/mahasiswa/dashboard', function () {
    return view('mahasiswa.dashboard');
})->name('mahasiswa.dashboard');

//Data Matkul
Route::get('/mahasiswa/dataMatkul', function () {
    return view('mahasiswa.dataMatkul');
})->name('mahasiswa.dataMatkul');

//Data KRS
Route::get('/mahasiswa/dataKRS', function () {
    return view('mahasiswa.dataKRS');
})->name('mahasiswa.dataKRS');

Route::get('/mahasiswa/tambahKRS', function () {
    return view('mahasiswa.tambahKRS');
})->name('mahasiswa.tambahKRS');

Route::get('/mahasiswa/editKRS', function () {
    return view('mahasiswa.editKRS');
})->name('mahasiswa.editKRS');

Route::get('/mahasiswa/unduhKRS', function () {
    return view('mahasiswa.unduhKRS');
})->name('mahasiswa.unduhKRS');