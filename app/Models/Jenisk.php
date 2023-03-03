<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisk extends Model
{
    use HasFactory;
    protected $table = 'jenisks';
    protected $fillable = ['nama'];
}
