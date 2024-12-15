<?php

namespace Database\Seeders;

use App\Models\UserAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAdmin::create([
            'username' => 'shella',
            'password' => Hash::make('shella123'), 
            'nama_admin' => 'Admin Utama',
            'status_aktif' => true, // aktif
        ]);
    }
}
