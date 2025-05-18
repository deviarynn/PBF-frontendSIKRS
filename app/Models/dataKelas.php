<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// app/Models/dataKelas.php

use Illuminate\Database\Eloquent\Model;

class dataKelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $incrementing = true;
    public $timestamps = false;
}

