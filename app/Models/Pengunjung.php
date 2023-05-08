<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengunjung extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;
    protected $primaryKey = 'nik';
    protected $table = 'pengunjung';
    protected $guard = 'pengunjung';
    protected $fillable = [
        'nik', 'nama_pengunjung', 'email', 'password', 'telepon'
    ];

    protected $hidden = [
        'password',
    ];

    protected $username = 'email';
    public $timestamps = true;
}
?>
