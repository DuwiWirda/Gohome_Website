<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'kamar';
    protected $primaryKey = 'id_kamar';
    protected $fillable = [
        'nomor_kamar', 'jenis_kamar', 'jenis_kasur','harga','deskripsi', 'gambar_kamar', 'status_kamar'
    ];
}
