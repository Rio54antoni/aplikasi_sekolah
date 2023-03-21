<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;
    protected $table = 'murids';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }
    public function pekerjaan_ayah()
    {
        return $this->belongsTo(Kerja::class, 'kerja_ayah');
    }
    public function pekerjaan_ibu()
    {
        return $this->belongsTo(Kerja::class, 'kerja_ibu');
    }
    public function pekerjaan_wali()
    {
        return $this->belongsTo(Kerja::class, 'kerja_wali');
    }
}
