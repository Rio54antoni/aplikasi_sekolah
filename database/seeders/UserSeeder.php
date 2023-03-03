<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'role' => 'super_admin',
            'password' => Hash::make('123456'),

        ]);
        User::create([
            'nama' => 'Kepala Sekolah',
            'email' => 'kepalasekolah@gmail.com',
            'role' => 'kepala_sekolah',
            'password' => Hash::make('1234567'),

        ]);
        User::create([
            'nama' => 'Staff Sekolah',
            'email' => 'staf@gmail.com',
            'role' => 'staf',
            'password' => Hash::make('12345678'),

        ]);
        User::create([
            'nama' => 'Guru',
            'email' => 'guru@gmail.com',
            'role' => 'guru',
            'password' => Hash::make('123456789'),

        ]);
        User::create([
            'nama' => 'Orang Tua',
            'email' => 'orangtua@gmail.com',
            'role' => 'orang_tua',
            'password' => Hash::make('123456789'),

        ]);
        User::create([
            'nama' => 'Murid',
            'email' => 'murid@gmail.com',
            'role' => 'murid',
            'password' => Hash::make('123456789'),

        ]);
    }
}
