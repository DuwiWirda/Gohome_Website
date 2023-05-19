<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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
