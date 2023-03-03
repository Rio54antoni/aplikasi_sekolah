<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;
    protected $table = 'murids';
    protected $fillable = [
        'nama',
        'nis',
        'alamat',
        'notelepon',
        'nohp',
        'email',
        'id_jk',
        'tgl_lahir',
        'id_agama',
        'foto'
    ];
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }

    public function jeniskelamin()
    {
        return $this->belongsTo(Jenisk::class, 'id_jk');
    }
}
