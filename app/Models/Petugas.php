<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    protected $fillable = [
        'id_akun', 'email', 'password','nama','level'
    ];
}