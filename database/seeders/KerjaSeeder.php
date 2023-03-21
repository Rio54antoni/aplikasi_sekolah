<?php

namespace Database\Seeders;

use App\Models\Kerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kerja::create(['nama' => 'Pekerja Harian Lepas']);
        Kerja::create(['nama' => 'Ibu Rumah Tangga']);
        Kerja::create(['nama' => 'Buruh Petani']);
        Kerja::create(['nama' => 'Teknisi']);
        Kerja::create(['nama' => 'Pengajar']);
        Kerja::create(['nama' => 'Dokter']);
        Kerja::create(['nama' => 'Perawat']);
        Kerja::create(['nama' => 'Insinyur']);
        Kerja::create(['nama' => 'Arsitek']);
        Kerja::create(['nama' => 'Programmer']);
        Kerja::create(['nama' => 'Tukang Kayu']);
        Kerja::create(['nama' => 'Tukang Las']);
        Kerja::create(['nama' => 'Nelayan']);
        Kerja::create(['nama' => 'Pelayan Restoran']);
        Kerja::create(['nama' => 'Koki']);
        Kerja::create(['nama' => 'Penjual / Pedagang']);
        Kerja::create(['nama' => 'Sopir']);
        Kerja::create(['nama' => 'Satpam']);
        Kerja::create(['nama' => 'Asisten Rumah Tangga']);
        Kerja::create(['nama' => 'Penyanyi']);
    }
}
