<?php

namespace Database\Seeders;

use App\Models\TransaksiResiPengiriman;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiResiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransaksiResiPengiriman::create([
            'nomor_resi' => 'RESI12345',
            'tanggal' => Carbon::now(),
        ]);
    }
}
