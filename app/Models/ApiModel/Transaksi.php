<?php

namespace App\Models\ApiModel;

use App\Models\Pengunjung;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = [
        'id_transaksi', 
        'tanggal_checkin',
        'tanggal_checkout',  
        'status', 
        'total', 
        'nik',
        'id_kamar'
    ];
    public $timestamps = true;
    
    public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'nik');
    }
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar');
    }
}
