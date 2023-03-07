<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'X MIPA 1', 'id_wali' => 1],
            ['nama' => 'X MIPA 2', 'id_wali' => 2],
            ['nama' => 'X IPS 1', 'id_wali' => 3],
            ['nama' => 'X IPS 2', 'id_wali' => 4],
        ];
        foreach ($data as $isi) {
            Kelas::create($isi);
        }
    }
}
