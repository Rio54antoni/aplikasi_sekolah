<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['hari' => 'Senin', 'jam_mulai' => '07:00', 'jam_selesai' => '09:00', 'id_kelas' => 1, 'id_mapel' => 1],
            ['hari' => 'Senin', 'jam_mulai' => '09:00', 'jam_selesai' => '11:00', 'id_kelas' => 2, 'id_mapel' => 2],
            ['hari' => 'Senin', 'jam_mulai' => '11:00', 'jam_selesai' => '13:00', 'id_kelas' => 3, 'id_mapel' => 3],
            ['hari' => 'Senin', 'jam_mulai' => '13:00', 'jam_selesai' => '15:00', 'id_kelas' => 4, 'id_mapel' => 4],
        ];
        foreach ($data as $isi) {
            Jadwal::create($isi);
        }
    }
}
