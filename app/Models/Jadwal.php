<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';
    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
        'id_kelas',
        'id_mapel'
    ];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel');
    }
}
