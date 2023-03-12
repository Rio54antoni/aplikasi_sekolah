<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::create([
            'nama' => 'Rio Antoni',
            'foto_diri' => '1234.jpg',
            'nik' => '999999999',
            'foto_ktp' => '1234.jpg',
            'npwp' => '34123412412',
            'foto_npwp' => '123.jpg',
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => now(),
            'agama' => '1',
            'nip' => '153453453',
            'id_pendidikan' => '1',
            'gelar' => 'S.KOM',
            'foto_ijazah' => '123.jpg',
            'alamat' => 'Korong Tiram',
            'sts_pernikahan' => 'Belum Menikah',
            'id_jabatan' => '1',
            'id_status' => '1',
            'tgl_daftar' => now(),
            'email' => 'rioantoni@gmail.com',
            'telpon' => '081324243633'
        ]);
    }
}
