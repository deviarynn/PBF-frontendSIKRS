<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// app/Models/dataMahasiswa.php

use Illuminate\Database\Eloquent\Model;

class dataMahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'npm';
    public $incrementing = false;
    protected $keyType = 'string';

    // Relasi ke tabel kelas
    public function kelas()
    {
        return $this->belongsTo(dataKelas::class, 'id_kelas', 'id_kelas');
    }

    // Relasi ke tabel prodi
    public function prodi()
    {
        return $this->belongsTo(dataProdi::class, 'kode_prodi', 'kode_prodi');
    }
}
