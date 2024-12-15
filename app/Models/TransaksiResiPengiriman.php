<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TransaksiResiPengiriman extends Model
{
    use HasUuids;
    protected $table = 'transaksi_resi_pengiriman';

    // has many yang memberikan
    public function DetailLogRelation(){
        return $this->hasMany(DetailLogPengiriman::class);

    }

    protected $fillable = [
        'nomor_resi', 
        'tanggal'
    ];
}
