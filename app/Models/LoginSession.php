<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginSession extends Model
{
    use HasFactory;
    protected $table = 'login_sessions';
    protected $fillable = [
        'user_id',
        'device',
        'platform',
        'browser',
        'login_time'
    ];
}
