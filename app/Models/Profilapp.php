<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profilapp extends Model
{
    use HasFactory;
    protected $table = 'profilapps';
    protected $fillable = [
        'nama', 'alamat', 'email', 'notelepon', 'logo', 'nss', 'akreditasi'
    ];
}
