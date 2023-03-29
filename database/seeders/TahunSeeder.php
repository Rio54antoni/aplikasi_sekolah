<?php

namespace Database\Seeders;

use App\Models\Tahun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['tahun' => '2023/2024', 'semester' => 'Semester Ganjil'],
            ['tahun' => '2023/2024', 'semester' => 'Semester Genap'],
        ];
        foreach ($data as $isi) {
            Tahun::create($isi);
        }
    }
}
