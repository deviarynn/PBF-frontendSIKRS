<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\DashboardMahasiswa;
use App\Http\Controllers\DataProdiController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\DataMatkulController;
use App\Http\Controllers\DataMahasiswaController;
use App\Http\Controllers\DataKRSController;
use App\Http\Controllers\DataMhsKRSController;



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





Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Contoh dashboard
Route::get('/admin/dashboard', [DashboardAdmin::class, 'dashboard'])->name('admin.dashboard');
;

Route::get('/mahasiswa/dashboard', function () {
    return view('mahasiswa.dashboard');
})->name('mahasiswa.dashboard');





Route::get('/admin/dataMhs', [DataMahasiswaController::class, 'index']);

Route::get('/admin/tambahMhs', [DataMahasiswaController::class, 'create']);
Route::post('/admin/dataMhs', [DataMahasiswaController::class, 'store'])->name('admin.dataMhs');
Route::get('/admin/editMhs/{npm}', [DataMahasiswaController::class, 'edit'])->name('admin.editMhs');
Route::put('/admin/updateMhs/{npm}', [DataMahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/admin/hapusMhs/{npm}', [DataMahasiswaController::class, 'destroy']);
// Route::get('/admin/tambahMhs', function () {
//     return view('admin.tambahMhs');
// })->name('admin.tambahMhs');

// Route::get('/admin/editMhs', function () {
//     return view('admin.editMhs');
// })->name('admin.editMhs');



//data prodi
Route::get('/admin/dataProdi', [DataProdiController::class, 'index']);

// Route::get('/admin/tambahProdi', function () {
//     return view('admin.tambahProdi');
// })->name('admin.tambahProdi');

Route::get('/admin/tambahProdi', [DataProdiController::class, 'create']);
Route::post('/admin/dataProdi', [DataProdiController::class, 'store'])->name('admin.dataProdi');
Route::get('/admin/editProdi/{kode_Prodi}', [DataProdiController::class, 'edit'])->name('admin.editProdi');
Route::put('/admin/updateProdi/{kode_Prodi}', [DataProdiController::class, 'update'])->name('prodi.update');
Route::delete('/admin/hapusProdi/{kode_Prodi}', [DataProdiController::class, 'destroy']);


//data matkul
Route::get('/admin/dataMatkul', [DataMatkulController::class, 'index'])->name('admin.dataMatkul');

Route::get('/admin/tambahMatkul', [DataMatkulController::class, 'create']);
Route::post('/admin/dataMatkul', [DataMatkulController::class, 'store'])->name('admin.storeMatkul');
Route::get('/admin/editMatkul/{kode_matkul}', [DataMatkulController::class, 'edit'])->name('admin.editMatkul');
Route::put('/admin/updateMatkul/{kode_matkul}', [DataMatkulController::class, 'update'])->name('matkul.update');
Route::delete('/admin/hapusMatkul/{kode_matkul}', [DataMatkulController::class, 'destroy'])->name('admin.hapusMatkul');


//data kelas
// Route::get('/admin/dataKelas', function () {
//     return view('admin.dataKelas');
// })->name('admin.dataKelas');
Route::get('/admin/dataKelas', [DataKelasController::class, 'index']);

// data Kelas
Route::get('/admin/tambahKelas', [DataKelasController::class, 'create']);
Route::post('/admin/dataKelas', [DataKelasController::class, 'store'])->name('admin.dataKelas');
Route::get('/admin/editKelas/{id_kelas}', [DataKelasController::class, 'edit'])->name('admin.editKelas');
Route::put('/admin/updateKelas/{id_kelas}', [DataKelasController::class, 'update'])->name('kelas.update');
Route::delete('/admin/hapusKelas/{id_kelas}', [DataKelasController::class, 'destroy']);


// ADMIN --> DATA KRS
Route::get('/admin/dataKRS', [DataKRSController::class, 'index'])->name('admin.dataKRS');

Route::get('/admin/tambahKRS', [DataKRSController::class, 'create']);
// POST untuk menyimpan data
Route::post('/admin/dataKRS/store', [DataKRSController::class, 'store'])->name('admin.dataKRS.store');
Route::get('/admin/editKRS/{id_krs}', [DataKRSController::class, 'edit'])->name('admin.editKRS');
Route::put('/admin/updateKRS/{id_krs}', [DataKRSController::class, 'update'])->name('KRS.update');
Route::delete('/admin/hapusKRS/{id_krs}', [DataKRSController::class, 'destroy']);



//Role Mahasiswa

Route::get('/mahasiswa/dataKRS', [DataMhsKRSController::class, 'index'])->name('mahasiswa.krs');
Route::get('/mahasiswa/cetakKRS/{id_krs}', [DataMhsKRSController::class, 'unduhKRS']);
