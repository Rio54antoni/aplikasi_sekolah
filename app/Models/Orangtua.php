<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;
    protected $table = 'orangtuas';
    protected $fillable = [
        'nama',
        'hubungan',
        'alamat',
        'notelepon',
        'nohp',
        'email',
        'id_kerja',
        'nama_perusahaan',
        'foto'
    ];
    public function kerja()
    {
        return $this->belongsTo(Kerja::class, 'id_kerja');
    }
    public function hubungan()
    {
        return $this->belongsTo(Murid::class, 'hubungan');
    }
}
