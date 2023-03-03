<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $fillable = [
        'nama',
        'nip',
        'alamat',
        'notelepon',
        'nohp',
        'email',
        'id_jk',
        'tgl_lahir',
        'id_agama',
        'id_jabatan',
        'foto'
    ];
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function jeniskelamin()
    {
        return $this->belongsTo(Jenisk::class, 'id_jk');
    }
}
