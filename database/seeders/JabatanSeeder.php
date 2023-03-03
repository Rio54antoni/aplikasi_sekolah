<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Kepala Sekolah'
            ],
            [
                'nama' => 'Wakil Kepala Sekolah'
            ],
            [
                'nama' => 'Koordinator Kurikulum'
            ],
            [
                'nama' => 'Guru Kelas'
            ],
            [
                'nama' => 'Guru Wali Kelas'
            ],
            [
                'nama' => 'Karyawan Tata Usaha'
            ],
            [
                'nama' => 'Staf Kesehatan'
            ],
            [
                'nama' => 'Staf Kesiswaan'
            ],
        ];
        foreach ($data as $jabatan) {
            Jabatan::create($jabatan);
        }
    }
}
