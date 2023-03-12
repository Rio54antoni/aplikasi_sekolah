<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $guarded  = ['id'];

    public function _agama()
    {
        return $this->belongsTo(Agama::class, 'agama');
    }
    // public function pendidikan()
    // {
    //     return $this->belongsTo(Pendidikan::class, 'id_pendidikan');
    // }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
    // public function status()
    // {
    //     return $this->belongsTo(status::class, 'id_status');
    // }


}
