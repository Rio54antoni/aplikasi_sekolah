<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilais';
    protected $guarded = ['id'];

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_siswa');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel');
    }
    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'id_tahun');
    }
}
