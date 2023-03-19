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
            ['nama' => 'X IPA 1', 'id_wali' => 1],
            ['nama' => 'X IPS 1', 'id_wali' => 3],
            ['nama' => 'X Matematika 1', 'id_wali' => 1],
            ['nama' => 'X Bahasa Indonesia 1', 'id_wali' => 3],
            ['nama' => 'XI IPA 2', 'id_wali' => 2],
            ['nama' => 'XI IPS 2', 'id_wali' => 4],
            ['nama' => 'XI Matematika 2', 'id_wali' => 2],
            ['nama' => 'Xi Bahasa Indonesia 2', 'id_wali' => 4],
        ];
        foreach ($data as $isi) {
            Kelas::create($isi);
        }
    }
}
