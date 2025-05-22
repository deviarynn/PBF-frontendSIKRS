<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## ⚙️ Tentang Sistem
### SISTEM KRS ONLINE POLITEKNIK NEGERI CILACAP

<p>Sistem KRS (Kartu Rencana Studi) Online adalah platform web yang dibangun untuk digitalisasi proses pengisian dan pengelolaan KRS di Politeknik Negeri Cilacap. Sistem ini dirancang menggunakan framework Laravel dan memungkinkan proses yang sebelumnya dilakukan secara manual menjadi lebih cepat, efisien, dan terdokumentasi dengan baik</p>
<p>Dengan adanya sistem ini:</p><br>

Pengelolaan data akademik dilakukan secara terpusat dan terintegrasi.<br>

Mahasiswa dan admin dapat berinteraksi langsung dengan data secara online.<br>

Proses administrasi menjadi paperless dan terdigitalisasi penuh.


#### 🖥️ Fitur Utama
<p> 1. Admin
<p>Administrator (staff akademik) dapat mengelola seluruh data akademik melalui operasi CRUD (create, read, update, delete). Fitur ini mencakup pengelolaan data mahasiswa, program studi (prodi), mata kuliah, kelas perkuliahan, dan data KRS mahasiswa. Misalnya, admin dapat menambah, mengubah, atau menghapus informasi mahasiswa, serta menetapkan kelas dan KRS untuk tiap semester, seperti dijelaskan dalam studi KRS online di institusi lain</p>
</p>
<p> 2. Mahasiswa
<p>Mahasiswa menggunakan sistem untuk melihat riwayat dan isi data KRS mereka secara online. Mahasiswa dapat mencetak Kartu Rencana Studi (KRS) yang telah diisi oleh administrator/staf akademik. Dengan begitu, mahasiswa dapat mengakses informasi KRS dan mencetak salinannya kapan saja selama periode pengisian, mendukung proses perencanaan studi yang teratur.</p>
</p>

## 📁 Persyaratan Instalasi Laravel

Pastikan perangkat Anda sudah terinstal:

- [PHP >= 8.1](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- Web server [MySQL](https://www.mysql.com/) atau [XAMPP/Laragon](https://laragon.org/)
- (Opsional) Laravel CLI:

  ```php
  bash
  composer global require laravel/installer
  ```

## INSTALASI PROJECT LARAVEL
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

### 🚀 Menyalakan server laravel untuk menjalankan aplikasi

```bash
php artisan serve
```

Aplikasi bisa diakses pada browser dan berjalan di port http://127.0.0.1:8000

### 5. Jalankan Migrasi(opsional)

```bash
php artisan migrate
```


