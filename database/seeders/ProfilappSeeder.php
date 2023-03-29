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
            'npsn' => '28175643',
            'alamat' => 'Jl.Pariaman menuju Bandara',
            'desa' => 'Tiram Tapakis',
            'kecamatan' => 'Ulakan Tapakis',
            'kabupaten' => 'Padang Pariaman',
            'provinsi' => 'Sumatera Barat',
            'email' => 'smpn3@gmail.com',
            'kodepos' => '27767',
            'status' => 'Negeri',
            'bentuk' => 'SMP',
            'telepon' => '08567890123',
            'akreditasi' => 'A',
            'logo' => 'smp3.jpg',
        ]);
    }
}
