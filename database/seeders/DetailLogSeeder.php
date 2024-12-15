<?php

namespace Database\Seeders;

use App\Models\DetailLogPengiriman;
use App\Models\TransaksiResiPengiriman;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_resi = TransaksiResiPengiriman::first()->id;

        DetailLogPengiriman::create([
            'transaksi_resi_pengiriman_id' =>  $id_resi,
            // 'tanggal' => Carbon::now()->subDay(),
            'kota' => 'Surabaya',
            'keterangan' => 'Barang sudah diterima',
        ]);
    }
}
