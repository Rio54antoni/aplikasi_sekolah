<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agama = [
            [
                'nama' => 'Islam'
            ],
            [
                'nama' => 'Kristen'


            ],
            [
                'nama' => 'Katholik'
            ],
            [
                'nama' => 'Buddha'
            ],
            [
                'nama' => 'Hindu'
            ],
        ];

        Agama::insert($agama);
    }
}
