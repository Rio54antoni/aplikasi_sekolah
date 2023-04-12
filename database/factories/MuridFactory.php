<?php

namespace Database\Factories;

use App\Models\Murid;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Murid>
 */
class MuridFactory extends Factory
{
    protected $model = Murid::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'foto_diri' => $this->faker->imageUrl($width = 640, $height = 480),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'tempat_lahir' => $this->faker->city(),
            'tgl_lahir' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'id_agama' => $this->faker->numberBetween($min = 1, $max = 5),
            'alamat' => $this->faker->address(),
            'nis' => $this->faker->unique()->numerify('####'),
            'nohp' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'ayah' => $this->faker->name('male'),
            'kerja_ayah' => $this->faker->numberBetween($min = 1, $max = 10),
            'ibu' => $this->faker->name('female'),
            'kerja_ibu' => $this->faker->numberBetween($min = 1, $max = 10),
            'nohp_ortu' => $this->faker->phoneNumber(),
            'wali' => $this->faker->name(),
            'kerja_wali' => $this->faker->numberBetween($min = 1, $max = 10),
            'tgl_daftar' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
