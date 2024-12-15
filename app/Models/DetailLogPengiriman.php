<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class DetailLogPengiriman extends Model

{
    use HasUuids;

    // sesuai nama tabel di migration create table
    protected $table = 'detail_log_pengiriman';

    // belongs to yg make (make id transaksi)
    public function TransaksiResiRelation(){
        return $this->belongsTo(TransaksiResiPengiriman::class, 'transaksi_resi_pengiriman_id');
    }

    protected $fillable = [
        'transaksi_resi_pengiriman_id', 
        // 'tanggal', 
        'kota', 
        'keterangan'
    ];
}
