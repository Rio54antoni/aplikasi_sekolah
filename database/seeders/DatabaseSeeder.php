<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(ProfilappSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(AgamaSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(KerjaSeeder::class);
        $this->call(MataPelajaranSeeder::class);
        $this->call(TahunSeeder::class);
    }
}
