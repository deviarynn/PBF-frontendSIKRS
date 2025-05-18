<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// app/Models/dataProdi.php

use Illuminate\Database\Eloquent\Model;

class dataProdi extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'kode_prodi';
    public $incrementing = false;
    public $timestamps = false;
}

