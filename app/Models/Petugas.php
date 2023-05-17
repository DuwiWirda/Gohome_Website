<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 
        'name', 
        'email', 
        'password',
        'role', 
        'email_verified_at', 
        'remember_token'
    ];
}