<?php

namespace App\Models\ApiModel;

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
        'bukti_tf', 
        'status', 
        'harga', 
        'total', 
        'nik',
        'id_akun',
        'id_kamar'
    ];
    public $timestamps = true;
}
