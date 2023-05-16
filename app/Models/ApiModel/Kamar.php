<?php

namespace App\Models\ApiModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
   
    use HasFactory;
    protected $table = 'kamar';
    protected $primaryKey = 'id_kamar';
    protected $fillable = [
        'id_kamar', 
        'jenis_kamar', 
        'nomer_kamar', 
        'harga', 
        'deskripsi', 
        'jenis_kasur', 
        'gambar_kamar', 
        'status_kamar'
    ];
    public $timestamps = true;
}
