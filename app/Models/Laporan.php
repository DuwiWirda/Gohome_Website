<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'id_transaksi', 
        'tanggal_checkin', 
        'tanggal_checkout',
        'status', 
        'total', 
        'nik', 
        'id_kamar'
    ];
    public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'nik', 'nik');
    }
    public function kamar()
    {
        return $this->belongsTo(Post::class, 'id_kamar', 'id_kamar');
    }
}