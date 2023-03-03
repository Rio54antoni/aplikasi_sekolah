<?php

namespace Database\Seeders;

use App\Models\Profilapp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profilapp::create([
            'nama' => 'SMP N 3 Ulakan Tapakis',
            'alamat' => 'Jl.Pariaman menuju Bandara',
            'email' => 'smpn3@gmail.com',
            'notelepon' => '08567890123',
            'nss' => '28175643',
            'akreditasi' => 'A',
            'logo' => 'sma2.jpg',
        ]);
    }
}
