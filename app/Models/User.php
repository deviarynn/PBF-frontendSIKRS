<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'username', 
        'password', 
        'status' // Bisa 'admin' atau 'mahasiswa'
    ];

    protected $hidden = [
        'password', // Supaya password tidak bisa dilihat langsung
    ];

    // Mutator untuk otomatis hash password saat disimpan
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
