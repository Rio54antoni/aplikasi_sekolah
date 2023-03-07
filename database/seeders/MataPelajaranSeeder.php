<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Matematika', 'id_guru' => 1],
            ['nama' => 'Fisika', 'id_guru' => 2],
            ['nama' => 'Biologi', 'id_guru' => 3],
            ['nama' => 'Sejarah', 'id_guru' => 4],
        ];
        foreach ($data as $isi) {
            MataPelajaran::create($isi);
        }
    }
}
