<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## ⚙️ Tentang Sistem
### SISTEM KRS ONLINE POLITEKNIK NEGERI CILACAP

<p> Sistem Kartu Rencana Studi (KRS) Online Politeknik Negeri Cilacap adalah platform berbasis web yang digunakan untuk pengelolaan KRS secara digital.</p>

<p> Sistem ini memungkinkan admin mendaftarkan mata kuliah secara online, menggantikan prosedur manual. Data akademik seperti program studi dan mata kuliah diintegrasikan dalam sistem, sehingga proses pengisian dan administrasi KRS lebih cepat, akurat, dan efisien.</p>

<p> Dengan demikian, Politeknik Negeri Cilacap dapat mengelola data akademik dan KRS secara terpusat dan paperless dalam satu sistem terpadu.</p>

#### 🖥️ Fitur Utama
<p> 1. Admin
<p>Administrator (staff akademik) dapat mengelola seluruh data akademik melalui operasi CRUD (create, read, update, delete). Fitur ini mencakup pengelolaan data mahasiswa, program studi (prodi), mata kuliah, kelas perkuliahan, dan data KRS mahasiswa. Misalnya, admin dapat menambah, mengubah, atau menghapus informasi mahasiswa, serta menetapkan kelas dan KRS untuk tiap semester, seperti dijelaskan dalam studi KRS online di institusi lain</p>
</p>
<p> 2. Mahasiswa
<p>Mahasiswa menggunakan sistem untuk melihat riwayat dan isi data KRS mereka secara online. Mahasiswa dapat mencetak Kartu Rencana Studi (KRS) yang telah diisi oleh administrator/staf akademik.</p>
</p>
## 📁 Persyaratan Instalasi Laravel

Pastikan perangkat Anda sudah terinstal:

