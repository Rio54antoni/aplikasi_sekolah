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
            ['nama' => 'X IPA 2', 'id_wali' => 1],
            ['nama' => 'X IPS 1', 'id_wali' => 1],
            ['nama' => 'X IPS 2', 'id_wali' => 1],
        ];
        foreach ($data as $isi) {
            Kelas::create($isi);
        }
    }
}
