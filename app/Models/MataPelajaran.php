<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $table = 'mata_pelajarans';
    protected $fillable = [
        'nama',
        'id_guru'
    ];
    public function mapel()
    {
        return $this->belongsTo(Pegawai::class, 'id_guru');
    }
}