- [PHP >= 8.1](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) atau [XAMPP/Laragon](https://laragon.org/)
- (Opsional) Laravel CLI:

  ```php
  bash
  composer global require laravel/installer
  ```

## Download database
```
https://github.com/WindyAnggitaPutri/SI_KRS_Database
```
Pilih yang filenya .sql > Buka dan salin semua isinya di sql PhpMyAdmin
tambahkan query diatas create table
```
create database db_krs;
use db_krs;
```

Clone github backend di dalam folder www
```
git clone https://github.com/kristiandimasadiwicaksono/SI-KRS-Backend.git
```
Install composer (jika belum ada)
```bash
composer install
```
Nyalakan server backend
```bash
php spark serve
```

Untuk mengetahui apakah endpoint backend berhasil atau tidak, bisa dicek melalui postman
```
Kelas:
GET → http://localhost:8080/kelas / http://localhost:8080/kelas/{id}
POST → http://localhost:8080/kelas
PUT → http://localhost:8080/kelas/{id}
DELETE → http://localhost:8080/kelas/{id}

Matkul:

GET → http://localhost:8080/matkul / http://localhost:8080/matkul/{id}
POST → http://localhost:8080/matkul
PUT → http://localhost:8080/matkul/{id}
DELETE → http://localhost:8080/matkul/{id}

Prodi:
GET → http://localhost:8080/prodi / http://localhost:8080/prodi/{id}
POST → http://localhost:8080/prodi
PUT → http://localhost:8080/prodi/{id}
DELETE → http://localhost:8080/prodi/{id}

Mahasiswa:

GET → http://localhost:8080/mahasiswa / http://localhost:8080/mahasiswa/{id}
POST → http://localhost:8080/mahasiswa
PUT → http://localhost:8080/mahasiswa/{id}
DELETE → http://localhost:8080/mahasiswa/{id}

KRS:

GET → http://localhost:8080/krs / http://localhost:8080/krs/{id}
POST → http://localhost:8080/krs
PUT → http://localhost:8080/krs/{id}
DELETE → http://localhost:8080/krs/{id}

User:

GET → http://localhost:8080/user / http://localhost:8080/user/{id}
```

## ! Catatan penting
Frontend ini masih menggunakan isi file routes milik backend yang lama, yaitu
```App/Config/Routes
<?php
use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('mahasiswa', 'Mahasiswa::index');
$routes->get('mahasiswa/(:num)', 'Mahasiswa::show/$1');
$routes->post('mahasiswa', 'Mahasiswa::create');
$routes->put('mahasiswa/(:num)', 'Mahasiswa::update/$1');
$routes->delete('mahasiswa/(:num)', 'Mahasiswa::delete/$1');
$routes->get('dosen', 'Dosen::index');
$routes->get('dosen/(:num)', 'Dosen::show/$1');
$routes->post('dosen', 'Dosen::create');
$routes->put('dosen/(:num)', 'Dosen::update/$1');
$routes->delete('dosen/(:num)', 'Dosen::delete/$1');
$routes->get('kelas', 'Kelas::index');
$routes->get('kelas/(:num)', 'Kelas::show/$1');
$routes->post('kelas', 'Kelas::create');
$routes->put('kelas/(:num)', 'Kelas::update/$1');
$routes->delete('kelas/(:num)', 'Kelas::delete/$1');
$routes->get('krs', 'Krs::index');
$routes->get('krs/(:num)', 'Krs::show/$1');
$routes->post('krs', 'Krs::create');
$routes->put('krs/(:num)', 'Krs::update/$1');
$routes->delete('krs/(:num)', 'Krs::delete/$1');
$routes->get('matkul/', 'Matkul::index');
$routes->get('matkul/(:num)', 'Matkul::show/$1');
$routes->post('matkul', 'Matkul::create');
$routes->put('matkul/(:segment)', 'Matkul::update/$1');
$routes->delete('matkul/(:num)', 'Matkul::delete/$1');
$routes->get('prodi', 'Prodi::index');
$routes->get('prodi/(:segment)', 'Prodi::show/$1');
$routes->post('prodi', 'Prodi::create');
$routes->put('prodi/(:segment)', 'Prodi::update/$1');
$routes->delete('prodi/(:segment)', 'Prodi::delete/$1');
$routes->get('user', 'User::index');
$routes->get('user/(:num)', 'User::show/$1');

$routes->post('login', 'Auth::login');
$routes->group('api', ['filter' => 'auth'], function ($routes) {
    $routes->get('protected', 'ProtectedController::index');
});
```

## INSTALASI PROJECT LARAVEL

Langkah dalam membuat project baru laravel :
1.	Ketikan perintah terminal di bash commad (composer create-project laravel/laravel nama-proyek). Ini adalah perintah untuk membuat project Laravel baru sekaligus installasi composernya.
Contoh jika ingin membuat project seperti punya saya yaitu (composer create-project laravel/laravel SiKRS).
Setelah selesai, akan terbentuk folder projekKRS/ yang berisi struktur Laravel.
2.	Masuk ke directory proyek dengan perintah cd namafile
3.	Lalu jalankan server Laravel dengan perintah php artisan serve di gitbash
Nanti akan muncul http://127.0.0.1:8000 yang artinya server laravel berjalan di port 8000.
Atau jika kita menjalankan project laravel milik orang lain cukup git clone dari github , ketik di cmd git clone link_github_tersebut.git. Lalu masih sama caranya seperti tadi, masuk dulu ke directory filenya, kita buka di vscode. Kemudian kita install composer terlebih dahulu dengan perintah ”composer install” di terminal/jika merasa sudah install tapi ragu cek saja dengan composer -v.

### 1. Clone Repository 
```
git clone https://github.com/deviarynn/PBF-frontendSIKRS
```
<p>Masuk ke file yang sudah di clone, buka cmd. Ketik "code ." untuk membuka VSCode file ini</p>

### 2. Install Dependency
Buka terminal vscode, pilih di bash.
```bash
composer install
```
### 3. Copy File Environment

```bash
cp .env.example .env
```
### 4.🛠️ Konfigurasi Database

Buka file `.env` dan ubah konfigurasi database.

```php
.env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_krs
DB_USERNAME=root
DB_PASSWORD=

```
## 🚀 Menyalakan server laravel untuk menjalankan aplikasi

```bash
php artisan serve
```

Aplikasi bisa diakses pada browser dan berjalan di port http://127.0.0.1:8000

### Install DomPdf jika pgn cetak
```bash
$ composer require barryvdh/laravel-dompdf
```

lalu diatas ditambahkan
```php
use Barryvdh\DomPDF\Facade\Pdf; // tambahkan di atas
```
