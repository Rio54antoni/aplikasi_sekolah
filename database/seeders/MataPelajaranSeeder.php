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
            ['nama' => 'Fisika', 'id_guru' => 1],
            ['nama' => 'Biologi', 'id_guru' => 1],
            ['nama' => 'Sejarah', 'id_guru' => 1],
        ];
        foreach ($data as $isi) {
            MataPelajaran::create($isi);
        }
    }
}
