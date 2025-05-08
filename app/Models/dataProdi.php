<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class dataProdi extends Model
{
    use HasFactory;
    protected $fillable = ['kode_prodi', 'nama_prodi'];
    protected $table = 'prodi'; // <- tambahkan ini!
    public $timestamps = false;

}
